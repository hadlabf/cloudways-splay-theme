
<div class="section_secondary not_fullsize">
    <div class="content">
        <?php 
            $header = get_field('home_contact_header');
            $text = get_field('home_contact_text');
            $button = get_field('home_contact_button');
        ?>
        <?php if( empty($header) && empty($text) ): 
            $header = get_field('home_contact_header', 299);
            $text = get_field('home_contact_text', 299);
            $button = get_field('home_contact_button', 299);
            endif;    
        ?>
        <h1 class="page_title"><?php echo $header; ?></h1>
        <p class="sp_text"><?php echo $text; ?></p>
        <?php if( !empty($button) ): ?>
            <div class="d-flex justify-content-center">
                <a href="<?php echo site_url('/contact');?>" class="primary_button"><?php echo $button; ?></a>
            </div>
        <?php endif; ?> 
    </div>
</div>