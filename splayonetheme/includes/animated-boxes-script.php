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
