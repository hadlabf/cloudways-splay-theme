<?php

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(get_template_directory());
$dotenv->load();
$s3_bucket = $_ENV['SPLAY_ONE_YOUTUBE_API_KEY'];


function get_channel_stats($api_key, $channel_id) {
	$api_url = 'https://www.googleapis.com/youtube/v3/search?part=id&channelId=' . $channel_id . '&type=video&key=' . $api_key;
	$response = wp_remote_get($api_url);

	if (!is_wp_error($response) && wp_remote_retrieve_response_code($response) === 200) {
		$body = wp_remote_retrieve_body($response);
		$api_data = json_decode($body, true);

		$total_likes = 0;
		$total_views = 0;
		$total_time = 0;

		foreach ($api_data['items'] as $item) {
			$video_id = $item['id']['videoId'];
			$stats_url = 'https://www.googleapis.com/youtube/v3/videos?part=statistics,contentDetails&id=' . $video_id . '&key=' . $api_key;
			$stats_response = wp_remote_get($stats_url);
			if (!is_wp_error($stats_response) && wp_remote_retrieve_response_code($stats_response) === 200) {
				$stats_body = wp_remote_retrieve_body($stats_response);
				$stats_data = json_decode($stats_body, true);

				// Add likes count to total likes
				$total_likes += intval($stats_data['items'][0]['statistics']['likeCount']);
				$total_views += intval($stats_data['items'][0]['statistics']['viewCount']);

				// Get video duration in seconds
				$duration = $stats_data['items'][0]['contentDetails']['duration'];
				$duration_seconds = get_duration_seconds($duration);
				$total_time += $duration_seconds * $total_views;
                
			}

		}
        $total_time_hours = floor($total_time / 3600);
		return array(
			'total_likes' => $total_likes,
			'total_views' => $total_views,
			'total_time_hours' => $total_time_hours,
		);
	}
    $error_args = array(
        'status_code' => wp_remote_retrieve_response_code($response),
        'message' => "Failed to fetch data from YouTube API. </br> <div class='mt-2 bold_1'>Channel-id:</div> " . $channel_id,
    );
    get_template_part('includes/errors/template', 'error', $error_args );

	return array(
		'total_likes' => 0,
		'total_views' => 0,
		'total_time_hours' => 0
	);
}


function get_duration_seconds($duration) {
	// Use regular expression to extract the duration in the format "P#DT#H#M#S" or "PT#H#M#S" or "PT#M#S"
	preg_match('/P(?:(\d+)D)?T(?:(\d+)H)?(?:(\d+)M)?(\d+)S/', $duration, $matches);
	
	if (isset($matches[1]) || isset($matches[2]) || isset($matches[3]) || isset($matches[4])) {
		$days = isset($matches[1]) ? intval($matches[1]) * 86400 : 0;
		$hours = isset($matches[2]) ? intval($matches[2]) * 3600 : 0;
		$minutes = isset($matches[3]) ? intval($matches[3]) * 60 : 0;
		$seconds = isset($matches[4]) ? intval($matches[4]) : 0;
		
		$total_seconds = $days + $hours + $minutes + $seconds;

		return $total_seconds;
	}

	return 0; // Return 0 if duration is not in the expected format
}



function splay_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'splay_theme_support');

function splay_register_styles() {
    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_style('splay-style-common', get_template_directory_uri() . '/common.css', array('splay-bootstrap'), $version, 'all');
    wp_enqueue_style('splay-style-main', get_template_directory_uri() . '/style.css', array('splay-bootstrap'), $version, 'all');
    wp_enqueue_style('splay-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css', array(), '4.3.1', 'all');
}

add_action('wp_enqueue_scripts', 'splay_register_styles');

function splay_register_scripts() {
    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_script('bootstrap-jquery', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', array(), '3.3.1', false);
    wp_enqueue_script('bootstrap-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js', array(), '1.14.7', false);
    wp_enqueue_script('bootstrap-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js', array(), '4.3.1', false);
    // wp_enqueue_script('splay-main', get_template_directory_uri() . '/js/main.js', array(), '4.3.1', false);
    wp_register_script( 'splay-animation', get_template_directory_uri() . '/js/animation.js', array('jquery'),'1.0.0', true  ); 
    wp_enqueue_script( 'splay-animation' );
}

add_action('wp_enqueue_scripts', 'splay_register_scripts');

