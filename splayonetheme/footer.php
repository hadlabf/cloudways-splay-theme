</div> <!-- end .page -->
<?php
$footer_section_title = get_sub_field('footer_section_title', 'option');
$footer_section_subtitle = get_field('footer_section_subtitle', 'option');
$footer_section_list = get_field('footer_section_list', 'option');
$footer_address_list = get_field('footer_address_list', 'option');
?>
<footer class="<?php echo $args['footer_style']; ?> splay_footer">
    <div class="content">
        <div class="row">
            <div class="col col-sm-8 pb-3">
                <?php if ($footer_section_list): ?>
                    <?php foreach ($footer_section_list as $section): ?>
                        <div class="row mb-4">
                            <div class="col">
                                <p class="bold_1"><?php echo $section['footer_section_title']; ?></p>
                                <p class="bold_1"><?php echo $footer_section_title; ?></p>
                            </div>
                            <div class="col d-flex flex-column">
                                <p class="mb-0 thin_1"><?php echo $section['footer_section_subtitle']; ?></p>
                                <?php if ($footer_section_list): ?>
                                    <?php foreach ($section['footer_section_link_list'] as $link): ?>
                                        <?php if ( !empty($link['footer_section_link_list_url']) ): ?>
                                            <a target="_blank" class="cta_link thin_1" href="<?php echo $link['footer_section_link_list_url']; ?>"><?php echo $link['footer_section_link_list_label']; ?></a>
                                        <?php endif; ?>
                                        <?php if ( !empty($link['footer_section_link_list_email']) ): ?>
                                            <a target="_blank" class="cta_link thin_1" href="mailto:<?php echo $link['footer_section_link_list_email']; ?>"><?php echo $link['footer_section_link_list_label']; ?></a>
                                        <?php endif; ?>
                                     <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="col col-sm-4">
                <?php if ($footer_address_list): ?>
                    <?php foreach ($footer_address_list as $address): ?>
                        <p class="mb-0 thin_1"><?php echo $address['footer_address_list_street']; ?></p>
                        <p class="mb-0 thin_1"><?php echo $address['footer_address_list_postal_code'] . ' ' . $address['footer_address_list_city']; ?></p>
                        <p class="mb-3 thin_1"><?php echo $address['footer_address_list_country']; ?></p>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>
						
		<?php wp_footer(); // js scripts are inserted using this function ?>


	</body>

</html>