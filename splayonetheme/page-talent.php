<?php
/*
Template Name: Talent Page
*/
?>

<?php get_header(); ?>
    <section>
        <div class="page_container pb-5 talent_page">
            
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
                    <div>
                        <div style="padding:43.06% 0 0 0;position:relative;width:100%;max-width:100vw;">
                            <iframe src="https://player.vimeo.com/video/<?php echo esc_html($talent_vimeo_id); ?>?autoplay=1&amp;muted=1&amp;loop=1&amp;autopause=0&amp;controls=0&amp;showinfo=0&amp;title=0&amp;byline=0&amp;portrait=0&amp;quality=1080p" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="REEL_WEB_2023_v2"></iframe>
                        </div>
                        <script src="https://player.vimeo.com/api/player.js"></script>
                    </div>
                <?php endif; ?>
            <div class="content talent_intro">
                <div class="row padding_bottom_sm">
                    <div class="col col-sm-6 title_1 adieu_light mr-auto"><?php echo the_field('talent_header'); ?></div>
                    <div class="col col-sm-5 text_1 pt-4"><?php echo the_field('talent_text'); ?></div>
                </div>
                <div class="w-100 text-right">
                    <p class="title_2 adieu_light"><?php echo the_field('about_header_3'); ?></p>
                </div>
            </div>

<!-- SECTION: WHY US? -->
            <div class="why_us_section work_area_section content">
                <div class="work_area_content">
                    <p class="work_area_header adieu_light"><?php echo the_field('talent_why_us_title'); ?></p>
                    <p class="w-50 text_1 padding_bottom_sm"><?php echo the_field('talent_why_us_section_description'); ?></p>
                    <div class="work_area_list">
                        <?php  
                            $popup_image_1 = get_field('talent_popup_image_1');
                            $popup_image_2 = get_field('talent_popup_image_2');
                    
                            if(have_rows('talent_why_us_list') ):
                                while( have_rows('talent_why_us_list') ) : the_row();
                                    $work_area_array = array( 
                                        'popup_image_1' => $popup_image_1,
                                        'popup_image_2' => $popup_image_2,
                                        'topic' => get_sub_field('talent_why_us_title'),
                                        'description' => get_sub_field('talent_why_us_text'),
                                    );
                                    
                                    get_template_part('includes/animated', 'box', $work_area_array );                       
                                endwhile;                            
                            endif;
                        ?>
                        <?php get_template_part('includes/animated-boxes-script') ?>
                    </div>

                </div>
            </div>

            <div class="content">
                <div class="row section_padding_sm">
                    <div class="col-11">
                        <p class="title_1 adieu_light mb-4"><?php echo the_field('talent_contact_cta_text'); ?></p>
                        <div class="talk_to_container">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-thin-icon-black.png"/>
                            <a target="_blank" href="mailto:<?php echo the_field('talent_contact_person_email');?>" class="cta_link">Talk to <?php echo the_field('talent_contact_person'); ?></a>
                        </div>
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
                    <div class="padding_top_sm padding_bottom_lg">
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
<?php 
if( have_rows('talent_influencers_list') ):
    $influencers = array(
        'sw' => array(),
        'denmark' => array(),
        'norway' => array(),
        'finland' => array(),
    );
    while( have_rows('talent_influencers_list') ) : the_row();
        $full_name = get_sub_field('talent_influencers_full_name');
        $role = get_sub_field('talent_influencers_role');
        $country = get_sub_field('talent_influencers_country');
        $profile_picture = get_sub_field('talent_people_profile_picture');
        $influencer_links = array();
        if( have_rows('talent_influencers_link_list') ):
            while( have_rows('talent_influencers_link_list') ) : the_row();
                $influencer_link = get_sub_field('talent_influencers_link_list_url');
                $influencer_link_label = get_sub_field('talent_influencers_link_list_label');
                $influencer_links[] = array(
                    'url' => $influencer_link,
                    'label' => $influencer_link_label,
                );
            endwhile;
        endif;
        $influencer = array(
            'full_name' => $full_name,
            'role' => $role,
            'country' => $country,
            'profile_picture' => $profile_picture,
            'links' => $influencer_links,
        );
        $influencers[$country][] = $influencer;
        
    endwhile;                            
