<?php get_header(); ?>

<section>
    <div class="page_container top_page_padding">

		<div class="content">
			<h1 class="page_title">News</h1>
			<div class="section_padding_1">
                <p class="title_2"><?php echo the_field('home_news_section_title')?></p>
                

				<div class="news_list row">
				<?php 
                        $args = array(
                            'post_type' => 'news-articles',
                            'posts_per_page' => 8,
                            'orderby' => 'date',
                            'order' => 'DESC'
                        );
                        $query = new WP_Query( $args );
                        if ( $query->have_posts() ) : 
                            while ( $query->have_posts() ) : $query->the_post(); 
                                $title = get_field('news_title');
                                $text = get_field('news_text');
                                $date = get_field('news_date');
                                $link = get_field('news_link');
                        ?>
					<div style="margin-bottom: 15px;" class="col-3">
						<a target="_blank" href="<?php echo $link;?>" class="news_article_item">
							<div>
								<p class="font-weight-bold adieu_black text_2"><?php echo $date; ?></p>
								<p class="bold_1 text_1"><?php echo $title; ?></p>
							</div>
							<p class="text_1"><?php echo $text; ?></p>
						</a>
					</div>

				<?php endwhile; endif;?>
				</div>
				<div class="w-100 d-flex justify-content-center">
					<button id="load-more-news" class="secondary_button blue_ mt-5">Load more</button>
				</div>
            </div>         
		</div>


	</div>
</section>

<script>
    var page = 2; // initialize page variable to 2
    var maxPages = <?php echo $query->max_num_pages; ?>; // get the total number of pages
    jQuery('#load-more-news').on('click', function() {
        jQuery.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'load_more_news',
                page: page,
            },
			beforeSend: function() {
				jQuery('#load-more-news').text('Loading...'); // Update button text
			},
            success: function(data) {
                jQuery('.news_list').append(data);
				jQuery('#load-more-news').text('Load More'); // Reset button text
                page++; // increment page variable
                if (page > maxPages) {
                    jQuery('#load-more-news').attr('disabled', true);
                }
            }
        });
    });
</script>

<?php get_footer(); ?>