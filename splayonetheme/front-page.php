<?php get_header(); ?>
    <section>
        <div class="page_container">
            
            <?php get_template_part('includes/section', 'intro'); ?>

            <?php get_template_part('includes/section', 'awards' ); ?>

            <div class="content">
                <div class="thumbnail_container d-flex flex-row flex-wrap">
                <?php
                    $cases_args = array(
                        'post_type' => 'cases', // Profiles post type slug
                        'posts_per_page' => 4,
                        'meta_key' => 'case_thumbnail_order',
                        'orderby' => 'meta_value_num',
                        'order' => 'ASC',
                        'meta_query' => array(
                            array(
                                'key' => 'case_thumbnail_order',
                                'compare' => 'EXISTS',
                                'type' => 'NUMERIC'
                            )
                        )
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
                            if( $displayed_width === 'small'){
                                get_template_part('includes/cases/thumbnail', 'small', $case_thumbnail_data );
                            }
                            if( $displayed_width === 'fullscreen'){
                                get_template_part('includes/cases/thumbnail', 'fullscreen', $case_thumbnail_data);
                            }
                            if( $displayed_width === 'medium'){
                                get_template_part('includes/cases/thumbnail', 'medium', $case_thumbnail_data);
                            }
                        }
                        wp_reset_postdata();
                    } 
                    ?>

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
                            <p class="title_2">News</p>
                            <div class="news_scrool_wrapper">
                                <div class="news_scrool_feed">
                                    <?php
                                    while ($news_query->have_posts()) {
                                        $news_query->the_post();

                                        $news_title = get_post_meta(get_the_ID(), 'news_title', true);
                                        $news_text = get_post_meta(get_the_ID(), 'news_text', true);
                                        $news_date = get_post_meta(get_the_ID(), 'news_date', true);
                                        $news_link = get_post_meta(get_the_ID(), 'news_link_url', true);
                                        ?>
                                            <a target="_blank" href="<?php echo $news_link;?>" class="news_item">
                                                <div>
                                                    <p class="font-weight-bold adieu_light text_2"><?php echo $news_date; ?></p>
                                                    <p class="text-uppercase text_2 "><?php echo $news_title; ?></p>
                                                </div>
                                                <p class="text_2"><?php echo $news_text; ?></p>
                                            </a>
                                        <?php
                                    }
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    } 
                ?>
            
        </div>
    </section>
<?php get_footer(); ?>