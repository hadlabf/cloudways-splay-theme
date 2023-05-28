<?php
/*
Template Name: Our People Page
*/
?>

<?php get_header(); ?>
<section>
    <div class="page_container top_page_padding">
        
        <div class="content">
            <h1 class="page_title">Our People</h1>
            <div class="category_filtering_buttons">
                <button class="secondary_button category_button active" data-country="Sweden">Sweden</button>
                <button class="secondary_button category_button" data-country="Finland">Finland</button>
                <button class="secondary_button category_button" data-country="Norway">Norway</button>
                <button class="secondary_button category_button" data-country="Denmark">Denmark</button>
            </div>
            <p id="countryName"><?php echo $selectedCountry; ?></p>

            <?php 
            // $selectedCountry = getActiveButtonData();
            
                if( have_rows('people_list') ):
                    while( have_rows('people_list') ) : the_row();
                        $full_name = get_sub_field('people_full_name');
                        $role = get_sub_field('people_role');
                        $country = get_sub_field('people_country');
                        $phone = get_sub_field('people_phone');
                        $email = get_sub_field('people_email');
                        $profile_picture = get_sub_field('people_profile_picture');
                        
                        $people_data = array( 
                            'class' => 'featured-home',
                            'data'  => array(
                            'full_name' => $full_name,
                            'role' => $role,
                            'country' => $country,
                            'phone' => $phone,
                            'email' => $email,
                            'profile_picture' => $profile_picture,
                            )
                            );
                            echo "country: " . $country . "selected: " . $selectedCountry;
                            if ($country === $selectedCountry) {
                                get_template_part('includes/person', 'card', $people_data );
                            }
                    endwhile;                            
                else :
                endif;
            ?>

            <div class="case_archive">
                <!-- People cards will be dynamically loaded here -->
            </div>
        </div>
    </div>
</section>

<script>
    jQuery(function($) {
        $('.category_button').on('click', function(e) {
            e.preventDefault();
            $('.category_button').removeClass('active');
            $(this).addClass('active');
            var selectedCountry = $(this).data('country');

            // Send AJAX request to the server
            filterPeople(selectedCountry);
        });

        });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    function getActiveButtonData() {
      var activeButton = $('.category_button.active');
      if (activeButton.length > 0) {
        return activeButton.attr('data-country');
      }
      return null; // No active button found
    }

    $.ajax({
      type: 'POST',
      url: 'get_active_button_data.php',
      data: { activeButtonData: getActiveButtonData() },
      success: function(response) {
        console.log('Active button data-country value: ' + response);
        $('#countryName').text(response); // Update the text of the <p> tag

        // Assign the value to a PHP variable
        $.ajax({
          type: 'POST',
          url: 'assign_country_variable.php',
          data: { selectedCountry: response },
          success: function() {
            console.log('Country value assigned to PHP variable.');
          }
        });
      }
    });
  });
</script>



<?php get_footer( null, [ 'footer_style' => 'footer_style_secondary' ] ); ?>