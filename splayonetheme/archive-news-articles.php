<?php get_header(); ?>

<section>
    <div class="page_container top_page_padding">
        <div class="content">
            <h1 class="page_title">News</h1>
            <div class="section_padding_1">
                <p class="title_2"><?php echo the_field('home_news_section_title') ?></p>

                <div class="news_list row">
                    <?php
                    $counter = 0;
                    if (have_posts()) :
                        while (have_posts() && $counter < 4) :
                            the_post();
                            $title = get_field('news_title');
                            $text = get_field('news_text');
                            $date = get_field('news_date');
                            $link = get_field('news_link');
                    ?>
                            <div style="margin-bottom: 15px;" class="col-3">
                                <a target="_blank" href="<?php echo $link; ?>" class="news_article_item">
                                    <div>
                                        <p class="font-weight-bold adieu_black text_2"><?php echo $date; ?></p>
                                        <p class="bold_1 text_1"><?php echo $title; ?></p>
                                    </div>
                                    <p class="text_1"><?php echo $text; ?></p>
                                </a>
                            </div>

                    <?php
                            $counter++;
                        endwhile;
                    endif;
                    ?>
                </div>

                <div class="w-100 d-flex justify-content-center">
                    <button id="load-more-news" class="secondary_button blue_ mt-5 mx-auto">Load More</button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    jQuery(document).ready(function($) {
        var page = 2; // Initialize the page counter for pagination
        var button = $('#load-more-news');

    	// Function to handle AJAX request error
		var handleAjaxError = function(error) {
			console.error('AJAX request error:', error);
			button.hide(); // Hide the button on error
		};

		// function filterCases(selectedCategory) {
        // // Send AJAX request to the server
		// 	$.ajax({
		// 		url: '<?php echo admin_url('admin-ajax.php'); ?>',
		// 		method: 'POST',
		// 		data: {
		// 			action: 'load_more_news_posts',
		// 			category: selectedCategory
		// 		},
		// 		success: function(response) {
		// 			// Update the case archive container with the retrieved case items
		// 			console.log(response, "here");
		// 			$('.case_archive').html(response);
		// 		}
		// 	});
		// }
		// Function to fetch and append more posts
		var loadMorePosts = function() {
			$.ajax({
				url: '<?php echo admin_url('admin-ajax.php'); ?>',
				type: 'POST',
				data: {
					action: 'load_more_news_posts',
					page: page
				},
				beforeSend: function() {
					button.text('Loading...'); // Update button text
				},
				success: function(response) {
					console.log("Maybe SUCCESS", response)
					if (response) {
						$('.news_list').append(response); // Append new posts
						page++; // Increment the page counter
						console.log("SUCCESS", page)

						// If there are no more posts, hide the button
						if (response.trim() === '') {
							button.hide();
						} else {
							button.text('Load More'); // Reset button text
						}
					} else {
						button.hide();
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					handleAjaxError(errorThrown);
				}
			});
		};


        // Event listener for the load more button
        button.on('click', function(e) {
            e.preventDefault();
            loadMorePosts();
        });
    });
</script>

<?php get_footer(); ?>
