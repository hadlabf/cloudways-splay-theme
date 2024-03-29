<?php
// Clean up the WordPress Head
if( !function_exists( "wp_bootstrap_head_cleanup" ) ) {  
  function wp_bootstrap_head_cleanup() {
    // remove header links
    remove_action( 'wp_head', 'feed_links_extra', 3 );                    // Category Feeds
    remove_action( 'wp_head', 'feed_links', 2 );                          // Post and Comment Feeds
    remove_action( 'wp_head', 'rsd_link' );                               // EditURI link
    remove_action( 'wp_head', 'wlwmanifest_link' );                       // Windows Live Writer
    remove_action( 'wp_head', 'index_rel_link' );                         // index link
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );            // previous link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );             // start link
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Links for Adjacent Posts
    remove_action( 'wp_head', 'wp_generator' );                           // WP version
  }
}
// Launch operation cleanup
add_action( 'init', 'wp_bootstrap_head_cleanup' );

// remove WP version from RSS
if( !function_exists( "wp_bootstrap_rss_version" ) ) {  
  function wp_bootstrap_rss_version() { return ''; }
}
add_filter( 'the_generator', 'wp_bootstrap_rss_version' );

// Remove the […] in a Read More link
if( !function_exists( "wp_bootstrap_excerpt_more" ) ) {  
  function wp_bootstrap_excerpt_more( $more ) {
    global $post;
    return '...  <a href="'. get_permalink($post->ID) . '" class="more-link" title="Read '.get_the_title($post->ID).'">Read more &raquo;</a>';
  }
}
add_filter('excerpt_more', 'wp_bootstrap_excerpt_more');

// Add WP 3+ Functions & Theme Support
if( !function_exists( "wp_bootstrap_theme_support" ) ) {  
  function wp_bootstrap_theme_support() {
    add_theme_support( 'post-thumbnails' );      // wp thumbnails (sizes handled in functions.php)
    set_post_thumbnail_size( 125, 125, true );   // default thumb size
    add_theme_support( 'custom-background' );  // wp custom background
    add_theme_support( 'automatic-feed-links' ); // rss

    // Add post format support - if these are not needed, comment them out
    add_theme_support( 'post-formats',      // post formats
      array( 
        'aside',   // title less blurb
        'gallery', // gallery of images
        'link',    // quick link to other site
        'image',   // an image
        'quote',   // a quick quote
        'status',  // a Facebook like status update
        'video',   // video 
        'audio',   // audio
        'chat'     // chat transcript 
      )
    );  

    add_theme_support( 'menus' );            // wp menus
    
    register_nav_menus(                      // wp3+ menus
      array( 
        'main_nav' => 'Main Menu',   // main nav in header
        'ham_nav' => 'Hamburger Menu',   // nav in hamburger menu
        'footer_links' => 'Footer Links' // secondary nav in footer
      )
    );  
  }
}
// launching this stuff after theme setup
add_action( 'after_setup_theme','wp_bootstrap_theme_support' );

function wp_bootstrap_main_nav() {
  // Display the WordPress menu if available
  wp_nav_menu( 
    array( 
      'menu' => 'main_nav', /* menu name */
      'menu_class' => 'nav navbar-nav',
      'theme_location' => 'main_nav', /* where in the theme it's assigned */
      'container' => 'false', /* container class */
      'fallback_cb' => 'wp_bootstrap_main_nav_fallback', /* menu fallback */
      'walker' => new Bootstrap_walker()
    )
  );
}

// this is the fallback for header menu
function wp_bootstrap_main_nav_fallback() { 
  /* you can put a default here if you like */ 
}


// Shortcodes
require_once('library/shortcodes.php');

// Admin Functions (commented out by default)
// require_once('library/admin.php');         // custom admin functions


// Set content width
if ( ! isset( $content_width ) ) $content_width = 580;

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'wpbs-featured', 780, 300, true );
add_image_size( 'wpbs-featured-home', 970, 311, true);
add_image_size( 'wpbs-featured-carousel', 970, 400, true);

