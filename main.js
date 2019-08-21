const hambButton = document.querySelector('.hamburger');
const mobileMenu = document.querySelector('.main-header__nav-menu');

const her = document.querySelector('.main-header__nav-list-item');
const her2 = document.querySelectorAll('.main-header__nav-list-item');
// her.element.style.visibility = 'visible'

hambButton.addEventListener('click', () => {
  hambButton.classList.toggle('is-active');
  mobileMenu.classList.toggle('disabled');
  mobileMenu.classList.toggle('animated');

  setTimeout(() => {
    her2.forEach((el) => {
      el.style.opacity = '1';
    });
  }, 1000);
});
