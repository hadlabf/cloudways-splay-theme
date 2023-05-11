<div class="d-flex flex-column w-100 thumbnail_item">
    <img class="case_img" src="<?php echo esc_url($args['data']['image_url']);?>" alt="<?php echo $args['data']['case_name']; ?>"/>
    <div class="d-flex flex-row pt-2">
        <p class="text-uppercase adieu_regular pr-3"><?php echo $args['data']['client']; ?></p>
        <p class="adieu_light"><?php echo $args['data']['case_name']; ?></p>
    </div>

</div>