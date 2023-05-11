<?php get_header(); ?>
<?php 
	$customer = get_field('case_customer');
	$name = get_field('case_name');
	$header_image = get_field('case_header_image');
	$header_video = get_field('case_header_video');
	$description = get_field('case_description');
	$vertical_images = get_field('case_vertical_images');
	$text = get_field('case_section_text');
	$large_image = get_field('case_large_image');
	$profile_header = get_field('case_section_profile_header');
	$profile_description = get_field('case_section_profile_description');
?>
<?php if (!empty($header_image)) : ?>
	<div class="case_single_image_wrapper">
		<img class="w-100 h-auto" src="<?php  echo $header_image["url"]; ?>" alt="<?php echo esc_attr($header_image['alt']); ?>" />
	</div>
<?php elseif (!empty($header_video)) : ?>
	<div class="video-container h-100">
        <?php 
            $video_url = get_field('home_intro_video_url');
            // Parse the YouTube video ID from the URL
            preg_match('/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=))([\w-]{10,12})/', $header_video, $matches);
            $youtube_id = $matches[1];
        ?>
        <iframe width="100%" height="755px" src="https://www.youtube.com/embed/<?php echo $youtube_id; ?>?autoplay=1&loop=1" frameborder="0" allowfullscreen></iframe>
    </div>
<?php endif; ?>
<div class="case_single_page border_bottom_primary">
	<div class="content section_padding_3">
		<h1 class="large_title bold_1 pb-5">Case</h1>
		<div class="d-flex flex-row row">
			<div class="d-flex flex-column col-4">
				<p class="text_2 bold_1 mb-1">Client:</p>
				<p class="text_2 bold_1"><?php echo $customer; ?></p>
			</div>
			<div class="d-flex flex-column col-8">
				<p class="text_2 bold_1 mb-1">Services:</p>
				<div class="d-flex flex-row">
					<?php if(have_rows('case_service_tag_list') ):
							while( have_rows('case_service_tag_list') ) : the_row(); ?>
								<p class="text_2 bold_1 service_tag"><?php echo the_sub_field('case_service_tag'); ?></p>
							<?php                         
							endwhile;                            
						endif;
					?>
				</div>
				<p class="text_2"><?php echo $description; ?></p>
			</div>
		</div>
	</div>
</div>



<div class="content section_padding_3">
	<div class="d-flex flex-column">
		<div class="d-flex flex-row justify-content-between">
			<?php if( $vertical_images ) : foreach( $vertical_images as $image ): ?>
            	<img class="h-100 w-auto" src="<?php  echo $image["url"]; ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endforeach; endif;?>
		</div>
		<p class="text_2 section_padding_1 w_70"><?php echo $text;?></p>
	</div>
</div>

<img src="<?php echo $large_image["url"];?>" />
<?php echo get_template_part('includes/section', 'profiles' ); ?>
<div class="content section_padding_3">
	<p class="subtitle_1 adieu_light"><?php echo $profile_header; ?></p>
	<p class="text_2 w_70"><?php echo $profile_description; ?></p>
	

	<div class="row">
		<?php
			// Custom query to retrieve Profiles post type posts
			$profiles_args = array(
				'post_type' => 'profiles', // Profiles post type slug
				'posts_per_page' => -1, // Number of posts to retrieve (-1 for all posts)
			);
			$profiles_query = new WP_Query($profiles_args);

			// Check if there are any Profiles posts
			if ($profiles_query->have_posts()) {
				// Loop through the Profiles posts
				while ($profiles_query->have_posts()) {
					$profiles_query->the_post();

					// Retrieve custom field values for last name, first name, and hobby
					$profile_name = get_post_meta(get_the_ID(), 'profile_name', true);
					$profile_platform = get_post_meta(get_the_ID(), 'profile_platform', true);
					$profile_platform = get_post_meta(get_the_ID(), 'profile_platform', true);
					$profile_platform_link = get_post_meta(get_the_ID(), 'profile_platform_link', true);
					$profile_image_id = get_post_meta(get_the_ID(), 'profile_image', true); // Image attachment ID
					$profile_image_url = wp_get_attachment_image_src($profile_image_id, 'full')[0]; // Image URL

					// Display the custom field values in the archive component
					?>
					<div style="padding-bottom: 30px;" class="col-md-3 col-4">
						<div class="profiles_hover_card">
							<?php if ($profile_image_url) { ?>
								<img src="<?php echo esc_url($profile_image_url); ?>" alt="<?php echo $profile_name; ?>">
							<?php } ?>
							<div class="profiles_hover_content">
								<p class="text_2 mb-0 bold_2"><?php echo esc_html($profile_name); ?></p>
								<a target="_blank" href="<?php echo esc_html($profile_platform_link); ?>" class="text_2"><?php echo esc_html($profile_platform); ?></a>
							</div>
						</div>
					</div>
					<?php
				}

				// Reset the post data
				wp_reset_postdata();
			} else {
				// No Profiles posts found
				echo 'No Profiles found.';
			}
		?>
	</div>
</div>




<?php get_footer(); ?>