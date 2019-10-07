const Main = function() {
  // Page loader elements
  this.logoLinks = document.querySelectorAll('.logo');
  this.loaderLogo = document.querySelector('.loader-logo');
  this.loaderOverlay = document.querySelector('.overlay');
  this.hiddenContent = document.querySelectorAll('.loader-content-hidden');

  // Mobile menu elements
  this.hamburgerBtn = document.querySelector('.hamburger');
  this.mobileMenu = document.querySelector('.mobile-header__nav-container');
  this.mobileMenuList = document.querySelector('.mobile-header__nav-menu');
  this.langMenu = document.querySelector('.lang-label--in-menu');
  this.listItem = document.querySelectorAll('.main-header__nav-list-item');

  // Booking form elements
  this.bookingBtns = document.querySelectorAll('.booking');
  this.bookingForm = document.querySelector('.booking-popup');
  this.overlay = document.querySelector('.background-popup');

  // Callback form elements
  this.callbackBnt = document.querySelector('.contacts__callback-btn');
  this.callbackForm = document.querySelector('.callback-popup');

  // State
  this.isPopupOpened = false;

  // One by one methods executing
  this.init = function() {
    this.initLoader();
    this.initHamburgerMenu();
    this.smoothAnchors();
    // this.backToTop();
    this.initForms();
    this.setPhotoSlider();
    this.setAboutSlider();
  };
};

/**
 * Handles page loader
 *
 * @return {undefined}
 **/
Main.prototype.initLoader = function() {
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
  });
};

Main.prototype.initHamburgerMenu = function() {
  this.hamburgerBtn.addEventListener('click', () => {
    this.hamburgerBtn.classList.toggle('is-active');
    this.mobileMenu.classList.toggle('disabled');
    this.mobileMenu.classList.toggle('animated');
    this.mobileMenuList.classList.toggle('visible');
    // this.langMenu.classList.toggle('visible');

    setTimeout(() => {
      this.listItem.forEach((el) => {
        el.classList.toggle('opacity');
      });

      // this.langMenu.classList.toggle('opacity');
    }, 600);
  });
};

Main.prototype.smoothAnchors = function() {
  document.querySelectorAll('a[href*="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      e.preventDefault();

      const pageUrl = new URL(document.URL);
      const url = new URL(anchor.href);
      const hash = url.hash;

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
 * Back to top button handler.
 *
 * @param {number} trigger Scroll height in pixels, when "back to top" button have to shows up
 *
 * @return {undefined}
 **/
Main.prototype.backToTop = function(trigger = 1000) {
  if (this.backToTopBtn) {
    jQuery(window).scroll(() => {
      if (jQuery(window).scrollTop() >= trigger) {
        this.backToTopBtn.classList.remove('hidden');
      } else {
        this.backToTopBtn.classList.add('hidden');
      }
    });

    this.backToTopBtn.addEventListener('click', function(e) {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }
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
      success(resp) {
        alert(JSON.stringify(resp));
        form.reset();
      //  TODO: Form closing on submit
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
  jQuery('.gallery__slider').slick({
    prevArrow: jQuery('.gallery__slider-nav-arrow-left'),
    nextArrow: jQuery('.gallery__slider-nav-arrow-right'),
    dots: false,
    slidesPerRow: 4,
    rows: 2,
    responsive: [
      {
        breakpoint: 2048,
        settings: {
          slidesPerRow: 6,
          rows: 2
        }
      },
      {
        breakpoint: 1600,
        settings: {
          slidesPerRow: 5,
          rows: 2
        }
      },
      {
        breakpoint: 1367,
        settings: {
          slidesPerRow: 5,
          rows: 2
        }
      },
      {
        breakpoint: 1280,
        settings: {
          slidesPerRow: 3,
          rows: 2
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesPerRow: 2,
          rows: 2
        }
      },
      {
        breakpoint: 540,
        settings: {
          slidesPerRow: 1,
          rows: 1
        }
      }
    ]
  });
};

Main.prototype.setAboutSlider = function() {
  if (typeof OnePictureSlider === 'function') {
    const options = {
      container: document.querySelector('.about-us__carousel-container'),
      images: document.querySelectorAll('.about-us__carousel-item'),
    };

    const brandSlider = new OnePictureSlider(options);
    brandSlider.init();
  }
};

document.addEventListener('DOMContentLoaded', () => {
  const m = new Main;
  m.init();
});