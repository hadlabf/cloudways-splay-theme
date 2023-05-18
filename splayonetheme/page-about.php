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
                            $popup_image_1 = get_field('about_work_area_image_1');
                            $popup_image_2 = get_field('about_work_area_image_2');
                            if(have_rows('about_work_area_list') ):
                                while( have_rows('about_work_area_list') ) : the_row(); ?>
                                    <div class="col-6 col-sm-4 p-0 area_item_wrapper">
                                        <div class="area_item">
                                            <div class="area_item_text_content">
                                                <p id="topic" class="adieu_light"><?php echo the_sub_field('about_work_area_topic'); ?></p>
                                                <p id="description"><?php echo the_sub_field('about_work_area_description'); ?></p>
                                            </div>
                                            <img class="popup_image_1" src="<?php echo $popup_image_1['url']; ?>" alt="Splay One">
                                            <img class="popup_image_2" src="<?php echo $popup_image_2['url']; ?>" alt="Splay One">
                                        </div>
                                    </div>
                                <?php                         
                                endwhile;                            
                            endif;
                        ?>
                        <script>
                           jQuery(document).ready(function ($) {
                                $('.area_item_wrapper').hover(
                                    function () {
                                        $(this).addClass('item_hovered');
                                        var hoveredIndex = $(this).index() + 1; // Get the index of the hovered element
                                        var $secondSibling;
                                        var $forthSibling;
                                        if (hoveredIndex >= 5) {
                                            $secondSibling = $(this).prevAll().eq(1);
                                            $forthSibling = $(this).prevAll().eq(3);
                                        } else {
                                            $secondSibling = $(this).nextAll().eq(1);
                                            $forthSibling = $(this).nextAll().eq(3);
                                        }
                                        if (!$secondSibling.length || !$forthSibling.length) {
                                            $secondSibling = $(this).siblings().eq(1);
                                            $forthSibling = $(this).siblings().eq(3);
                                        }
                                        $secondSibling.addClass('popup_active_one');
                                        $forthSibling.addClass('popup_active_two');
                                    },
                                    function () {
                                        $(this).removeClass('item_hovered');
                                        $(this).siblings().removeClass('popup_active_one');
                                        $(this).siblings().removeClass('popup_active_two');
                                    }
                                );
                            });
                        </script>
                    </div>
                </div>
            </div>

            <div class="section_type_3 about_clients_section">
                <div class="content">
                    <div class="padding_bottom_lg padding_top_sm">
                        <div class="padding_bottom_lg">
                            <?php 
                            $image = get_field('about_clients_logos_collage');
                            if( $image ): ?>
                                <div class="w-100"><img class="w-100 h-auto" src="<?php echo esc_url($image['url']); ?>" alt="Client logos" /></div>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <p class="subtitle_1 adieu_light"><?php echo the_field('about_clients_title')?></p>
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

            <div class="content">
                <div class="row quote_section section_padding_sm">
                    <div class="col-7 mr-auto">
                        <div class="quote_text"><?php echo the_field('about_quote'); ?></div>
                        <p><?php echo the_field('about_quoted_from'); ?>, <?php echo the_field('about_quote_role'); ?></p>
                        <div class="talk_to_container">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-icon-black.png"/>
                            <a target="_blank" href="<?php echo the_field('about_teamtailor_url');?>" class="cta_link"><?php echo the_field('about_quote_button'); ?></a>
                        </div>
                    </div>
                    <div class="col-4">
                       <img src="<?php echo esc_url($profile_image['url']); ?>" />
                    </div>
                </div>
            </div>

        </div>
        
    </section>

<?php get_footer( null, [ 'footer_style' => 'footer_style_secondary' ] ); ?>