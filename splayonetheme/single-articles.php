<?php get_header( null, [ 'header_style' => 'single_article' ] ); ?>
<?php 
	$header_image = get_field('article_header_image');
	$title = get_field('article_title');
	$date = get_field('article_date');
	$country = get_field('article_country');
	$city = get_field('article_city');
	$text_content = get_field('article_text_content');
	$content_image = get_field('article_content_image');
	$button_text = get_field('article_button_link_text');
	$button_url = get_field('article_button_link_url');
	$foot_text = get_field('article_foot_text');

	$image_size = getimagesize($content_image['url']);
?>

<!-- 1. HEADER -->
<?php if( !empty( $header_image ) ): ?>
	<div class="case_single_image_wrapper">
		<img class="w-100 h-auto" src="<?php  echo $header_image["url"]; ?>" alt="<?php echo esc_attr($header_image['alt']); ?>" />
	</div>
<?php endif; ?>


<!-- 2. INTRO -->
<div class="single_article_page">
	<div class="content padding_bottom_lg">

		<div class="row padding_bottom_sm">
			<div class="date_section ml-auto col col-sm-6 text_1 pt-4">
				<div class="row">
					<div class="col">
						<p class="adieu_light text_2"><?php echo $date; ?></p>
					</div>
					<div class="col">
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
						<img style="right:calc(100vw - <?php echo $image_size[1];?>px);" class="w-100 h-auto" src="<?php  echo $content_image["url"]; ?>" alt="<?php echo esc_attr($content_image['alt']); ?>" />
					</div>
				<?php endif; ?>
			</div>

			<div class="col col-sm-6 article_column">
				<div class="text_1 pt-4"><?php echo $text_content; ?></div>
				<div class="w-100 pt-5">
					<div class="talk_to_container sm_ justify-content-end">
						<a target="_blank" href="<?php echo site_url('/contact');?>" class="cta_link pl-0 pr-4">Read Next </a>
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
<?php get_footer( null, [ 'footer_style' => 'footer_style_secondary' ] ); ?>