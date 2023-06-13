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
        <h1 class="adieu_light page_title"><?php echo get_field('contact_header');?></h1>
    </div>
    <div class="contact_content">
        <div class="d-flex flex-column w-100">

            <?php $placeholder = get_field('contact_message_input_placeholder'); ?>
            <form method="post" class="contact_form" id="contactform">
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
                <div class="d-flex justify-content-end mt-3">
                    <button class="primary_button submit_button" name="submit" type="submit"><?php echo get_field('contact_submit_button_text');?></button>
                </div>
            </form>
            <!-- <form method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" class="contact_form" id="contactform"> -->
            <!-- <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $user_email = $_POST['email'];
                $user_name = $_POST['name'];
                $user_company = $_POST['company'];
                $message = $_POST['message'];
                
                // Email Configuration
                $to = 'hadla.bergman@gmail.com'; // Your client's email address
                $subject = 'New Contact Form Submission';
                $headers = "From: $user_email\r\nReply-To: $user_email\r\n";

                // Send the email
                $sent = wp_mail($to, $subject, $message, $headers);
                
                if ($sent) {
                    echo '<p>Email sent successfully!</p>';
                } else {
                    echo '<p>Failed to send email.</p>';
                }
            }
            ?> -->
            <div class="padding_bottom_lg">
                <?php  
                    if(have_rows('contacts_list') ):
                        while( have_rows('contacts_list') ) : the_row();
                        ?>
                        <div class="row mx-0 mb-4 contact_info_rows">
                            <div class="col col-sm-6 col-md-5 mr-auto pl-0">
                                <div class="contact_item">
                                    <p style="font-weight:400;"><?php echo the_sub_field('contact_list_country'); ?></p>
                                    <p class="thin_1 mb-0"><?php echo the_sub_field('contact_list_street'); ?>,</p>
                                    <p class="thin_1"><?php echo the_sub_field('contact_list_city'); ?></p>
                                </div>
                            </div>
                            <div style="min-width:250px;"class="col col-sm-6 col-md-5">
                                <?php  
                                    if(have_rows('contact_list_people_list') ):
                                        while( have_rows('contact_list_people_list') ) : the_row();
                                            $name = get_sub_field('contact_list_people_list_name');
                                            $role = get_sub_field('contact_list_people_list_role');
                                            $email = get_sub_field('contact_list_people_list_email');
                                            $phone = get_sub_field('contact_list_people_list_phone');
                                        ?>
                                
                                        <div class="row">
                                            <div class="contact_item">
                                                <p><?php echo $name; ?></p>
                                                <p class="thin_1 mb-3"><?php echo $role; ?></p>
                                                <?php if( !empty($email) ): ?>
                                                    <a href="mailto:<?php echo $email;?>" target=”_blank”><p class="highlighted_text thin_1"><?php echo $email; ?></p></a>
                                                <?php endif;?>
                                                <?php if( !empty($phone) ): ?>
                                                    <a href="tel:<?php echo $phone;?>" target=”_blank”><p class="highlighted_text thin_1"><?php echo $phone; ?></p></a>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                        <?php                         
                                        endwhile;                            
                                    endif;
                                ?>
                            </div>
                        </div>  
                        <?php                         
                        endwhile;                            
                    endif;
                ?>        
            </div>

        </div>
    </div>
</div>