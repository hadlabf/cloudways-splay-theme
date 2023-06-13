<div class="people_card person-card <?php echo $args['class']; ?>">
    <img class="people_img" src="<?php echo $args['data']['profile_picture']['url'];?>" />
    
    <div class="front_page">
        <p class="mb-0 bold_1"><?php echo $args['data']['full_name']; ?></p>
        <p><?php echo $args['data']['role']; ?></p>
    </div>

    <div class="back_page">
        <div>
            <p class="mb-0 bold_1"><?php echo $args['data']['full_name']; ?></p>
            <p class="mb-0"><?php echo $args['data']['role']; ?></p>
        </div>
        <div>
            <?php if ( !empty($args['data']['email']) ) : ?>
                <a target="_blank" href="mailto:<?php echo $args['data']['email'];?>">
                    <p class="mb-0 text_sm text_ellipsis"><?php echo $args['data']['email']; ?></p>
                </a>
            <?php endif; ?>
            <?php if ( !empty($args['data']['phone']) ) : ?>
                <a target="_blank" href="tel:<?php echo $args['data']['phone'];?>">
                    <p class="mb-0 text_sm"><?php echo $args['data']['phone']; ?></p>
                </a>
            <?php endif; ?>
        </div>
    </div>
    
</div>