endif;
?>
<div class="content section_padding_1">
    <h1 class="title_1 adieu_black">Influencers</h1>
    <p class="text_1"><?php echo the_field('talent_people_section_description'); ?> </p>
    <div class="category_filtering_buttons">
        <?php if (count($influencers['sweden']) > 0): ?>
            <button class="secondary_button category_button active" data-country="sweden">Sweden</button>
        <?php endif; ?>
        <?php if (count($influencers['denmark']) > 0): ?>
            <button class="secondary_button category_button" data-country="denmark">Denmark</button>
        <?php endif; ?>
        <?php if (count($influencers['norway']) > 0): ?>
            <button class="secondary_button category_button" data-country="norway">Norway</button>
        <?php endif; ?>
        <?php if (count($influencers['finland']) > 0): ?>
            <button class="secondary_button category_button" data-country="finland">Finland</button>
        <?php endif; ?>
    </div>
    <div class="person-cards-wrapper">
        <?php foreach ($influencers as $country => $country_influencers): ?>
            <div style="display:<?php if($country === "sw") : echo "block;"; endif; ?> none;" class="people_cards_country_section <?php echo $country; ?>">
                <div class="people_cards_archive  <?php echo $country; ?>">
                    <?php 
                    $itemCount = 0;
                    foreach ($country_influencers as $influencer): 
                    ?>
                        <div class="people_card  <?php if($itemCount > 7): echo "d-none"; endif; ?> <?php echo $country; ?>">
                            <img class="people_img" src="<?php echo $influencer['profile_picture']['url'];?>" />
                            
                            <div class="front_page">
                                <p class="mb-0 bold_1"><?php echo $influencer['full_name']; ?></p>
                                <p class="mb-0"><?php echo $influencer['role']; ?></p>
                            </div>

                            <div class="back_page">
                                <div>
                                    <p class="mb-0 bold_1"><?php echo $influencer['full_name']; ?></p>
                                </div>
                                <div class="d-flex flex-column">
                                    <?php foreach ($influencer['links'] as $link): ?>
                                        <a class="secondary_link" target="_blank" href="<?php echo esc_url($link['url']); ?>">
                                            <?php echo $link['label']; ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php 
                    $itemCount++;
                    endforeach; 
                    ?>
                </div>
                <?php if (count($influencers[$country]) > 8): ?>
                    <div class="w-100 d-flex justify-content-center">
                        <div class="load-more padding_top_sm">
                            <button class="secondary_button blue_" data-country="<?php echo $country; ?>">Load More</button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
    jQuery(function($) {
        // Function to filter person cards based on the selected country
        function filterPersonCards(country) {
            $('.person-cards-wrapper .people_cards_country_section').hide();
            $('.person-cards-wrapper .people_cards_country_section.' + country).show();
        }

        // Set the initial filter to Sweden
        filterPersonCards('sweden');

        // Attach click event to the country buttons
        $('.category_filtering_buttons .category_button').on('click', function() {
            // Remove the active class from all buttons and add it to the clicked button
            $('.category_filtering_buttons .category_button').removeClass('active');
            $(this).addClass('active');
            $('.person-cards-wrapper .people_cards_archive').removeClass('load_all_cards');
            $('.person-cards-wrapper .load-more button').parent().show();

            // Get the selected country from the data attribute
            var selectedCountry = $(this).data('country');

            // Filter the person cards based on the selected country
            filterPersonCards(selectedCountry);
        });

        // Attach click event to the "load more" buttons
        $('.person-cards-wrapper .load-more button').on('click', function() {
            // Get the country from the data attribute
            var country = $(this).data('country');

            // Show all of the influencers for the selected country
            $('.person-cards-wrapper .people_cards_archive.' + country).addClass('load_all_cards');

            // Hide the "load more" button
            $(this).parent().hide();
        });
    });
    </script>

        </div>
        
    </section>
<?php  
    get_footer(); 
?>