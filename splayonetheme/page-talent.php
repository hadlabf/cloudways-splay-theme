<?php
/*
Template Name: Talent Page
*/
?>

<?php get_header(); ?>
    <section>
        <div class="page_container pb-5">
            
<!-- SECTION: INTRO -->
            <?php 
            $header_image = get_field('talent_header_image');
            $talent_vimeo_id = get_field('talent_header_vimeo_id');
            ?>
                <?php 
                if( !empty( $header_image ) ): ?>
                    <div class="about_header">
                        <img class="about_header_image" src="<?php echo esc_url($header_image['url']); ?>" />
                    </div>
                <?php endif; ?>
                <?php 
                if( !empty( $talent_vimeo_id ) ): ?>
                    <div style="padding:43.06% 0 0 0;position:relative;width:100%;max-width:100vw;">
                        <iframe src="https://player.vimeo.com/video/<?php echo esc_html($talent_vimeo_id); ?>?autoplay=1&amp;muted=1&amp;loop=1&amp;autopause=0&amp;controls=0&amp;showinfo=0&amp;title=0&amp;byline=0&amp;portrait=0&amp;quality=1080p" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="REEL_WEB_2023_v2"></iframe>
                    </div>
                    <script src="https://player.vimeo.com/api/player.js"></script>
                    <img class="about_header_image" src="<?php echo esc_url($header_image['url']); ?>" />
                <?php endif; ?>
            <div class="content">
                <div class="row pb-5">
                    <div class="col col-sm-6 title_1 adieu_light"><?php echo the_field('talent_header'); ?></div>
                    <div class="col col-sm-6 text_2"><?php echo the_field('talent_text'); ?></div>
                </div>
                <div class="w-100 text-right">
                    <p class="title_2 adieu_light"><?php echo the_field('about_header_3'); ?></p>
                </div>
            </div>

<!-- SECTION: WHY US? -->
            <div class="why_us_section">
                <div class="content work_area_content">
                    <p class="work_area_header adieu_light w-100 text-center pb-3"><?php echo the_field('talent_why_us_title'); ?></p>
                    <div class="work_area_list">
                        <?php  
                            if(have_rows('talent_why_us_list') ):
                                while( have_rows('talent_why_us_list') ) : the_row(); ?>
                                    <div class="col-6 col-sm-4 p-0 area_item_wrapper">
                                        <div class="area_item">
                                            <p id="topic" class="adieu_light"><?php echo the_sub_field('talent_why_us_title'); ?></p>
                                            <p class="text_2"><?php echo the_sub_field('talent_why_us_text'); ?></p>
                                        </div>
                                    </div>
                                <?php                         
                                endwhile;                            
                            endif;
                        ?>
                        <div class="col-6 col-sm-4 p-0 area_item_wrapper">
                            <div class="area_item d-flex align-items-end justify-content-end">
                                <p id="topic" class="adieu_light">and so much more!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row quote_section">
                    <div class="col-11">
                        <p class="large_title"><?php echo the_field('talent_contact_cta_text'); ?></p>
                        <a target="_blank" href="mailto:<?php echo the_field('talent_contact_person_email');?>" class="cta_link">Talk to <?php echo the_field('talent_contact_person'); ?></a>
                    </div>
                </div>
            </div>

<!-- SECTION: PODCAST -->
            <div class="section_type_3">
                <?php 
                $podcast_thumbnail_img = get_field('talent_podcast_header_image');
                $podcast_description = get_field('talent_podcast_section_description');
                ?>
                <img src="<?php echo $podcast_thumbnail_img['url']; ?>" alt="podcast" />
                <div class="content">
                    <p class="mt-4 text_2"><?php echo $podcast_description; ?></p>
                    <div class="section_padding_3">
                        <div class="podcast_items w-100 d-flex flex-row flex-wrap">
                        <?php 
                            if(have_rows('talent_podcast_list') ):
                                while( have_rows('talent_podcast_list') ) : the_row();
                                    $author = get_sub_field('talent_podcast_list_author');
                                    $name = get_sub_field('talent_podcast_list_podcast_name');
                                    $link = get_sub_field('talent_podcast_list_link');
                                    $image = get_sub_field('talent_podcast_list_image');
                                ?>

                                <a target="_blank" href="<?php echo $link;?>" class="area_item_wrapper">
                                    <div class="hover_card ">
                                        <div class="front_page">
                                            <p class="text_1 mb-1"><?php echo $author; ?></p>
                                             <p class="small_title"><?php echo $name; ?></p>
                                        </div>
                                        <img class="back_page" src="<?php echo $image['url'];?>" />
                                    </div>
                                </a>

                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

<!-- SECTION: TALENTS -->
            <div class="content section_padding_1">
                <h1 class="page_title"><?php echo the_field('talent_people_section_title'); ?> </h1>

                <div class="people_cards">
                    <?php 
                        if( have_rows('talent_people_list') ):
                             while( have_rows('talent_people_list') ) : the_row();
                                $full_name = get_sub_field('talent_people_full_name');
                                $role = get_sub_field('talent_people_role');
                                $country = get_sub_field('talent_people_country');
                                $phone = get_sub_field('talent_people_phone');
                                $email = get_sub_field('talent_people_email');
                                $profile_picture = get_sub_field('talent_people_profile_picture');
                                    
                                $people_data = array( 
                                    'class' => 'featured-home',
                                    'data'  => array(
                                    'full_name' => $full_name,
                                    'role' => $role,
                                    'country' => $country,
                                    'phone' => $phone,
                                    'email' => $email,
                                    'profile_picture' => $profile_picture,
                                     )
                                     );
                                    
                                get_template_part('includes/person', 'card', $people_data );
                            endwhile;                            
                        else :
                        endif;
                    ?>
                </div>

                <div class="mt-3 w-100 d-flex justify-content-center">
                    <button class="secondary_button"><?php echo the_field('talent_people_section_button'); ?></button>
                </div>
            </div>

        </div>
        
    </section>
<?php  
    get_footer(); 
?>