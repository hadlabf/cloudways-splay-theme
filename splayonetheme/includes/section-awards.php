
<div class="section_secondary not_fullsize">
    <div class="content">
        <h1 class="adieu_bold sp_header"><?php echo the_field('home_award_header'); ?></h1>
        <p class="col-10 mx-auto sp_text"><?php echo the_field('home_award_text'); ?></p>
        <div class="d-flex justify-content-center">
            <a href="<?php echo site_url('/about');?>" class="primary_button"><?php echo the_field('home_award_button'); ?></a>
        </div>
        <?php 
            $image = get_field('home_award_logo_collage');
            if( !empty($image) ): ?>
                <img id="splay-awards-image" style="max-height:100px;width:auto;" src="<?php echo esc_url($image['url']) ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
    </div>
</div>