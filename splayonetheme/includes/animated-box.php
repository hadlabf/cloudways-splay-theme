<?php  
$popup_image_1 = $args['popup_image_1'];
$popup_image_2 = $args['popup_image_2'];
$topic = $args['topic'];
$description = $args['description'];
?>

<div class="area_item_wrapper">
    <div class="area_item">
        <div class="area_item_text_content">
            <p id="topic"><?php echo $topic; ?></p>
            <p id="description" class="text_1"><?php echo $description; ?></p>
        </div>
        <?php if( !empty( $popup_image_1 ) ): ?>
            <img class="popup_image_1" src="<?php echo $popup_image_1['url']; ?>" alt="Splay One">
        <?php endif; ?>
        <?php if( !empty( $popup_image_2 ) ): ?>
            <img class="popup_image_2" src="<?php echo $popup_image_2['url']; ?>" alt="Splay One">
        <?php endif; ?>
    </div>
</div>
