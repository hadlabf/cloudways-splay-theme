<div class="work_area_list">
    <?php  
        $popup_image_1 = $args['popup_image_1'];
        $popup_image_2 = $args['popup_image_2'];
        $have_rows_list = $args['have_rows_list'];
        $topic = $args['topic'];
        $description = $args['description'];

        if($have_rows_list ):
            while( $have_rows_list ) : the_row(); ?>
                <div class="col-6 col-sm-4 p-0 area_item_wrapper">
                    <div class="area_item">
                        <div class="area_item_text_content">
                            <p id="topic" class="adieu_light"><?php echo $topic; ?></p>
                            <p id="description"><?php echo $description; ?></p>
                        </div>
                        <img class="popup_image_1" src="<?php echo $popup_image_1['url']; ?>" alt="Splay One">
                        <img class="popup_image_2" src="<?php echo $popup_image_2['url']; ?>" alt="Splay One">
                    </div>
                </div>
            <?php                         
            endwhile;                            
        endif;
    ?>
    <script>
        jQuery(document).ready(function ($) {
            $('.area_item_wrapper').hover(
                function () {
                    $(this).addClass('item_hovered');
                    var hoveredIndex = $(this).index() + 1; 
                    var thresholdIndex = Math.ceil($('.area_item_wrapper').length / 2); 

                    var $secondSibling;
                    var $forthSibling;

                    if (hoveredIndex >= thresholdIndex) {
                        $secondSibling = $(this).prevAll().eq(1);
                        $forthSibling = $(this).prevAll().eq(3);
                    } else {
                        $secondSibling = $(this).nextAll().eq(1);
                        $forthSibling = $(this).nextAll().eq(3);
                    }

                    if (!$secondSibling.length || !$forthSibling.length) {
                        $secondSibling = $(this).siblings().eq(1);
                        $forthSibling = $(this).siblings().eq(3);
                    }

                    $secondSibling.addClass('popup_active_one');
                    $forthSibling.addClass('popup_active_two');
                },
                function () {
                    $(this).removeClass('item_hovered');
                    $(this).siblings().removeClass('popup_active_one');
                    $(this).siblings().removeClass('popup_active_two');
                }
            );
        });
    </script>
</div>