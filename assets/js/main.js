/* global jQuery, mainState */

const Main = function() {
  // Page loader elements
  this.logoLinks = document.querySelectorAll('.logo');
  this.loaderLogo = document.querySelector('.loader-logo');
  this.loaderOverlay = document.querySelector('.overlay');
  this.hiddenContent = document.querySelectorAll('.loader-content-hidden');
  this.navigationMenu = document.querySelector('.main-header__nav-menu:not(.mobile-header__nav-menu)');
  this.socialBtns = document.querySelector('.desktop-header .textwidget');
  this.langMenu = document.querySelector('#language-menu');

  // Mobile menu elements
  this.hamburgerBtn = document.querySelector('.hamburger');
  this.mobileMenu = document.querySelector('.mobile-header__nav-container');
  this.mobileMenuList = document.querySelector('.mobile-header__nav-menu');
  this.listItem = document.querySelectorAll('.main-header__nav-list-item');

  // Booking form elements
  this.bookingBtns = document.querySelectorAll('.booking');
  this.bookingForm = document.querySelector('.booking-popup');
  this.overlay = document.querySelector('.background-popup');

  // Callback form elements
  this.callbackBnt = document.querySelector('.contacts__callback-btn');
  this.callbackForm = document.querySelector('.callback-popup');

  // Success popup
  this.successPopup = document.querySelector('.thx-popup');

  this.imageGallery = document.querySelectorAll('.photo-gallery .gallery__slider-image');

  // State
  this.isPopupOpened = false;
  this.navigation = [
    document.querySelector('.main-header__navbar a[href="#photos"]'),
    document.querySelector('.main-header__navbar a[href="#videos"]'),
    document.querySelector('.main-header__navbar a[href="#aboutus"]'),
    document.querySelector('.main-header__navbar a[href="#contacts"]'),
  ];
};

/**
 * Handles page loader
 *
 * @return {undefined}
 **/
Main.prototype.initLoader = function() {
  if (!this.loaderLogo || !this.logoLinks.length || !this.loaderLogo || !this.loaderOverlay || !this.hiddenContent) {
    return;
  }

  setTimeout(() => {
    document.querySelector('.loader-logo').style.animation = 'toTop 2s';
  }, mainState.loaderDelayMs);

  setTimeout(() => {
    document.querySelector('.overlay').style.animation = 'opacity 2.5s';
  }, mainState.loaderDelayMs);

  this.loaderLogo.addEventListener('animationend', () => {
    this.logoLinks.forEach((link) => {
      link.style.opacity = '1';
    });

    this.loaderLogo.style.display = 'none';
    this.loaderOverlay.style.display = 'none';

    setTimeout(() => {
      this.hiddenContent.forEach((el) => {
        el.classList.toggle('loader-content-visible');
      });
    }, 300);

    this.navigationMenu.classList.add('main-header__nav-menu--animate-active');
    this.socialBtns.classList.add('textwidget--animate-active');

    setTimeout(() => this.navigationMenu.classList.add('main-header__nav-menu--animate-finish'), 1050);
    setTimeout(() => this.socialBtns.classList.add('textwidget--animate-finish'), 1051);
  });
};

/**
 * Prevents location changing on active language clicking.
 *
 * @version 1.0.1
 */
Main.prototype.currentLanguagePreventClicking = function() {
  const currentLanguages = document.querySelectorAll('.wpml-ls-current-language > a');

  if (currentLanguages.length) {
    currentLanguages.forEach((currentLanguage) => {
      currentLanguage.addEventListener('click', (e) => e.preventDefault());
    });
  }
};

Main.prototype.initHamburgerMenu = function() {
  this.hamburgerBtn.addEventListener('click', () => {
    this.hamburgerBtn.classList.toggle('is-active');
    this.mobileMenu.classList.toggle('disabled');
    this.mobileMenu.classList.toggle('animated');
    this.mobileMenuList.classList.toggle('visible');
    this.langMenu.classList.toggle('opacity');

    setTimeout(() => {
      this.listItem.forEach((el) => {
        el.classList.toggle('opacity');
      });

      this.langMenu.classList.toggle('visible');
    }, 600);
  });
};

