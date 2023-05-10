<?php get_header(); ?>
    <section>
        <div class="page_container">
            
            <div class="content">
                <?php get_template_part('includes/section', 'intro'); ?>
            </div>

            <?php get_template_part('includes/section', 'awards' ); ?>

            <div class="content">
                <div class="thumbnail_container d-flex flex-row flex-wrap">
                    <?php 
                        if( have_rows('home_case_thumbnails') ):
                            while( have_rows('home_case_thumbnails') ) : the_row();
                        
                                $client = get_sub_field('home_case_client');
                                $case_name = get_sub_field('home_case_name');
                                $displayed_width = get_sub_field('home_case_displayed_width');
                                $image = get_sub_field('home_case_image');
                                $description = get_sub_field('home_case_description');
                                
                                $case_thumbnail_data = array( 
                                    'class' => 'featured-home',
                                    'data'  => array(
                                    'client' => $client,
                                    'case_name' => $case_name,
                                    'displayed_width' => $displayed_width,
                                    'image' => $image,
                                    'description' => $description,
                                    )
                                    );
                                if( $displayed_width === 'row'){
                                    get_template_part('includes/cases/thumbnail', 'row', $case_thumbnail_data );
                                }
                                if( $displayed_width === 'fullscreen'){
                                    get_template_part('includes/cases/thumbnail', 'fullscreen', $case_thumbnail_data);
                                }
                                if( $displayed_width === 'medium'){
                                    get_template_part('includes/cases/thumbnail', 'medium', $case_thumbnail_data);
                                }
                    
                            endwhile;
                        
                        else :
                        endif;
                    ?>
                </div>
            </div>

            <?php get_template_part('includes/section', 'contact' ); ?>
            <div class="content home_news_section">
                <p class="title_2"><?php echo the_field('home_news_section_title')?></p>
                <div class="news_scrool_wrapper">
                <div class="news_scrool_feed">
                <?php  
                if(have_rows('home_news_list') ):
                    while( have_rows('home_news_list') ) : the_row(); ?>
                    <div class="news_item">
                        <div>
                            <p class="font-weight-bold adieu_light text_2"><?php echo the_sub_field('home_news_date'); ?></p>
                            <p class="text-uppercase text_2 "><?php echo the_sub_field('home_news_title'); ?></p>
                        </div>
                        <p class="text_2"><?php echo the_sub_field('home_news_text'); ?></p>
                    </div>
                    
                    <?php                         
                    endwhile;                            
                endif;
                ?>
            </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>