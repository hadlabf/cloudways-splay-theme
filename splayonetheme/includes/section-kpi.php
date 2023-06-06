<?php 
	$large_value = get_field('case_kpi_large_value');
	$large_label = get_field('case_kpi_large_label');
	$foot_text = get_field('case_kpi_foot_text');
?>
<div class="border_bottom_primary">
	<div class="content section_padding_3">
		
		<?php if (!empty($large_value)) : ?>
			<div class="d-flex flex-column">
				<p class="text_2 mb-0"><?php echo $large_label;?></p>
				<p style="line-height:1.2;" class="kpi_1"><?php echo $large_value;?></p>
			</div>
		<?php endif; ?>

		<div class="d-flex flex-row justify-content-between">

			<?php 
				if( have_rows('case_kpi_list') ):
				while( have_rows('case_kpi_list') ) : the_row();
					$value = get_sub_field('case_kpi_list_value');
					$label = get_sub_field('case_kpi_list_label');
					?>
					<div class="d-flex flex-column">
						<p class="text_2 mb-0"><?php echo $label; ?></p>
						<p class="kpi_2"><?php echo $value; ?></p>
					</div>
				<?php
				endwhile;
			endif;
			?>

			<?php if (!empty($foot_text)) : ?>
				<div class="d-flex flex-column justify-content-end pb-4">
					<p class="text_2"><?php echo $foot_text; ?></p>
				</div>
			<?php endif; ?>

		</div>
	</div>
</div>