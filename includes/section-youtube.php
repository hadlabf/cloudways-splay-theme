<div class="border_bottom_primary">
	<div class="content section_padding_3">
	<?php if (!empty($args['total_views'])) : ?>
		<div class="d-flex flex-column">
			<p class="text_2 mb-0">Views:</p>
			<p class="kpi_1"><?php echo $args['total_views'];?></p>
		</div>
		<?php endif; ?>
		<div class="d-flex flex-row justify-content-between">
		<?php if (!empty($args['total_likes'])) : ?>
			<div class="d-flex flex-column">
				<p class="text_2 mb-0">Likes:</p>
				<p class="kpi_2">            
					<?php 
					echo $args['total_likes'];
					if ($args['total_likes'] > 1000) {echo "k";}
					?>
				</p>
			</div>
			<?php endif; ?>
			<?php if (!empty($args['total_time_hours'])) : ?>
			<div class="d-flex flex-column">
				<p class="text_2 mb-0">Viewing time:</p>
				<p class="kpi_2"><?php echo $args['total_time_hours'];?>h</p>
			</div>
			<?php endif; ?>
			<?php if (!empty($args['profiles_activated'])) : ?>
			<div class="d-flex flex-column">
				<p class="text_2 mb-0">Profiles activated:</p>
				<p class="kpi_2"><?php echo $args['profiles_activated'];?></p>
			</div>
			<?php endif; ?>

			<div class="d-flex flex-column justify-content-end pb-4">
				<p class="text_2">And counting...</p>
			</div>
		</div>
	</div>
</div>