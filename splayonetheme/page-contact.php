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
        <?php $placeholder = get_field('contact_message_input_placeholder'); ?>
        <form action="" class="contact_form" id="contactform">
            <select name="subject" id="subject" form="contactform">
                <option value="influencers">Influencers</option>
                <option value="sweden-sales">Sweden Sales</option>
                <option value="norway-sales">Norway Sales</option>
                <option value="denmark-sales">Denmark Sales</option>
                <option value="finland-sales">Finland Sales</option>
            </select>
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