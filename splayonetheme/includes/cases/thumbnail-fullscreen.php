<div class="d-flex flex-column w-100 thumbnail_item">
    <?php if (!empty($args['data']['image_url'])) : ?>
        <img class="case_img" src="<?php echo esc_url($args['data']['image_url']);?>" alt="<?php echo $args['data']['case_name']; ?>"/>
    <?php endif; ?>
    <div class="d-flex flex-row pt-2 gap_7">
        <p class="small_title adieu_regular"><?php echo $args['data']['client']; ?></p>
        <p class="small_title"><?php echo $args['data']['case_name']; ?></p>
    </div>

</div>