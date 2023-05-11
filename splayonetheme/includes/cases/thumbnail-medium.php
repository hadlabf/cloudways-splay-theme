<div class="col-md-8 p-0 thumbnail_item">
    <?php if (!empty($args['data']['image_url'])) : ?>
        <img class="case_img" src="<?php echo esc_url($args['data']['image_url']);?>" alt="<?php echo $args['data']['case_name']; ?>"/>
    <?php endif; ?>
    <div class="d-flex flex-row pt-2">
        <p class="text-uppercase adieu_regular pr-3"><?php echo $args['data']['client']; ?></p>
        <p class="adieu_light"><?php echo $args['data']['case_name']; ?></p>
    </div>
</div>