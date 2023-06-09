<?php
get_header();
?>

       


<section>
    <div class="page_container top_page_padding">

        <div class="content">
            <h1 class="page_title">News</h1>
            <div class="section_padding_1">
                <div class="news_scrool_feed flex-wrap">
                    <?php 

                    $news_args = array(
                        'post_type' => 'news-articles', 
                        'posts_per_page' => 8, // Retrieve only 8 posts
                        'meta_query' => array(
                            array(
                                'key' => 'news_date', // Custom field key for the news date
                                'type' => 'DATE',
                                'compare' => '!=', 
                            ),
                        ),
                        'meta_key' => 'news_date', // Sort by the news date
                        'orderby' => 'meta_value',
                        'order' => 'DESC',
                    );
        
                    $news_query = new WP_Query($news_args);
                    $count = 0;

                    if ($news_query->have_posts()) :
                        while ($news_query->have_posts()) : $news_query->the_post();
                            $news_title = get_field('news_title');
                            $news_text = get_field('news_text');
                            $news_date = get_field('news_date');
                            $news_image = get_field('news_image');
                            $news_link = get_field('news_link_url');
                            $new_tab = get_field('news_open_in_new_tab');
                            $count++;
                            ?>
                                <div class="news_item">
                                    <div class="front_page">
                                        <div>
                                            <p class="font-weight-bold adieu_black text_2"><?php echo $news_date; ?></p>
                                            <p class="text_2 bold_1 text_ellipsis_3 mb-0"><?php echo $news_title; ?></p>
                                        </div>
                                        <p class="text_1 text_ellipsis_4 mb-0"><?php echo $news_text; ?></p>
                                    </div>
                                    <div class="back_page">
                                        <div class="button_wrapper">
                                            <div class="h-100 d-flex justify-content-center align-items-center">
                                                <a 
                                                href="<?php echo esc_url($news_link); ?>" 
                                                target="<?php if ($new_tab) : echo "_blank"; else : echo "_self"; endif;?>" 
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
                <?php if ( $count > 7 ) : ?>
                    <div class="w-100 d-flex justify-content-center" style="min-height:100px;">
                        <button class="secondary_button blue_ mt-5 load-more-button py-1" data-page="1">Load more</button>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="section_secondary">
            <div class="content">
                <div class="row">

                    <div class="col-12 col-md-6 pr-md-5 d-flex align-items-end contact_form_section_title">
                        <?php $header = get_field('contact_header', 341);?>
                        <?php if( !empty($header) ): ?>
                            <h1 class="adieu_light title_2 text-left"><?php echo $header;?></h1>
                        <?php else : ?> 
                            <h1 class="adieu_light title_2 text-left">Curious to know more?</h1>
                        <?php endif;?>
                    </div>

                    <div class="col-12 col-md-6 pl-md-5 dark_form">
                        <?php 
                            $placeholder = get_field('contact_message_input_placeholder', 341); 
                            $submit = get_field('contact_submit_button_text', 341); 
                        ?>
                    
                    <div class="splay_contact_form_wrapper text-left">
                            <?php echo do_shortcode('[forminator_form id="1062"]'); ?>
                        </div>

                    </div>
                    
                </div>
            </div>
        </div>

    </div>
</section>

<?php get_footer( null, [ 'footer_style' => 'footer_style_secondary' ] ); ?>