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


function getActiveButtonData() {
  var activeButton = $('.category_button.active');
  if (activeButton.length > 0) {
      return activeButton.attr('data-country');
  }
  return null; // No active button found
}

(function() {
  // The button with the CSS class "get-support" loads the form.
  jQuery('.get-support').on('click', load_support_form);

  // The form is displayed in a div tag with the CSS class "support-form".
  function load_support_form() {
    jQuery.get('/wp-admin/admin-ajax.php?action=my_get_support')
    .then(function(response) {
      jQuery('.splay_contact_form_wrapper').html(response.data);
    });
  }
})();

document.addEventListener("DOMContentLoaded", function() {
  var container = document.getElementById("people_cards_archive");
  var images = container.getElementsById("people_image");
  var spinner = container.querySelector(".spinner");

  // Count the number of images that are not yet loaded
  var count = images.length;

  // Function to decrement the count and hide the spinner when all images are loaded
  function imageLoaded() {
    count--;
    if (count === 0) {
      spinner.style.display = "none"; // Hide the spinner when all images are loaded
    }
  }

  // Loop through all the images and add a load event listener to each one
  for (var i = 0; i < images.length; i++) {
    images[i].addEventListener("load", imageLoaded);
  }
});
