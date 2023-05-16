// Hamburger menu
const hamburgerMenuToggleButtons = document.querySelectorAll('.hamburger_menu_toggle');
const hamburgerMenu = document.querySelector('.hamburger_menu');
const splayPage = document.querySelector('.splay_page');
const splayFooter = document.querySelector('.splay_footer');

for (const button of hamburgerMenuToggleButtons) {
  button.addEventListener('click', () => {
    hamburgerMenu.classList.toggle('open');
    splayPage.classList.toggle('hidden');
    splayFooter.classList.toggle('hidden');
  });
}
