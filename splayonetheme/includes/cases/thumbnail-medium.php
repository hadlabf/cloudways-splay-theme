<div class="col-md-8">
    <?php if (!empty($args['data']['image_url'])) : ?>
        <img class="case_img" src="<?php echo esc_url($args['data']['image_url']);?>" alt="<?php echo $args['data']['case_name']; ?>"/>
    <?php endif; ?>
    <div class="d-flex flex-row pt-2">
        <p class="text-uppercase adieu_regular pr-3"><?php echo $args['data']['customer']; ?></p>
        <p class="font-weight-bold adieu_light"><?php echo $args['data']['case_name']; ?></p>
    </div>
</div>