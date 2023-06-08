<?php
/*
Template Name: Contact Page
*/
?>

<?php 
    get_header( null, [ 'header_style' => 'contact_page_header', 'logo_color' => 'white' ] ); 
?>
<div class="content contact_page">
    <div class="sticky_content">
        <h1 class="adieu_light page_title" style="line-height:0.9;"><?php echo get_field('contact_header');?></h1>
    </div>
    <div class="w-50">
        <form action="" class="contact_form">
            <div class="row d-flex gap-2">
                <div class="col-sm-6">
                    <div class="form_checkbox">
                        <input name="tiktok" id="tiktok" type="checkbox" />
                        <label for="tiktok">TikTok Lecture</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form_checkbox">
                        <input name="event" id="event" type="checkbox" />
                        <label for="event">Event</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form_checkbox">
                        <input name="collaboration" id="collaboration" type="checkbox" />
                        <label for="collaboration">Collaboration</label>
                    </div>
                </div>
                <div class="col-sm-6">
                                <div class="form_checkbox">
                        <input name="other" id="other" type="checkbox" />
                        <label for="other">Other</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="email">Message</label>
                <input name="email" id="email" placeholder="<?php echo get_field('contact_message_input_placeholder');?>" class="form-input" type="email" />
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
                <button class="primary_button submit_button" type="submit"><?php echo get_field('contact_submit_button_text');?></button>
            </div>
        </form>
                    
        <div class="row">
            <?php  
                if(have_rows('contact_office_list') ):
                    while( have_rows('contact_office_list') ) : the_row();
                        $office_country = get_sub_field('contact_office_country');
                    ?>
                    <div class="col-sm-6">
                        <div class="contact_item">
                            <p class="text-capitalize font-weight-bold"><?php echo the_sub_field('contact_office_country'); ?></p>
                            <p><?php echo the_sub_field('contact_office_street'); ?></p>
                            <p><?php echo the_sub_field('contact_office_city'); ?></p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <?php                             
                            while( have_rows('contact_person_list') ) : the_row();
                                $country = get_sub_field('contact_country');
                                if($country === $office_country):
                                    get_template_part('includes/contact/contact', 'person' );
                                endif;
                            endwhile;   
                        ?>
                    </div>
            <?php                         
                    endwhile;                            
                endif;
            ?>
                        
        </div>
    </div>
</div>
    <div class="contact_page page_container">
        <div class="content">
     
            <div class="row">
       
                <div class="col-sm-6">
                    <div class="col-6 contact_header_section">
                        
                    </div>
                </div>
                
                <div class="col-sm-6">

                    
                </div>

            </div>
        </div>
    </div>
<?php get_footer( null, [ 'footer_style' => 'contact_page_footer' ] ); ?>