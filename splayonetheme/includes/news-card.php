<div class="news_item">
    <div class="front_page">
        <div>
            <p class="font-weight-bold adieu_black text_2"><?php echo $args['data']['news_date']; ?></p>
            <p class="text_2 bold_1 text_ellipsis_3"><?php echo $args['data']['news_title']; ?></p>
        </div>
        <p class="text_1 text_ellipsis_4"><?php echo $args['data']['news_text']; ?></p>
    </div>
    <div class="back_page">
        <div class="button_wrapper">
            <div class="h-100 d-flex justify-content-center align-items-center">
                <a 
                href="<?php echo $args['data']['news_link']; ?>" 
                target="_blank" 
                class="secondary_button <?php if (empty($args['data']['news_image'])) : echo "no_image"; endif; ?>"
                >Read more</a>
            </div>
        </div>
        <?php if (!empty($news_image)) : ?>
            <img src="<?php echo  $args['data']['news_image']['url']; ?>" alt="News Image" />
        <?php endif; ?>
    </div>
</div>