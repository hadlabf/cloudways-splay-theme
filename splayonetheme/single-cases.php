<?php get_header(); ?>
<!-- 
	1. HEADER
	2. INTRO
	3. KPI
	4. VIDEOS
	5. VERTICAL IMAGES
 -->
<?php 
	$customer = get_field('case_customer');
	$name = get_field('case_name');
	$header_image = get_field('case_header_image');
	$vimeo_id = get_field('case_vimeo_id');
	$description = get_field('case_description');
	$vertical_images = get_field('case_vertical_images');
	$text = get_field('case_section_text');
	$profile_header = get_field('case_profile_section_header');
	$profile_description = get_field('case_profile_section_description');
	$profile_section_link = get_field('case_profile_section_link_text');
	$large_image = get_field('case_large_image');
	$large_video_id = get_field('case_large_video_vimeo_id');
?>

<!-- 1. HEADER -->
<?php if( !empty( $header_image ) ): ?>
	<div class="case_single_image_wrapper">
		<img class="w-100 h-auto" src="<?php  echo $header_image["url"]; ?>" alt="<?php echo esc_attr($header_image['alt']); ?>" />
	</div>
<?php endif; ?>
<?php 
if( !empty( $vimeo_id ) ): ?>
	<div>
		<div style="padding:43.06% 0 0 0;position:relative;width:100%;max-width:100vw;">
			<iframe src="https://player.vimeo.com/video/<?php echo esc_html($vimeo_id); ?>?autoplay=1&amp;muted=1&amp;loop=1&amp;autopause=0&amp;controls=0&amp;showinfo=0&amp;title=0&amp;byline=0&amp;portrait=0&amp;quality=1080p" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="REEL_WEB_2023_v2"></iframe>
		</div>
	</div>
<?php endif; ?>

<!-- 2. INTRO -->
<div class="case_single_page">
	<div class="content section_padding_3">
		<h1 class="title_2 adieu_bold pb-5"><?php echo $name?></h1>
		<div class="d-flex flex-row row">
			<div class="mobile_full d-flex flex-column col-4">
				<p class="text_1 bold_1 mb-1">Client:</p>
				<p class="text_1 bold_1"><?php echo $customer; ?></p>
			</div>
			<div class="mobile_full d-flex flex-column col-8">
				<p class="text_1 bold_1 mb-1">Services:</p>
				<div class="d-flex flex-row flex-wrap mb-3">
					<?php if(have_rows('case_service_tag_list') ):
							while( have_rows('case_service_tag_list') ) : the_row(); ?>
								<p class="text_1 bold_1 service_tag mb-0"><?php echo the_sub_field('case_service_tag'); ?></p>
							<?php                         
							endwhile;                            
						endif;
					?>
				</div>
				<div class="text_1"><?php echo $description; ?></div>
			</div>
		</div>
	</div>
</div>

<!-- 3. KPI -->
<?php get_template_part('includes/section', 'kpi' );?>

<!-- 4. VIDEOS -->
<?php if( have_rows('case_videos_list')  ) : ?>
<div class="content padding_bottom_lg">
	<div class="justify-content-center case_video_list">
		<?php while( have_rows('case_videos_list') ): the_row();
			$video_list_link = get_sub_field('case_videos_list_link');
			$video_list_image = get_sub_field('case_videos_list_image');
			$video_list_title = get_sub_field('case_videos_list_title');
			if( !empty($video_list_image) ) : ?>
				<div class="case_video_list_item text-center">
					<a target="_blank" href="<?php echo esc_url($video_list_link); ?>" class="video_animation">
						<div class="case_video_image_wrapper">
							<img src="<?php echo esc_url($video_list_image['url']); ?>"/>
						</div>
					</a>
					<p class="text_1 bold_1 pt-3"><?php echo $video_list_title; ?></p>
				</div>
         <?php endif; endwhile; ?>
	</div>
</div>
<?php endif;?>

<!-- 5. VERTICAL IMAGES -->
<?php if ( !empty($text) ||  !empty($vertical_images) ) : ?>
	<div class="content padding_bottom_lg">
		<div class="d-flex flex-column">
		<?php if( $vertical_images ) : ?>
			<div class="vertical_image_wrapper d-flex flex-row justify-content-between <?php if ( !empty($text) ) : echo "padding_bottom_sm"; endif; ?>">
				<?php foreach( $vertical_images as $image ): ?>
					<img class="h-100 w-auto" src="<?php  echo $image["url"]; ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				<?php endforeach;?>
			</div>
			<?php endif;?>
			<?php if ( !empty($text) ) : ?>
				<div class="text_1 w_70"><?php echo $text;?></div>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>

