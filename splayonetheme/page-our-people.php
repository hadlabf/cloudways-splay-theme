<?php
/*
Template Name: Our People Page
*/
?>

<?php get_header(); ?>
    <section>
        <div class="page_container top_page_padding">
           
            <div class="content">
                <h1 class="page_title"><?php the_title(); ?> </h1>
                    <div class="row people_cards">
                        <?php 
                            if( have_rows('people_list') ):
                                while( have_rows('people_list') ) : the_row();
                                    $full_name = get_sub_field('people_full_name');
                                    $role = get_sub_field('people_role');
                                    $country = get_sub_field('people_country');
                                    $phone = get_sub_field('people_phone');
                                    $email = get_sub_field('people_email');
                                    $profile_picture = get_sub_field('people_profile_picture');
                                    
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
            </div>
                
            <div class="section_secondary mb-0">
                <div class="content">
                    <h1 class="adieu_bold sp_header"><?php echo the_field('people_recruit_header'); ?></h1>
                    <p class="sp_text"><?php echo the_field('people_recruit_text'); ?></p>
                    <div class="d-flex justify-content-center">
                        <a href="<?php echo site_url('/contact');?>" class="primary_button"><?php echo the_field('people_recruit_button'); ?></a>
                    </div>
                </div>
            </div>

        </div>
    </section>

<?php get_footer( null, [ 'footer_style' => 'footer_style_secondary' ] ); ?>