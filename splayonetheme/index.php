<?php get_header(); ?>

<div style="min-height: 600px;" class="content section_padding_3 h-100">
  <?php if (is_user_logged_in() && current_user_can('administrator')) { ?>
    <h5 class="subtitle_1 adieu_regular">Message to Admin:</h5>
    <h5>You are not using a template. That is why the page is not displayed correctly.</h5>
  <?php } else { ?>
    <h1 class="page_title">Not Found.</h1>
    <h5>Page was not found. We are so sorry.</h5>
  <?php } ?>
</div>

<?php get_footer(); ?>