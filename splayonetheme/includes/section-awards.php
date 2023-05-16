
<div class="section_secondary">
    <div class="content">
        <h1 class="adieu_bold sp_header"><?php echo the_field('home_award_header'); ?></h1>
        <p class="col-10 mx-auto sp_text"><?php echo the_field('home_award_text'); ?></p>
        <div class="d-flex justify-content-center">
            <a href="<?php echo site_url('/about');?>" class="primary_button"><?php echo the_field('home_award_button'); ?></a>
        </div>
        <?php 
            $images = get_field('home_award_gallery');
            if( $images ): ?>
                <div class="award_image_carousel row">
                    <?php foreach( $images as $image ): ?>
                        <div class="">
                            <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>
                    <?php endforeach; ?>
                </div>
        <?php endif; ?>
    </div>
</div>