<div class="contact_item">
    <?php 
        $full_name = get_sub_field('contact_full_name');
        $role = get_sub_field('contact_role');
        $phone = get_sub_field('contact_phone');
        $email = get_sub_field('contact_email');
    ?>
    <p><?php echo $full_name; ?></p>
    <p><?php echo $role; ?></p>
    <p class="highlighted_text"><?php echo $phone; ?></p>
    <p class="highlighted_text"><?php echo $email; ?></p>
</div>