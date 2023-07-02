<?php get_header( null, [ 'header_style' => 'single_article' ] ); ?>
<?php 
	$header_image = get_field('article_header_image');
	$title = get_field('article_title');
	$date = get_field('article_date');
	$country = get_field('article_country');
	$city = get_field('article_city');
	$text_content = get_field('article_text_content');
	$content_image = get_field('article_content_image');
	$read_next_specified_url = get_field('article_specify_next_url');
	$button_text = get_field('article_button_link_text');
	$button_url = get_field('article_button_link_url');
	$foot_text = get_field('article_foot_text');

	$image_size = getimagesize($content_image['url']);
?>
<div style="position:relative;">
	<!-- 1. HEADER -->
	<?php if( !empty( $header_image ) ): ?>
		<div class="case_single_image_wrapper">
			<img class="w-100 h-auto" src="<?php  echo $header_image["url"]; ?>" alt="<?php echo esc_attr($header_image['alt']); ?>" />
		</div>
	<?php endif; ?>

	<div class="go_back_button_wrapper">
		<div class="content d-flex justify-content-end">
			<a href="<?php echo site_url('/news-articles');?>" class="go_back_button close_btn"><img class="close_icon" src="<?php echo get_template_directory_uri(); ?>/images/close-icon-white.png"/></a>
		</div>
	</div>

	<!-- 2. INTRO -->
	<div class="single_article_page">
		<div class="content padding_bottom_lg">

			<div class="row padding_bottom_sm">
				<div class="date_section ml-auto col col-sm-6 text_1 pt-4">
					<div class="row">
						<div id="article_date" class="col">
							<p class="adieu_light text_2"><?php echo $date; ?></p>
						</div>
						<div id="article_location" class="col">
							<p class="adieu_light text_2 mb-0"><?php echo $country; ?></p>
							<p class="adieu_light text_2"><?php echo $city; ?></p>
						</div>
					</div>
				</div>
			</div>

			<div class="row pb-5">

				<div class="col col-sm-6 mr-auto article_column">
					<p style="line-height:1.15;" class="title_1 adieu_light pb-3"><?php echo $title; ?></p>
					<?php if( !empty( $content_image ) ): ?>
						<div class="content_image">
						<!-- calc((100vw / 2) - 685px) -->
							<img class="w-100 h-auto" src="<?php  echo $content_image["url"]; ?>" alt="<?php echo esc_attr($content_image['alt']); ?>" />
						</div>
					<?php endif; ?>
				</div>

				<div class="col col-sm-6 article_column">
					<div class="text_1 pt-4"><?php echo $text_content; ?></div>
					<div class="w-100 pt-5">
						<div class="talk_to_container sm_ justify-content-end">
						<?php
							$current_post = get_queried_object();
							$current_date = $current_post->post_date;
							
							$args = array(
								'post_type' => 'articles',
								'posts_per_page' => 1,
								'post_status' => 'publish',
								'orderby' => array(
									'date' => 'DESC',
									'time' => 'DESC',
								),
								'date_query' => array(
									array(
										'before' => $current_date,
										'inclusive' => false,
									),
								),
							);
							$older_post_query = new WP_Query($args);
							
							if ($older_post_query->have_posts()) {
								$older_post_query->the_post();
								$older_post_url = get_permalink();
							} else {
								// If there are no older posts, redirect to the most recent post.
								$args = array(
									'post_type' => 'articles',
									'posts_per_page' => 1,
									'post_status' => 'publish',
									'orderby' => 'date',
									'order' => 'DESC',
								);
								$recent_post_query = new WP_Query($args);
							
								if ($recent_post_query->have_posts()) {
									$recent_post_query->the_post();
									$older_post_url = get_permalink();
								} else {
									// If there are no articles at all, you can redirect to the archive page or any fallback URL.
									$older_post_url = get_post_type_archive_link('articles');
								}
							
								wp_reset_postdata();
							}

								if ( !empty($read_next_specified_url) ) {
									$read_next_url = $read_next_specified_url;
									$link_title = "Read recommended article";
								} else {
									$read_next_url = $older_post_url;
									$link_title = "Read next article";
								}
							
							?>													
							<a href="<?php echo esc_url($read_next_url); ?>" id="read-next-post" class="cta_link pl-0 pr-4" title="<?php echo $link_title; ?>">Read Next</a>
							<img src="<?php echo get_template_directory_uri(); ?>/images/arrow-thin-icon-white.png"/>
						</div>
					</div>
					<?php if( !empty( $foot_text ) ): ?>
						<div class="pt-5 d-flex justify-content-start w-50">
							<p class="small_title"><?php echo $foot_text; ?></p>
						</div>
					<?php endif; ?>
					<?php if( !empty( $button_url ) &&  !empty( $button_text ) ): ?>
						<div class="pt-3 d-flex justify-content-start">
							<a href="<?php echo esc_url($button_url);?>" class="primary_button"><?php echo $button_text; ?></a>
						</div>
					<?php endif; ?>
				</div>

			</div>

		</div>
	</div>
</div>
<?php get_footer( null, [ 'footer_style' => 'footer_style_secondary' ] ); ?>