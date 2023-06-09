<?php get_header(); ?>
<!-- 
	1. HEADER
	2. INTRO
	3. KPI
	4. VIDEOS
	5. VERTICAL IMAGES
 -->
<?php 
	$header_image = get_field('article_header_image');
	$title = get_field('article_title');
	$date = get_field('article_date');
	$country = get_field('article_country');
	$city = get_field('article_city');
	$text_content = get_field('article_text_content');
	$foot_text = get_field('article_foot_text');
	$button_text = get_field('article_button_link_text');
	$button_url = get_field('article_button_link_url');
?>

<!-- 1. HEADER -->
<?php if( !empty( $header_image ) ): ?>
	<div class="case_single_image_wrapper">
		<img class="w-100 h-auto" src="<?php  echo $header_image["url"]; ?>" alt="<?php echo esc_attr($header_image['alt']); ?>" />
	</div>
<?php endif; ?>


<!-- 2. INTRO -->
<div class="content">
	<div class="row pb-3">
		<div class="ml-auto col col-sm-5 text_1 pt-4">
			<div class="row">
				<div class="col p-0">
					<p class="adieu_light text_2"><?php echo $date; ?></p>
				</div>
				<div class="col p-0">
					<p class="adieu_light text_2 mb-0"><?php echo $country; ?></p>
					<p class="adieu_light text_2"><?php echo $city; ?></p>
				</div>
			</div>
		</div>
	</div>
	<div class="row pb-5">
		<div class="col col-sm-6 mr-auto"><h1 style="line-height:1.15;" class="title_1 adieu_light"><?php echo $title; ?></h1></div>
		<div class="col col-sm-5 text_1 pt-4"><?php echo $text_content; ?></div>
	</div>
	<div class="w-100 text-right">
		<p style="text-decoration:underline;"class="title_2 adieu_light">Read Next <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-icon-white.png"/></p>
	</div>
</div>

<?php get_footer( null, [ 'footer_style' => 'footer_style_secondary' ] ); ?>