/* 
to add more sizes, simply copy a line from above 
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image, 
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function wp_bootstrap_register_sidebars() {
  register_sidebar(array(
  	'id' => 'sidebar1',
  	'name' => 'Main Sidebar',
  	'description' => 'Used on every page BUT the homepage page template.',
  	'before_widget' => '<div id="%1$s" class="widget %2$s">',
  	'after_widget' => '</div>',
  	'before_title' => '<h4 class="widgettitle">',
  	'after_title' => '</h4>',
  ));
    
  register_sidebar(array(
  	'id' => 'sidebar2',
  	'name' => 'Homepage Sidebar',
  	'description' => 'Used only on the homepage page template.',
  	'before_widget' => '<div id="%1$s" class="widget %2$s">',
  	'after_widget' => '</div>',
  	'before_title' => '<h4 class="widgettitle">',
  	'after_title' => '</h4>',
  ));
    
  register_sidebar(array(
    'id' => 'footer1',
    'name' => 'Footer 1',
    'before_widget' => '<div id="%1$s" class="widget col-sm-4 %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'footer2',
    'name' => 'Footer 2',
    'before_widget' => '<div id="%1$s" class="widget col-sm-4 %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'footer3',
    'name' => 'Footer 3',
    'before_widget' => '<div id="%1$s" class="widget col-sm-4 %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));
    
    
  /* 
  to add more sidebars or widgetized areas, just copy
  and edit the above sidebar code. In order to call 
  your new sidebar just use the following code:
  
  Just change the name to whatever your new
  sidebar's id is, for example:
  
  To call the sidebar in your template, you can just copy
  the sidebar.php file and rename it to your sidebar's name.
  So using the above example, it would be:
  sidebar-sidebar2.php
  
  */
} // don't remove this bracket!
add_action( 'widgets_init', 'wp_bootstrap_register_sidebars' );

// Disable comments
function disable_comments() {
  // Remove comment support from posts and pages
  remove_post_type_support('post', 'comments');
  remove_post_type_support('page', 'comments');

  // Close comments on existing posts and pages
  $posts = get_posts(array('post_type' => 'any', 'numberposts' => -1));
  foreach ($posts as $post) {
    if (comments_open($post->ID)) {
      update_post_meta($post->ID, '_closed', '1');
      update_post_meta($post->ID, '_close_comments_for_old_posts', '1');
    }
  }

  // Hide existing comments
  add_filter('comments_template', '__return_false');
  add_filter('comments_open', '__return_false');
  add_filter('get_comments_number', '__return_false');
}
add_action('after_setup_theme', 'disable_comments');

/*********** update standard wp tag cloud widget so it looks better ************/

add_filter( 'widget_tag_cloud_args', 'wp_bootstrap_my_widget_tag_cloud_args' );

function wp_bootstrap_my_widget_tag_cloud_args( $args ) {
	$args['number'] = 20; // show less tags
	$args['largest'] = 9.75; // make largest and smallest the same - i don't like the varying font-size look
	$args['smallest'] = 9.75;
	$args['unit'] = 'px';
	return $args;
}

// filter tag clould output so that it can be styled by CSS
function wp_bootstrap_add_tag_class( $taglinks ) {
    $tags = explode('</a>', $taglinks);
    $regex = "#(.*tag-link[-])(.*)(' title.*)#e";

    foreach( $tags as $tag ) {
    	$tagn[] = preg_replace($regex, "('$1$2 label tag-'.get_tag($2)->slug.'$3')", $tag );
    }

    $taglinks = implode('</a>', $tagn);

    return $taglinks;
}

add_action( 'wp_tag_cloud', 'wp_bootstrap_add_tag_class' );

add_filter( 'wp_tag_cloud','wp_bootstrap_wp_tag_cloud_filter', 10, 2) ;

function wp_bootstrap_wp_tag_cloud_filter( $return, $args )
{
  return '<div id="tag-cloud">' . $return . '</div>';
}

// Enable shortcodes in widgets
add_filter( 'widget_text', 'do_shortcode' );

// Disable jump in 'read more' link
function wp_bootstrap_remove_more_jump_link( $link ) {
	$offset = strpos($link, '#more-');
	if ( $offset ) {
		$end = strpos( $link, '"',$offset );
	}
	if ( $end ) {
		$link = substr_replace( $link, '', $offset, $end-$offset );
	}
	return $link;
}
add_filter( 'the_content_more_link', 'wp_bootstrap_remove_more_jump_link' );

// Remove height/width attributes on images so they can be responsive
add_filter( 'post_thumbnail_html', 'wp_bootstrap_remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'wp_bootstrap_remove_thumbnail_dimensions', 10 );

function wp_bootstrap_remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

// Add the Meta Box to the homepage template
function wp_bootstrap_add_homepage_meta_box() {  
	global $post;

	// Only add homepage meta box if template being used is the homepage template
	// $post_id = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post_ID']) ? $_POST['post_ID'] : "");
	$post_id = $post->ID;
	$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);

	if ( $template_file == 'page-homepage.php' ){
	    add_meta_box(  
	        'homepage_meta_box', // $id  
	        'Optional Homepage Tagline', // $title  
	        'wp_bootstrap_show_homepage_meta_box', // $callback  
	        'page', // $page  
	        'normal', // $context  
	        'high'); // $priority  
    }
}

