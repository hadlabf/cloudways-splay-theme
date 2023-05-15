const hamburgerMenuToggleButtons = document.querySelectorAll('.hamburger_menu_toggle');
const hamburgerMenu = document.querySelector('.hamburger_menu');

for (const button of hamburgerMenuToggleButtons) {
  button.addEventListener('click', () => {
    hamburgerMenu.classList.toggle('open');
  });
}
