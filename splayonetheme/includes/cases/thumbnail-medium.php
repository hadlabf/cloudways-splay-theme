<a href="<?php the_permalink();?>" class="col-md-8 p-0 thumbnail_item">
    <?php if (!empty($args['data']['image_url'])) : ?>
        <img class="case_img loaded_img_first" src="<?php echo esc_url($args['data']['image_url']);?>" alt="<?php echo $args['data']['case_name']; ?>"/>
    <?php endif; ?>
    <div class="d-flex flex-row pt-3 gap_lg">
        <p class="small_title adieu_regular"><?php echo $args['data']['client']; ?></p>
        <p class="small_title adieu_light"><?php echo $args['data']['case_name']; ?></p>
    </div>
</a>