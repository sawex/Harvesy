const hambButton = document.querySelector('.hamburger');
const mobileMenu = document.querySelector('.mobile-header__nav-container');
const mobileMenuList = document.querySelector('.mobile-header__nav-menu');
const listItem = document.querySelectorAll('.main-header__nav-list-item');
const langMenu = document.querySelector('.lang-label--in-menu');
const booking = document.querySelectorAll('.booking');
const overlay = document.querySelector('.background-popup');
const closeButtons = document.querySelectorAll('.close-btn');
const bookingForm = document.querySelector('.booking-popup');
const callbackBnt = document.querySelector('.contacts__callback-btn');
const callbackForm = document.querySelector('.callback-popup');
const logo = document.querySelectorAll('.logo');
const loaderLogo = document.querySelector('.loader-logo');
const hiddenContent = document.querySelectorAll('.loader-content-hidden');
const loadOverlay = document.querySelector('.overlay');

loaderLogo.addEventListener('animationend', () => {
  logo.forEach((logo) => {
    logo.style.opacity = '1'
  });
  loaderLogo.style.display = 'none';
  loadOverlay.style.display = 'none';
  setTimeout(() => {
    hiddenContent.forEach((hiddenContent) => {
      hiddenContent.classList.toggle('loader-content-visible')
    });
  }, 300);
});

hambButton.addEventListener('click', () => {
  hambButton.classList.toggle('is-active');
  mobileMenu.classList.toggle('disabled');
  mobileMenu.classList.toggle('animated');
  mobileMenuList.classList.toggle('visible');
  langMenu.classList.toggle('visible');

  setTimeout(() => {
    listItem.forEach((el) => {
      el.classList.toggle('opacity');
    });
    langMenu.classList.toggle('opacity');
  }, 600);
});

booking.forEach((el) => {
  el.addEventListener('click', () => {
    overlay.classList.add('block');
    bookingForm.classList.add('block');
  });
});

overlay.addEventListener('click', () => {
  overlay.classList.remove('block');
  bookingForm.classList.remove('block');
  callbackForm.classList.remove('block');
})

callbackBnt.addEventListener('click', () => {
  overlay.classList.add('block');
  callbackForm.classList.add('block');
});

closeButtons.forEach((closeBtn) => {
  closeBtn.addEventListener('click', () => {
    overlay.classList.remove('block');
    bookingForm.classList.remove('block');
    callbackForm.classList.remove('block');
  });
});

document.addEventListener('keyup', (e) => {
  if (e.key == 'Escape') {
    overlay.classList.remove('block');
    bookingForm.classList.remove('block');
    callbackForm.classList.remove('block');
  }
});