<?php 
	$profile_header = get_field('case_section_profile_header');
	$profile_description = get_field('case_section_profile_description');
	$profile_image = get_sub_field('case_section_profile_image');
	$profile_name = get_sub_field('case_section_profile_name');
	$profile_link = get_sub_field('case_section_profile_link');
?>

<?php if(have_rows('case_section_profile_list') ): ?>

<div class="content section_padding_3">
	<p class="subtitle_1 adieu_light"><?php echo $profile_header; ?></p>
	<p class="text_2 w_70"><?php echo $profile_description; ?></p>

    <div class="row">
    <?php while( have_rows('case_section_profile_list') ) : the_row(); ?>
        <p class="text_2 bold_1 service_tag">Name: <?php echo the_sub_field('case_section_profile_image')["url"]; ?> <?php echo the_sub_field('case_section_profile_name'); ?></p>
        <div style="padding-bottom: 30px;" class="col-md-3 col-4">
            <img src="<?php echo $profile_image["url"]; ?>">
			<div class="profiles_hover_card">
				<?php if ($profile_image) { ?>
					<img src="<?php  echo the_sub_field('case_section_profile_image')["url"]; ?>"  alt="<?php echo $profile_name?>">
				<?php } ?>
				<div class="profiles_hover_content">
					<p class="text_2 mb-0 bold_2"><?php echo the_sub_field('case_section_profile_name');  ?></p>
					<a target="_blank" href="<?php echo the_sub_field('case_section_profile_link') ?>" class="text_2"><?php echo esc_html($profile_platform); ?></a>
				</div>
			</div>
		</div>    
    <?php endwhile; ?>
    </div>

</div>

<?php endif;?>