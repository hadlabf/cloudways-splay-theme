<?php get_header(); ?>
<section>
    <div class="page_container top_page_padding">
        <div class="content">
            <h1 class="page_title">Work</h1>
            <div class="category_filtering_buttons">
                <button class="secondary_button category_button active" data-category="category-case-sweden">Sweden</button>
                <button class="secondary_button category_button" data-category="category-case-finland">Finland</button>
                <button class="secondary_button category_button" data-category="category-case-norway">Norway</button>
                <button class="secondary_button category_button" data-category="category-case-denmark">Denmark</button>
            </div>
            <div class="case_archive">
                <!-- Case items will be dynamically loaded here (find html in functions.php) -->
            </div>
        </div>
        <?php get_template_part('includes/section', 'contact' ); ?>
    </div>

<script>
jQuery(function($) {
    $('.category_button').on('click', function(e) {
        e.preventDefault();
        $('.category_button').removeClass('active');
        $(this).addClass('active');
        var selectedCategory = $(this).data('category');

        // Send AJAX request to the server
        filterCases(selectedCategory);
    });

    // Function to load cases based on selected category
    function filterCases(selectedCategory) {
        // Send AJAX request to the server
        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            method: 'POST',
            data: {
                action: 'filter_cases',
                category: selectedCategory
            },
            success: function(response) {
                // Update the case archive container with the retrieved case items
                $('.case_archive').html(response);
            }
        });
    }
    // Load cases from Sweden by default
    filterCases('category-case-sweden');
});
</script>
</section>



<?php get_footer( null, [ 'footer_style' => 'footer_style_secondary' ] ); ?>