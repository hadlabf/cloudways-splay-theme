<?php get_header(); ?>
<section>
    <div class="page_container top_page_padding pb-5">
        <div class="content">
            <h1 class="page_title">Our People</h1>
            <div class="category_filtering_buttons">
                <button class="secondary_button category_button active" data-category="category-case-sweden">Sweden</button>
                <button class="secondary_button category_button" data-category="category-case-finland">Finland</button>
                <button class="secondary_button category_button" data-category="category-case-norway">Norway</button>
                <button class="secondary_button category_button" data-category="category-case-denmark">Denmark</button>
                <button class="secondary_button category_button" data-category="category-case-denmark">Contact</button>
            </div>
            <div class="case_archive">
                <!-- Case items will be dynamically loaded here (find html in functions.php) -->
            </div>
        </div>
    </div>
    <div class="section_secondary mb-0">
        <div class="content">
            <h1 class="adieu_bold sp_header">We are always looking for new workfriends.</h1>
            <div class="d-flex justify-content-center">
                <a href="<?php echo site_url('/contact');?>" class="primary_button">Join us!</a>
            </div>
        </div>
    </div>

    <script>
    jQuery(function($) {
        $('.category_button').on('click', function(e) {
            e.preventDefault();
            $('.category_button').removeClass('active');
            $(this).addClass('active');
            var selectedCategory = $(this).data('category');

            // Send AJAX request to the server
            filterPeople(selectedCategory);
        });

        // Function to load cases based on selected category
        function filterPeople(selectedCategory) {
            // Send AJAX request to the server
            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                method: 'POST',
                data: {
                    action: 'filter_people',
                    category: selectedCategory
                },
                success: function(response) {
                    // Update the case archive container with the retrieved case items
                    $('.case_archive').html(response);
                }
            });
        }
        // Load cases from Sweden by default
        filterPeople('category-case-sweden');
    });
    </script>
</section>



<?php get_footer(); ?>