/**
 * Smooth scroll to an anchor target
 *
 * @version 1.0.2
 */
Main.prototype.smoothAnchors = function() {
  document.querySelectorAll('a[href*="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      e.preventDefault();

      const pageUrl = new URL(document.URL);
      const url = new URL(anchor.href);
      const hash = url.hash;

      if (hash === '#') return;

      if (url.pathname === pageUrl.pathname) {
        const target = document.querySelector(hash);

        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
          });
        }
      } else {
        location = url.href;
      }
    });
  });
};

/**
 * Adds CSS 'block' class from nodes.
 *
 * @param {array} nodes Elements to add block class
 *
 * @return {undefined}
 **/
Main.prototype._openPopup = function(nodes) {
  if (Array.isArray(nodes) && nodes.length) {
    nodes.forEach(node => {
      node.classList.add('block');
    });

    this.isPopupOpened = nodes;
  }
};

/**
 * Removes CSS 'block' class from nodes.
 *
 * @param {array} nodes Elements to remove block class
 *
 * @return {undefined}
 **/
Main.prototype._closePopup = function(nodes) {
  if (Array.isArray(nodes) && nodes.length) {
    nodes.forEach(node => {
      node.classList.remove('block');
    });

    this.isPopupOpened = false;
  }
};

Main.prototype.sendData = function(form, validateOptions = {}) {
  const formData = new FormData(form);
  const dataObj = {};
  let isValid = true;

  // Transform all form field to object and validate them if validation function is available
  for (const field of formData.entries()) {
    const key = field[0];
    const value = field[1];

    // If there is validation function for the field then execute it and save the result if negative
    if (validateOptions.fields[key]) {
      validateOptions.fields[key](value) === false ? isValid = false : null;
    }

    dataObj[key] = value;
  }

  // Make form invalid if some of fields missed
  if (validateOptions.count && validateOptions.count !== Object.keys(dataObj).length) {
    isValid = false;
  }

  if (isValid) {
    const self = this;

    jQuery.ajax({
      type: 'POST',
      url: '/wp-admin/admin-ajax.php',
      data: {
        action: 'mst_harvesy_cb',
        data: dataObj,
      },
      success() {
        self._closePopup(self.isPopupOpened);
        form.reset();

        self._openPopup([self.overlay, self.successPopup]);
        setTimeout(() => self._closePopup(self.isPopupOpened), 2000);
      },
    });
  }
};

/**
 * Adds event listeners for all site popups (opening, closing, data sending).
 *
 * @return {undefined}
 **/
Main.prototype.initForms = function() {
  if (!this.callbackBnt || !this.bookingBtns.length) return;

  // Open booking form on buttons click
  this.bookingBtns.forEach((el) => {
    el.addEventListener('click', () => {
      this._openPopup([this.overlay, this.bookingForm]);
    });
  });

  // Open callback form on button click
  this.callbackBnt.addEventListener('click', () => {
    this._openPopup([this.overlay, this.callbackForm]);
  });

  // Hide forms on overlay click
  this.overlay.addEventListener('click', () => {
    this._closePopup(this.isPopupOpened);
  });

  // Hide popup on close button click
  document.addEventListener('click', (e) => {
    if (this.isPopupOpened) {
      if (e.target.classList.contains('close-btn')) {
        this._closePopup(this.isPopupOpened);
      }
    }
  });

  // Hide popup on Escape press
  document.addEventListener('keyup', (e) => {
    if (this.isPopupOpened) {
      if (e.key === 'Escape') {
        this._closePopup(this.isPopupOpened);
      }
    }
  });

  // Set up form submit handler
  this.callbackForm.addEventListener('submit', (e) => {
    e.preventDefault();

    this.sendData(e.target, {
      fieldsCount: 2,
      fields: {
        phone: (value) => value.trim().length > 5 && !isNaN(value.replace(/\s/g, '')),
        name: (value) => value.trim().length >= 2
      }
    });
  });

  this.bookingForm.addEventListener('submit', (e) => {
    e.preventDefault();

    this.sendData(e.target, {
      fieldsCount: 4,
      fields: {
        phone: (value) => value.trim().length > 5 && !isNaN(value.replace(/\s/g, '')),
        name: (value) => value.trim().length >= 2,
        email: (value) => /\S+@\S+\.\S+/.test(value),
      }
    });
  });
};

