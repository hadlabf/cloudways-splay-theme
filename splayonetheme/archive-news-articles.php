<?php
get_header();
?>

       


<section>
    <div class="page_container top_page_padding">

        <div class="content">
            <h1 class="page_title">News</h1>
            <div class="section_padding_1">
                <p class="title_2"><?php echo the_field('home_news_section_title') ?></p>
                

            <div class="news_scrool_feed flex-wrap">
                <?php 
                $today = date('Y-m-d'); // Get today's date

                $news_args = array(
                    'post_type' => 'news-articles', 
                    'posts_per_page' => 8, // Retrieve only 8 posts
                    'meta_query' => array(
                        array(
                            'key' => 'news_date', // Custom field key for the news date
                            'value' => $today, // Compare against today's date
                            'type' => 'DATE',
                            'compare' => '>=', // Retrieve posts with dates greater than or equal to today
                        ),
                    ),
                    'meta_key' => 'news_date', // Sort by the news date
                    'orderby' => 'meta_value',
                    'order' => 'ASC', // Display posts in ascending order of dates
                );
    
                $news_query = new WP_Query($news_args);
           

                if ($news_query->have_posts()) :
                    while ($news_query->have_posts()) : $news_query->the_post();
                        $news_title = get_field('news_title');
                        $news_text = get_field('news_text');
                        $news_date = get_field('news_date');
                        $news_image = get_field('news_image');
                        $news_link = get_field('news_link');
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
                                            <a 
                                            href="<?php echo $news_link; ?>" 
                                            target="_blank" 
                                            class="secondary_button <?php if (empty($news_image)) : echo "no_image"; endif; ?>"
                                            >Read more</a>
                                        </div>
                                    </div>
                                    <?php if (!empty($news_image)) : ?>
                                        <img src="<?php echo $news_image['url']; ?>" alt="News Image" />
                                    <?php endif; ?>
                                </div>
                            </div>
                <?php
                    endwhile;
                else :
                    echo 'No posts found.';
                endif;
                wp_reset_postdata();
            ?>
        </div>
        <div class="w-100 d-flex justify-content-center">
            <button class="secondary_button blue_ mt-5 load-more-button" data-page="1">Load more</button>
        </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
