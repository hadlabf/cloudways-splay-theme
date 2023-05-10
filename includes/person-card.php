<div class="col-md-3 col-4 people_card">
    <img class="people_img" src="<?php echo $args['data']['profile_picture']['url'];?>" />
    
    <div class="front_page">
        <p class="mb-0"><?php echo $args['data']['full_name']; ?></p>
        <p><?php echo $args['data']['role']; ?></p>
    </div>

    <div class="back_page">
        <p class="mb-0"><?php echo $args['data']['email']; ?></p>
        <p><?php echo $args['data']['phone']; ?></p>
    </div>
    
</div>