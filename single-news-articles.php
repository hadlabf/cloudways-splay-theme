<?php get_header(); ?>

<?php
    $title = get_field('news_title');
    $text = get_field('news_text');
    $date = get_field('news_date');
?>

<div style="min-height: 800px;" class="content section_padding_3 h-100">

	<h1 class="title_1"><?php echo $title;?></h1>
	<p class="text_2"><?php echo $text;?></p>
	<p class="text_2 adieu_light pt-3"><?php echo $date;?></p>


</div>



<?php get_footer(); ?>