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
                <div class="row padding_bottom_xl">
                    <div class="col col-sm-8 col-md-5 text_1"><?php echo the_field('about_text'); ?></div>
                </div>
                <div class="w-100 text-right">
                    <p class="title_2 adieu_light"><?php echo the_field('about_header_3'); ?></p>
                </div>
            </div>
            <div>
                <div class="work_area_section">
                    <div class="content work_area_content section_padding_3">
                        <p class="work_area_header adieu_light"><?php echo the_field('about_work_area_title'); ?></p>
                        <p class="w-50 text_1 padding_bottom_sm mb-0 work_area_description"><?php echo the_field('about_work_area_section_description'); ?></p>
                        <div class="work_area_list">
                            <?php  
                                $popup_image_1 = get_field('about_work_area_image_1');
                                $popup_image_2 = get_field('about_work_area_image_2');
                        
                                if(have_rows('about_work_area_list') ):
                                    while( have_rows('about_work_area_list') ) : the_row();
                                        $work_area_array = array( 
                                            'popup_image_1' => $popup_image_1,
                                            'popup_image_2' => $popup_image_2,
                                            'topic' => get_sub_field('about_work_area_topic'),
                                            'description' => get_sub_field('about_work_area_description'),
                                        );

                                        get_template_part('includes/animated', 'box', $work_area_array );                       
                                    endwhile;                            
                                endif;
                            ?>
                            <?php get_template_part('includes/animated-boxes-script') ?>
                        </div>
                        <div class="talk_to_container lg_ padding_top_xs">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-thin-icon-white.png"/>
                            <a href="<?php echo site_url('/cases');?>" class="cta_link">Learn more</a>
                        </div>
                    </div>
                </div>

<!-- SECTION: SELECTED CLIENTS -->
                <div class="section_type_3 about_clients_section">
                    <div class="content">
                        <div class="padding_bottom_lg padding_top_xs">
                            <div class="pb-5">
                                <?php 
                                $image = get_field('about_clients_logos_collage');
                                if( $image ): ?>
                                    <div class="w-100"><img class="w-100 h-auto" src="<?php echo esc_url($image['url']); ?>" alt="Client logos" /></div>
                                <?php endif; ?>
                            </div>
                            <div class="selected_clients_text_content">
                                <div>
                                    <p class="subtitle_1 adieu_light"><?php echo the_field('about_clients_title')?></p>
                                </div>
                                <div class="grid_child_mobile_large">
                                    <div class="text_2 font-weight-light mb-5"><?php echo the_field('about_clients_text')?></div>
                                    <div class="talk_to_container sm_">
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-thin-icon-white.png"/>
                                        <a href="<?php echo site_url('/contact');?>" class="cta_link"><?php echo the_field('about_clients_button'); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="content">
                <div class="quote_section padding_top_sm padding_bottom_lg">
                    <div>
                        <div class="quote_text grid_child_mobile_large"><?php echo the_field('about_quote'); ?></div>
                        <div class="grid_child_mobile_small">
                            <p><?php echo the_field('about_quoted_from'); ?>, <?php echo the_field('about_quote_role'); ?></p>
                            <div class="talk_to_container sm_">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-thin-icon-black.png"/>
                                <a target="_blank" href="<?php echo the_field('about_teamtailor_url');?>" class="cta_link"><?php echo the_field('about_quote_button'); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="grid_child_mobile_small">
                       <img src="<?php echo esc_url($profile_image['url']); ?>" />
                    </div>
                </div>
            </div>

        </div>
        
    </section>

<?php get_footer(); ?>