add_action( 'add_meta_boxes', 'wp_bootstrap_add_homepage_meta_box' );

// Field Array  
$prefix = 'custom_';  
$custom_meta_fields = array(  
    array(  
        'label'=> 'Homepage tagline area',  
        'desc'  => 'Displayed underneath page title. Only used on homepage template. HTML can be used.',  
        'id'    => $prefix.'tagline',  
        'type'  => 'textarea' 
    )  
);  

// The Homepage Meta Box Callback  
function wp_bootstrap_show_homepage_meta_box() {  
  global $custom_meta_fields, $post;

  // Use nonce for verification
  wp_nonce_field( basename( __FILE__ ), 'wpbs_nonce' );
    
  // Begin the field table and loop
  echo '<table class="form-table">';

  foreach ( $custom_meta_fields as $field ) {
      // get value of this field if it exists for this post  
      $meta = get_post_meta($post->ID, $field['id'], true);  
      // begin a table row with  
      echo '<tr> 
              <th><label for="'.$field['id'].'">'.$field['label'].'</label></th> 
              <td>';  
              switch($field['type']) {  
                  // text  
                  case 'text':  
                      echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="60" /> 
                          <br /><span class="description">'.$field['desc'].'</span>';  
                  break;
                  
                  // textarea  
                  case 'textarea':  
                      echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="80" rows="4">'.$meta.'</textarea> 
                          <br /><span class="description">'.$field['desc'].'</span>';  
                  break;  
              } //end switch  
      echo '</td></tr>';  
  } // end foreach  
  echo '</table>'; // end table  
}  

// Save the Data  
function wp_bootstrap_save_homepage_meta( $post_id ) {  

    global $custom_meta_fields;  
  
    // verify nonce  
    if ( !isset( $_POST['wpbs_nonce'] ) || !wp_verify_nonce($_POST['wpbs_nonce'], basename(__FILE__)) )  
        return $post_id;

    // check autosave
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return $post_id;

    // check permissions
    if ( 'page' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) )
            return $post_id;
        } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
    }
  
    // loop through fields and save the data  
    foreach ( $custom_meta_fields as $field ) {
        $old = get_post_meta( $post_id, $field['id'], true );
        $new = $_POST[$field['id']];

        if ($new && $new != $old) {
            update_post_meta( $post_id, $field['id'], $new );
        } elseif ( '' == $new && $old ) {
            delete_post_meta( $post_id, $field['id'], $old );
        }
    } // end foreach
}
add_action( 'save_post', 'wp_bootstrap_save_homepage_meta' );

// Add thumbnail class to thumbnail links
function wp_bootstrap_add_class_attachment_link( $html ) {
    $postid = get_the_ID();
    $html = str_replace( '<a','<a class="thumbnail"',$html );
    return $html;
}
add_filter( 'wp_get_attachment_link', 'wp_bootstrap_add_class_attachment_link', 10, 1 );

// Add lead class to first paragraph
function wp_bootstrap_first_paragraph( $content ){
    global $post;

    // if we're on the homepage, don't add the lead class to the first paragraph of text
    if( is_page_template( 'page-homepage.php' ) )
        return $content;
    else
        return preg_replace('/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1);
}
add_filter( 'the_content', 'wp_bootstrap_first_paragraph' );

// Menu output mods
class Bootstrap_walker extends Walker_Nav_Menu{

  function start_el(&$output, $object, $depth = 0, $args = Array(), $current_object_id = 0){

	 global $wp_query;
	 $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
	
	 $class_names = $value = '';
	
		// If the item has children, add the dropdown class for bootstrap
		if ( $args->has_children ) {
			$class_names = "dropdown ";
		}
	
		$classes = empty( $object->classes ) ? array() : (array) $object->classes;
		
		$class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';
       
   	$output .= $indent . '<li id="menu-item-'. $object->ID . '"' . $value . $class_names .'>';

   	$attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
   	$attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
   	$attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
   	$attributes .= ! empty( $object->url )        ? ' href="'   . esc_attr( $object->url        ) .'"' : '';

   	// if the item has children add these two attributes to the anchor tag
   	if ( $args->has_children ) {
		  $attributes .= ' class="dropdown-toggle" data-toggle="dropdown"';
    }

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before .apply_filters( 'the_title', $object->title, $object->ID );
    $item_output .= $args->link_after;

    // if the item has children add the caret just before closing the anchor tag
    if ( $args->has_children ) {
    	$item_output .= '<b class="caret"></b></a>';
    }
    else {
    	$item_output .= '</a>';
    }

    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $object, $depth, $args );
  } // end start_el function
        
  function start_lvl(&$output, $depth = 0, $args = Array()) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
  }
      
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ){
    $id_field = $this->db_fields['id'];
    if ( is_object( $args[0] ) ) {
        $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
    }
    return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
  }        
}

