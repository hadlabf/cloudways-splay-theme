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
	$large_image = get_field('case_large_image');
	$profile_header = get_field('case_profile_section_header');
	$profile_description = get_field('case_profile_section_description');
	$profile_section_link = get_field('case_profile_section_link_text');
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
		<script src="https://player.vimeo.com/api/player.js"></script>
	</div>
<?php endif; ?>

<!-- 2. INTRO -->
<div class="case_single_page border_bottom_primary">
	<div class="content section_padding_3">
		<h1 class="large_title adieu_bold pb-5"><?php echo $name?></h1>
		<div class="d-flex flex-row row">
			<div class="d-flex flex-column col-4">
				<p class="text_1 bold_1 mb-1">Client:</p>
				<p class="text_1 bold_1"><?php echo $customer; ?></p>
			</div>
			<div class="d-flex flex-column col-8">
				<p class="text_1 bold_1 mb-1">Services:</p>
				<div class="d-flex flex-row">
					<?php if(have_rows('case_service_tag_list') ):
							while( have_rows('case_service_tag_list') ) : the_row(); ?>
								<p class="text_1 bold_1 service_tag"><?php echo the_sub_field('case_service_tag'); ?></p>
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
<?php get_template_part('includes/section', 'kpi', $channel_stats );?>

<!-- 4. VIDEOS -->
<?php if( have_rows('case_videos_list')  ) : ?>
<div class="content padding_top_lg">
	<div class="d-flex flex-row">
		<?php while( have_rows('case_videos_list') ): 
			$video_list_vimeo_id = get_sub_field('case_videos_list_vimeo_id');
			$video_list_title = get_sub_field('case_videos_list_title');
		?>
			<div class="d-flex flex-column">
				<div>
					<div style="padding:43.06% 0 0 0;position:relative;width:100%;max-width:100vw;">
						<iframe src="https://player.vimeo.com/video/<?php echo esc_html($video_list_vimeo_id); ?>?autoplay=1&amp;muted=1&amp;loop=1&amp;autopause=0&amp;controls=0&amp;showinfo=0&amp;title=0&amp;byline=0&amp;portrait=0&amp;quality=1080p" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="REEL_WEB_2023_v2"></iframe>
					</div>
					<script src="https://player.vimeo.com/api/player.js"></script>
				</div>
				<p class="text_1 bold_1"><?php echo $video_list_title; ?></p>
			</div>
         <?php endwhile; ?>
	</div>
</div>
<?php endif;?>

<!-- 5. VERTICAL IMAGES -->
<div class="content padding_top_lg">
	<div class="d-flex flex-column">
		<div class="vertical_image_wrapper d-flex flex-row justify-content-between">
			<?php if( $vertical_images ) : foreach( $vertical_images as $image ): ?>
            	<img class="h-100 w-auto" src="<?php  echo $image["url"]; ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endforeach; endif;?>
		</div>
		<div class="text_2 section_padding_1 w_70"><?php echo $text;?></div>
	</div>
</div>

<img src="<?php echo $large_image["url"];?>" />

<!-- 6. PROFILES -->
<?php if( have_rows('case_profile_list') ): ?>
<div class="content section_padding_3">
	<p class="subtitle_1 adieu_light"><?php echo $profile_header; ?></p>
	<p class="text_1 w_70"><?php echo $profile_description; ?></p>
	<div class="pt-5 profiles_grid">	
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
	<div class="talk_to_container">
		<img src="<?php echo get_template_directory_uri(); ?>/images/arrow-icon-black.png"/>
		<a target="_blank" href="<?php echo site_url('/influencers');?>" class="cta_link"><?php echo $profile_section_link; ?></a>
	</div>
</div>
<?php endif;?>

<?php get_footer(); ?>