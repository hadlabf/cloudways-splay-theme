
<div style="min-height: 600px;" class="content section_padding_3 h-100">
	<div class="error_card">
		<div class="row">
			<h1 class="col-5 text-align-top page_title adieu_black"><?php echo $args['status_code'];?></h1>
			<?php if ( !empty($args['message']) ) : ?>
				<div class="col-7 d-flex align-items-end">
					<p class="text_1"><?php echo $args['message'];?></p>
				</div>
			<?php endif; ?>
		</div>
		<?php if ( $args['status_code'] === 403 ) : ?>
			<p class="text_1">The <span class="adieu_light">HTTP 403</span> Forbidden response status code indicates that the server understands the request but refuses to authorize it.</p>
		<?php endif; ?>
	</div>
</div>