add_editor_style('editor-style.css');

function wp_bootstrap_add_active_class($classes, $item) {
	if( $item->menu_item_parent == 0 && in_array('current-menu-item', $classes) ) {
    $classes[] = "active";
	}
  
  return $classes;
}

// Add Twitter Bootstrap's standard 'active' class name to the active nav link item
add_filter('nav_menu_css_class', 'wp_bootstrap_add_active_class', 10, 2 );

// enqueue styles
if( !function_exists("wp_bootstrap_theme_styles") ) {  
    function wp_bootstrap_theme_styles() { 
        wp_register_script('jquery3', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', array(), '3.3.1', true); // jQuery v3
        wp_enqueue_script('jquery3');
        wp_script_add_data( 'jquery3', array( 'integrity', 'crossorigin' ) , array( 'sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo', 'anonymous' ) );

        wp_register_script('bootstrap4', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js', array(), '4.3.1', true); // Bootstrap v4
        wp_enqueue_script('bootstrap4');
        wp_script_add_data( 'bootstrap4', array( 'integrity', 'crossorigin' ) , array( 'sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM', 'anonymous' ) );
        
        wp_register_script('popper1', 'https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js', array(), '1.14.7', true); // Popper v1
        wp_enqueue_script('popper1');
        wp_script_add_data( 'popper1', array( 'integrity', 'crossorigin' ) , array( 'sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1', 'anonymous' ) );
        
        // wp_register_style('bootstrap4-styles', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css', array(), '4.3.1', true);
        // wp_enqueue_style( 'bootstrap4-styles' );
        // wp_style_add_data( 'bootstrap4-styles', array( 'integrity', 'crossorigin' ) , array( 'sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1', 'anonymous' ) );

        wp_register_style( 'splay-common-style', get_stylesheet_directory_uri() . '/library/css/common.css', array(), '1.0', 'all' );
        wp_enqueue_style( 'splay-common-style' );
        wp_register_style( 'splay-main-style', get_stylesheet_directory_uri() . '/library/css/style.css', array(), '1.0', 'all' );
        wp_enqueue_style( 'splay-main-style' );
    }
}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_theme_styles' );


// Remove <p> tags from around images
function wp_bootstrap_filter_ptags_on_images( $content ){
  return preg_replace( '/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content );
}
add_filter( 'the_content', 'wp_bootstrap_filter_ptags_on_images' );

// Hamberger Menu Toggle
function custom_functions_enqueue_scripts() {
  wp_register_script(
	  'splay-custom-functions-script',
	  get_template_directory_uri() . '/js/functions.js',
	  array( 'jquery' ),
	  '1.0',
	  true
	);
	wp_enqueue_script( 'splay-custom-functions-script' );
}
add_action( 'wp_enqueue_scripts', 'custom_functions_enqueue_scripts' );

add_action('wp_ajax_filter_people', 'filter_people');
add_action('wp_ajax_nopriv_filter_people', 'filter_people');

function filter_people() {
    // Retrieve selected category and load_all flag from the AJAX request
    $selectedCategory = $_POST['category'];

    // Modify your WP_Query based on the selected category and load_all flag
    $cases_args = array(
        'post_type' => 'people',
        'posts_per_page' => -1,
        'category_name' => $selectedCategory,
        'meta_key' => 'people_full_name',
        'orderby' => 'meta_value',
        'order' => 'ASC',
    );
    $cases_query = new WP_Query($cases_args);

    // Initialize arrays for names starting with 'Å', 'Ä', 'Ö', and regular names
    $names_åäö = array();
    $names_regular = array();

    // Output the retrieved case items
    if ($cases_query->have_posts()) {
        while ($cases_query->have_posts()) {
            $cases_query->the_post();
            $full_name = get_field('people_full_name');
            $role = get_field('people_role');
            $country = get_field('people_country');
            $phone = get_field('people_phone');
            $email = get_field('people_email');
            $profile_picture = get_field('people_profile_picture');

            // Prepare the data for each person
            $person_data = array(
                'full_name' => $full_name,
                'role' => $role,
                'country' => $country,
                'phone' => $phone,
                'email' => $email,
                'profile_picture' => $profile_picture,
            );

            // Check if the name starts with 'Å', 'Ä', or 'Ö', and add them to $names_åäö
            if (str_starts_with($full_name, 'Å') || str_starts_with($full_name, 'Ä') || str_starts_with($full_name, 'Ö')) {
                $names_åäö[] = $person_data;
            } else {
                // Add the person data to $names_regular
                $names_regular[] = $person_data;
            }
        }
        wp_reset_postdata();

        // Custom sorting function to sort based on custom order
        function custom_sort($a, $b) {
            $order = 'abcdefghijklmnopqrstuvwxyzåäöÅÄÖ';
            $a_index = strpos($order, mb_strtolower(mb_substr($a['full_name'], 0, 1, 'UTF-8')), 0);
            $b_index = strpos($order, mb_strtolower(mb_substr($b['full_name'], 0, 1, 'UTF-8')), 0);
            return $a_index - $b_index;
        }

        // Sort the regular names array using the custom_sort function
        usort($names_regular, 'custom_sort');

        // Merge the two arrays with regular names first and 'Å', 'Ä', 'Ö' names at the end
        $people_data = array_merge($names_regular, $names_åäö);

        // Output the sorted people data
        foreach ($people_data as $person) {
            get_template_part('includes/person', 'card', array('class' => 'featured-home', 'data' => $person));
        }
    } else {
        echo 'No people found in the selected category.';
    }
    exit;
}




add_action('wp_ajax_filter_cases', 'filter_cases');
add_action('wp_ajax_nopriv_filter_cases', 'filter_cases');

function filter_cases() {
    // Retrieve selected category from the AJAX request
    $selectedCategory = $_POST['category'];

    // Modify your WP_Query based on the selected category
    $cases_args = array(
        'post_type' => 'cases',
        'posts_per_page' => -1,
        'category_name' => $selectedCategory,
    );
    $cases_query = new WP_Query($cases_args);

    // Output the retrieved case items
    if ($cases_query->have_posts()) {
        while ($cases_query->have_posts()) {
            $cases_query->the_post();
            $customer = get_field('case_customer');
            $name = get_field('case_name');
            $image = get_field('case_thumbnail');
            ?>
            <a href="<?php the_permalink();?>" class="case_item padding_bottom_sm">
                <img class="loaded_img_first" src="<?php echo $image['url'];?>" alt="<?php echo $name; ?>"/>
                <div class="d-flex flex-row flex-nowrap align-items-baseline pt-3 gap_lg">
                    <p class="small_title adieu_regular mb-0"><?php echo $customer; ?></p>
                    <p class="small_title adieu_light mb-0"><?php echo $name; ?></p>
                </div>
            </a>
            <?php
        }
        wp_reset_postdata();
    } else {
        echo 'No cases found.';
    }
    exit;
}
// WP ADMIN CUSTOMIZATION
add_action('admin_head', 'my_custom_fonts');
// Possible add in future: body, td, textarea, input, select {font-family: "Poppins", sans-serif;}
function my_custom_fonts() {
  echo '<style>
    .message_to_admin > .acf-input {
      font-size: 14px !important;
    } 
    .message_to_admin > .acf-input strong {
      font-size: 18px !important;
    } 
  </style>';
}

// Add custom column to the cases table
function add_case_thumbnail_order_column($columns) {
  $columns['case_thumbnail_order'] = 'Thumbnail Order';
  return $columns;
}
add_filter('manage_cases_posts_columns', 'add_case_thumbnail_order_column');

// Populate custom column with field value
function populate_case_thumbnail_order_column($column, $post_id) {
  if ($column === 'case_thumbnail_order') {
      $thumbnail_order = get_field('case_thumbnail_order', $post_id);
      
      if ($thumbnail_order !== 'not_featured') {
          echo $thumbnail_order;
      }
  }
}
add_action('manage_cases_posts_custom_column', 'populate_case_thumbnail_order_column', 10, 2);

// NEWS ARTICLES ARCHIVE - LOAD MORE POSTS
function my_theme_scripts() {
  wp_enqueue_script('load-more', get_template_directory_uri() . '/js/load-more.js', array('jquery'), '1.0.0', true);
  wp_localize_script('load-more', 'load_more_params', array(
      'ajax_url' => admin_url('admin-ajax.php'),
  ));
}
add_action('wp_enqueue_scripts', 'my_theme_scripts');

function load_more_news_articles() {
  $page = isset($_POST['page']) ? intval($_POST['page']) : 1;

  $news_args = array(
      'post_type' => 'news-articles', 
      'posts_per_page' => 8,
      'paged' => $page,
      'meta_query' => array(
          array(
              'key' => 'news_date', // Custom field key for the news date
              'type' => 'DATE',
              'compare' => '!=', 
          ),
      ),
      'meta_key' => 'news_date', // Sort by the news date
      'orderby' => 'meta_value',
      'order' => 'DESC', // Display posts in ascending order of dates
  );
  $news_articles_query = new WP_Query($news_args);

  if ($news_articles_query->have_posts()) :
    
      while ($news_articles_query->have_posts()) : $news_articles_query->the_post();
          $news_title = get_field('news_title');
          $news_text = get_field('news_text');
          $news_date = get_field('news_date');
          $news_image = get_field('news_image');
          $news_link = get_field('news_link');
          ?>
              <div class="news_item">
                  <div class="front_page">
                      <div>
                          <p class="font-weight-bold adieu_black text_2"><?php echo $news_date; ?></p>
                          <p class="text_2 bold_1 text_ellipsis_3"><?php echo $news_title; ?></p>
                      </div>
                      <p class="text_1 text_ellipsis_4"><?php echo $news_text; ?></p>
                  </div>
                  <div class="back_page">
                      <div class="button_wrapper">
                          <div class="h-100 d-flex justify-content-center align-items-center">
                              <a 
                              href="<?php echo $news_link; ?>" 
                              target="_blank" 
                              class="secondary_button <?php if (empty($news_image)) : echo "no_image"; endif; ?>"
                              >Read more</a>
                          </div>
                      </div>
                      <?php if (!empty($news_image)) : ?>
                          <img src="<?php echo $news_image['url']; ?>" alt="News Image" />
                      <?php endif; ?>
                  </div>
              </div>
          <?php
      endwhile;
  endif;
  wp_reset_postdata();
  wp_die();
}
add_action('wp_ajax_load_more_news_articles', 'load_more_news_articles');
add_action('wp_ajax_nopriv_load_more_news_articles', 'load_more_news_articles');



// CUSTOMIZED FOOTER - Add a custom section to the customizer
function theme_customizer_options($wp_customize) {
  // Create a new section for footer options
  $wp_customize->add_section('footer_section', array(
      'title' => 'Footer Options',
      'priority' => 30,
  ));

  // Add a setting for footer text
  $wp_customize->add_setting('footer_text', array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field',
  ));

  // Add a control for footer text
  $wp_customize->add_control('footer_text_control', array(
      'label' => 'Footer Text',
      'section' => 'footer_section',
      'settings' => 'footer_text',
      'type' => 'textarea',
  ));
}
add_action('customize_register', 'theme_customizer_options');

// LOAD FORM
// The following Ajax handler is inside a loaded PHP file,
// such as a plugin, or in this sample, the functions.php file.

add_action('wp_ajax_my_get_support', 'ajax_my_get_support');

/**
 * Ajax handler that gernates the form with all 
 * required JS files and CSS rules.
 */
function ajax_my_get_support() {
  // Forminator needs the DOING_AJAX flag to 
  // correctly enqueue everything.
  if ( ! defined( 'DOING_AJAX' ) ) {
    define( 'DOING_AJAX', true );
  }
  if ( ! defined( 'WP_ADMIN' ) ) {
    define( 'WP_ADMIN', true );
  }

  ob_start();
  echo do_shortcode('[forminator_form id="1062"]');

  // Add the JS files and inline styles, etc.
  // Since this is an ajax request, this should only 
  // output Forminator-related code.
  print_head_scripts();
  do_action( 'wp_footer' );
  print_late_styles();
  print_footer_scripts();

  $code = ob_get_clean();

  wp_send_json_success( $code );
}

function my_get_adjacent_post_where($sql) {
  global $wpdb, $post;
  if ($post->post_type == 'articles') {
      $sql = str_replace("{$wpdb->posts}.post_date", "post_date_gmt", $sql);
  }
  return $sql;
}
add_filter('get_previous_post_where', 'my_get_adjacent_post_where');
add_filter('get_next_post_where', 'my_get_adjacent_post_where');


?>

