<div>
    <div id="intro_section" class="d-flex flex-row align-items-end">
        <h1 class="adieu_black intro_title">Splay One</h1>
    </div>
    <div class="video-container h-100">
        <?php 
            $video_url = get_field('home_intro_video_url');
            // Parse the YouTube video ID from the URL
            preg_match('/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=))([\w-]{10,12})/', $video_url, $matches);
            $youtube_id = $matches[1];
        ?>
        <iframe width="100%" height="755px" src="https://www.youtube.com/embed/<?php echo $youtube_id; ?>?autoplay=1&loop=1" frameborder="0" allowfullscreen></iframe>
    </div>

</div>