<!-- 6. LINKED SECTION -->
<?php 
	$linked_title = get_field('case_linked_section_title');
	$linked_text = get_field('case_linked_section_text');
	$linked_label = get_field('case_linked_section_link_label');
	$linked_link = get_field('case_linked_section_link_url');
	$linked_image = get_field('case_linked_section_image');
?>
<?php if( !empty($linked_title) && !empty($linked_text) ): ?>
<div class="section_secondary">
	<div class="content">
		<div class="linked_section d-flex flex-row align-items-start">
			<?php if ( !empty($linked_image) ) : ?>
				<img class="linked_section_img" src="<?php echo $linked_image['url'];?>" alt="<?php echo $linked_title; ?>">
			<?php endif; ?>
			<div class="linked_section_text_content">
				<div style="justify-content:space-evenly;" class="d-flex flex-column text-left">
					<div class="pb-5">
						<p class="medium_title"><?php echo $linked_title; ?></p>
						<div class="text_1"><?php echo $linked_text; ?></div>
					</div>
					<?php if ( !empty($linked_link) && !empty($linked_label) ) : ?>
						<div class="pt-5 talk_to_container sm_">
							<img src="<?php echo get_template_directory_uri(); ?>/images/arrow-thin-icon-white.png"/>
							<a target="_blank" href="<?php echo esc_url($linked_link); ?>" class="cta_link"><?php echo $linked_label; ?></a>
						</div>
					<?php endif; ?>
					
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif;?>

<?php if( !empty($large_video_id) || !empty($large_image) ): ?>
	<?php if( !empty($large_image) ): ?>
		<img src="<?php echo $large_image["url"];?>" />
	<?php endif;?>
	<?php if( !empty($large_video_id) ): ?>
		<div>
			<div style="padding:43.06% 0 0 0;position:relative;width:100%;max-width:100vw;">
				<iframe src="https://player.vimeo.com/video/<?php echo esc_html($large_video_id); ?>?autoplay=1&amp;muted=1&amp;loop=1&amp;autopause=0&amp;controls=0&amp;showinfo=0&amp;title=0&amp;byline=0&amp;portrait=0&amp;quality=1080p" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="REEL_WEB_2023_v2"></iframe>
			</div>
			<script src="https://player.vimeo.com/api/player.js"></script>
		</div>
	<?php endif;?>
<?php endif;?>

<!-- 7. PROFILES -->
<?php if( have_rows('case_profile_list') ): ?>
<div class="content section_padding_3">
	<p class="subtitle_1 adieu_light"><?php echo $profile_header; ?></p>
	<p class="text_1 w-50"><?php echo $profile_description; ?></p>
	<div class="pt-4 profiles_grid">	
		<?php while( have_rows('case_profile_list') ) : the_row();
			$full_name = get_sub_field('case_profile_full_name');
			$link = get_sub_field('case_profile_link_url');
			$link_label = get_sub_field('case_profile_link_label');
			$profile_picture = get_sub_field('case_profile_profile_picture');
			?> 
			<div class="profiles_hover_card">
				<?php if ($profile_picture) { ?>
					<img src="<?php echo $profile_picture['url'];?>" alt="<?php echo $full_name; ?>">
				<?php } ?>
				<div class="profiles_hover_content">
					<p class="text_1 mb-0 bold_2"><?php echo esc_html($full_name); ?></p>
					<a target="_blank" href="<?php echo esc_url($link);?>" class="text_1"><?php echo $link_label; ?></a>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
	<div class="py-4 talk_to_container sm_">
		<img src="<?php echo get_template_directory_uri(); ?>/images/arrow-thin-icon-black.png"/>
		<a href="<?php echo site_url('/influencers');?>" class="cta_link text_sm"><?php if ( !empty($profile_section_link) ) : echo $profile_section_link; else : echo "Check out our influencers"; endif; ?></a>
	</div>
</div>
<?php endif;?>
<?php get_footer(); ?>