Main.prototype.setPhotoSlider = function() {
  if (typeof jQuery !== 'function' || !document.querySelector('.photo-gallery')) return;

  jQuery('.photo-gallery .gallery__slider').slick({
    prevArrow: jQuery('.photo-gallery .gallery__slider-nav-arrow-left'),
    nextArrow: jQuery('.photo-gallery .gallery__slider-nav-arrow-right'),
    dots: false,
    slidesPerRow: 4,
    rows: 3,
    responsive: mainState.photoGallerySettings,
  });
};

Main.prototype.setVideoSlider = function() {
  if (typeof jQuery !== 'function' || !document.querySelector('.video-gallery')) return;

  jQuery('.video-gallery .gallery__slider').slick({
    prevArrow: jQuery('.video-gallery .gallery__slider-nav-arrow-left'),
    nextArrow: jQuery('.video-gallery .gallery__slider-nav-arrow-right'),
    dots: false,
    slidesPerRow: 4,
    rows: 3,
    responsive: mainState.videoGallerySettings,
  });
};

Main.prototype.setAboutSlider = function() {
  if (typeof jQuery !== 'function' || !document.querySelector('.about-us__carousel-container')) return;

  jQuery('.about-us__carousel-container').slick({
    arrows: false,
    dots: false,
  });
};

Main.prototype.initPhotoViewer = function() {
  if (typeof BigPicture !== 'function') return;

  document.addEventListener('click', (e) => {
    const el = e.target;

    if (el.classList.contains('photo-gallery__opening-button')) {
      const img = el.parentElement.previousElementSibling;

      return BigPicture({
        el: img,
        imgSrc: img.src,
        gallery: this.imageGallery,
      });
    }

    if (el.classList.contains('gallery__slider-img-btn--photo')) {
      const img = el.previousElementSibling;

      return BigPicture({
        el: img,
        imgSrc: img.src,
        gallery: this.imageGallery,
      });
    }
  });
};

Main.prototype.initVideoViewer = function() {
  if (typeof BigPicture !== 'function') return;

  document.addEventListener('click', (e) => {
    const el = e.target;

    if (el.classList.contains('video-gallery__opening-button') ||
      el.classList.contains('gallery__slider-img-btn--video')) {
      const videoWrapper = el.closest('.gallery__slider-img-box');

      if (!videoWrapper) return;

      return BigPicture({
        el: videoWrapper,
        vimeoSrc: videoWrapper.dataset.videoId,
      });
    }
  });
};

Main.prototype.setOnePageScroll = function() {
  if (typeof jQuery !== 'function') return;

  const self = this;

  jQuery('.main').onepage_scroll({
    sectionContainer: '.main > section',
    pagination: false,
    loop: false,
    responsiveFallback: 1201,
    beforeMove(i) {
      const index = i - 1;
      const active = document.querySelector('.main-header__nav-link--active');

      if (active) {
        active.classList.remove('main-header__nav-link--active');
      }

      self.navigation[index].classList.add('main-header__nav-link--active');
    },
  });
};

Main.prototype.setDesktopAnchors = function() {
  if (typeof jQuery !== 'function') return;

  this.navigation[0].classList.add('main-header__nav-link--active');

  this.navigation.forEach((link, i) => {
    const index = i + 1;
    link.addEventListener('click', () => jQuery('.main').moveTo(index));
  });
};

// One by one methods executing
Main.prototype.init = function() {
  this.initLoader();
  this.currentLanguagePreventClicking();
  this.initHamburgerMenu();
  this.smoothAnchors();
  this.initForms();
  this.setPhotoSlider();
  this.setVideoSlider();
  this.initPhotoViewer();
  this.initVideoViewer();
  this.setAboutSlider();
  this.setOnePageScroll();
  this.setDesktopAnchors();
};

document.addEventListener('DOMContentLoaded', () => {
  const m = new Main;
  m.init();
});