<?php
/*
Template Name: About Page
*/
?>

<?php get_header(); ?>
    <section>
        <div class="page_container">
            <?php 
            $header_image = get_field('about_header_image');
            $profile_image = get_field('about_quote_image');
            ?>
            <div class="about_header">
                <?php 
                if( !empty( $header_image ) ): ?>
                    <img class="about_header_image" src="<?php echo esc_url($header_image['url']); ?>" />
                <?php endif; ?>
                <div class="about_header_content">
                    <div class="content h-100 d-flex flex-column justify-content-between">
                        <p id="about_header_1" class="about_header_text adieu_light"><?php echo the_field('about_header_1'); ?></p>
                        <p id="about_header_2" class="about_header_text adieu_light"><?php echo the_field('about_header_2'); ?></p>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row pb-5">
                    <div class="col col-sm-8 text_2"><?php echo the_field('about_text'); ?></div>
                </div>
                <div class="w-100 text-right">
                    <p class="title_2 adieu_light"><?php echo the_field('about_header_3'); ?></p>
                </div>
            </div>
            <div class="work_area_section">
                <div class="content work_area_content">
                    <p class="work_area_header adieu_light"><?php echo the_field('about_work_area_title'); ?></p>
                    <div class="work_area_list">
                        <?php  
                            if(have_rows('about_work_area_list') ):
                                while( have_rows('about_work_area_list') ) : the_row(); ?>
                                    <div class="col-6 col-sm-4 p-0 area_item_wrapper">
                                        <div class="area_item">
                                            <p id="topic" class="adieu_light"><?php echo the_sub_field('about_work_area_topic'); ?></p>
                                            <p id="description"><?php echo the_sub_field('about_work_area_description'); ?></p>
                                        </div>
                                    </div>
                                <?php                         
                                endwhile;                            
                            endif;
                        ?>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row quote_section section_padding_sm">
                    <div class="col-8">
                        <div class="quote_text"><?php echo the_field('about_quote'); ?></div>
                        <p><?php echo the_field('about_quoted_from'); ?>, <?php echo the_field('about_quote_role'); ?></p>
                        <div class="talk_to_container">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-icon-black.png"/>
                            <a target="_blank" href="mailto:<?php echo the_field('about_quote_email');?>" class="cta_link"><?php echo the_field('about_quote_button'); ?></a>
                        </div>
                    </div>
                    <div class="col-4">
                       <img src="<?php echo esc_url($profile_image['url']); ?>" />
                    </div>
                </div>
            </div>

            <div class="section_type_3 about_clients_section">
                <div class="content">
                    <div class="section_padding_3">
                        <div class="about_clients_logos">
                            <?php 
                            $images = get_field('about_clients_logos');
                            if( $images ): ?>
                                <div class="row">
                                    <?php foreach( $images as $image ): ?>
                                        <div class="col-2"><img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /></div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <p class="subtitle_1"><?php echo the_field('about_clients_title')?></p>
                            </div>
                            <div class="col-7">
                                <p class="text_2"><?php echo the_field('about_clients_text')?></p>
                                <div class="talk_to_container">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-icon-white.png"/>
                                    <a target="_blank" href="<?php echo site_url('/contact');?>" class="cta_link"><?php echo the_field('about_clients_button'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>

<?php get_footer( null, [ 'footer_style' => 'footer_style_secondary' ] ); ?>