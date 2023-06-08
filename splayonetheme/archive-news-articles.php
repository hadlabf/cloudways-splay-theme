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
                <div class="w-100 d-flex justify-content-center" style="min-height:100px;">
                    <button class="secondary_button blue_ mt-5 load-more-button" data-page="1">Load more</button>
                </div>
            </div>
        </div>

        <div class="section_secondary">
            <div class="content">
                <div class="row">

                    <div class="col">
                        <?php $header = get_field('contact_header', 341);?>
                        <?php if( !empty($header) ): ?>
                            <h1 class="adieu_light sp_header text-left"><?php echo $header;?></h1>
                        <?php else : ?> 
                            <h1 class="adieu_light sp_header text-left">Curious to know more?</h1>
                        <?php endif;?>
                    </div>

                    <div class="col dark_form">
                    <?php 
                        $placeholder = get_field('contact_message_input_placeholder', 341); 
                        $submit = get_field('contact_submit_button_text', 341); 
                    ?>
                    <form action="" class="contact_form" id="contactform">
                        <div class="w-100 d-flex justify-content-start">
                            <select name="subject" id="subject" form="contactform">
                                <option value="influencers">Influencers</option>
                                <option value="sweden-sales">Sweden Sales</option>
                                <option value="norway-sales">Norway Sales</option>
                                <option value="denmark-sales">Denmark Sales</option>
                                <option value="finland-sales">Finland Sales</option>
                            </select>                    
                        </div>
                        
                        <div class="form-group">
                            <textarea class="form-input" rows="5" name="message" id="message" form="contactform" placeholder="<?php if( !empty($placeholder) ): echo $placeholder; else : echo "Write your message here..."; endif;?>" class="form-input" type="message" ></textarea>
                        </div>
                        <div class="row d-flex gap-2">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="name">Name</label>
                                    <input name="name" id="name" class="form-input" type="text" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="company">Company</label>
                                    <input name="company" id="company" class="form-input" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input name="email" id="email" class="form-input" type="email" />
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="primary_button submit_button" type="submit"><?php if( !empty($submit) ): echo $submit; else : echo "Submit"; endif;?></button>
                        </div>
                    </form>
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
</section>

<?php get_footer( null, [ 'footer_style' => 'footer_style_secondary' ] ); ?>