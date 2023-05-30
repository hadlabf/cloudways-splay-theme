<?php get_header(); ?>
    <section>
        <div class="page_container top_page_padding">
            
            <?php get_template_part('includes/section', 'intro'); ?>

            <?php get_template_part('includes/section', 'awards' ); ?>

            <div class="content">
            <div class="thumbnail_container d-flex flex-row flex-wrap">
                <?php
                    $cases_args = array(
                        'post_type' => 'cases', // Profiles post type slug
                        'posts_per_page' => 5,
                        'meta_key' => 'case_thumbnail_order',
                        'orderby' => 'meta_value_num',
                        'order' => 'ASC',
                        'meta_query' => array(
                            'relation' => 'AND',
                            array(
                                'key' => 'case_thumbnail_order',
                                'value' => array(1, 2, 3, 4, 5),
                                'compare' => 'IN',
                                'type' => 'NUMERIC',
                            ),
                            array(
                                'key' => 'case_thumbnail_order',
                                'compare' => 'EXISTS',
                            ),
                        ),
                    );
                    $cases_query = new WP_Query($cases_args);

                    if ($cases_query->have_posts()) {
                        while ($cases_query->have_posts()) {
                            $cases_query->the_post();

                            $case_customer = get_post_meta(get_the_ID(), 'case_customer', true);
                            $case_name = get_post_meta(get_the_ID(), 'case_name', true);
                            $displayed_width = get_post_meta(get_the_ID(), 'home_case_displayed_width', true);
                            $case_thumbnail_order = get_post_meta(get_the_ID(), 'case_thumbnail_order', true);
                            $case_thumbnail_id = get_post_meta(get_the_ID(), 'case_thumbnail', true); // Image attachment ID
                            $case_thumbnail_url = wp_get_attachment_image_src($case_thumbnail_id, 'full')[0]; // Image URL

                            $case_thumbnail_data = array( 
                                'class' => 'featured-home',
                                'data'  => array(
                                    'client' => $case_customer,
                                    'case_name' => $case_name,
                                    'displayed_width' => $displayed_width,
                                    'image_url' => $case_thumbnail_url,
                                )
                            );

                            if ($displayed_width === 'small') {
                                get_template_part('includes/cases/thumbnail', 'small', $case_thumbnail_data);
                            }
                            if ($displayed_width === 'fullscreen') {
                                get_template_part('includes/cases/thumbnail', 'fullscreen', $case_thumbnail_data);
                            }
                            if ($displayed_width === 'medium') {
                                get_template_part('includes/cases/thumbnail', 'medium', $case_thumbnail_data);
                            }
                        }
                        wp_reset_postdata();
                    }?>
                </div>

                <div class="padding_bottom_sm padding_top_lg d-flex flex-column justify-content-center align-items-center">
                    <?php 
                    $client_logo_collage = get_field("home_client_logo_collage");
                    if ( !empty($client_logo_collage) ) : ?>
                        <img class="w-auto mb-3" style="max-height:180px;" src="<?php echo $client_logo_collage["url"]; ?>" alt="Client Logos" />
                    <?php endif; ?>
                    <a href="<?php echo site_url('/cases');?>" class="secondary_button blue_ mt-5">More work</a>
                </div>
            </div>

            <?php get_template_part('includes/section', 'contact' ); ?>

            
            <?php
                    $news_args = array(
                        'post_type' => 'news-articles', 
                        'posts_per_page' => -1, // Number of posts to retrieve (-1 for all posts)
                    );
                    $news_query = new WP_Query($news_args);

                    if ($news_query->have_posts()) {
                        ?>
                        <div class="content home_news_section">
                            <p class="title_3">News</p>
                            <div class="news_scrool_feed">
                                <?php
                                while ($news_query->have_posts()) {
                                    $news_query->the_post();

                                    $news_title = get_post_meta(get_the_ID(), 'news_title', true);
                                    $news_text = get_post_meta(get_the_ID(), 'news_text', true);
                                    $news_date = get_post_meta(get_the_ID(), 'news_date', true);
                                    $news_link = get_post_meta(get_the_ID(), 'news_link_url', true);
                                    $news_image_id = get_post_meta(get_the_ID(), 'news_image', true); // Image attachment ID
                                    $news_image_url = wp_get_attachment_image_src($news_image_id, 'full')[0]; // Image URL
                                    ?>
                                        <div class="news_item">
                                            
                                            <div class="front_page">
                                                <div>
                                                    <p class="font-weight-bold adieu_black text_2"><?php echo $news_date; ?></p>
                                                    <p class="text_2 bold_1 text_ellipsis_3"><?php echo $news_title; ?></p>
                                                </div>
                                                <p class="text_1 text_ellipsis_4"><?php echo $news_text; ?></p>
                                            </div>
                                            <div class="back_page">
                                                
                                                <div class="button_wrapper">
                                                    <div class="h-100 d-flex justify-content-center align-items-center">
                                                        <a href="<?php echo $news_link;?>" target="_blank" class="secondary_button <?php if ( empty($news_image_url)) : echo "no_image"; endif;?>">Read more</a>
                                                    </div>
                                                </div>
                                                <?php if ( !empty($news_image_url)) : ?>
                                                    <img src="<?php echo $news_image_url; ?>" alt="News Image" />
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    <?php
                                }
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    <?php
                    } 
                ?>
            
        </div>
    </section>
<?php get_footer(); ?>