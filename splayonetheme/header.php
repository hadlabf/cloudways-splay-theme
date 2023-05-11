<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title( '|', true, 'right' ); ?></title>	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
		<!-- IE8 fallback moved below head to work properly. Added respond as well. Tested to work. -->
			<!-- media-queries.js (fallback) -->
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
		<![endif]-->

		<!-- html5.js -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->	
		
			<!-- respond.js -->
		<!--[if lt IE 9]>
		          <script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
		<![endif]-->	
	</head>
	
	<body class="<?php echo $args['header_style']; ?>">
    <?php if ($args['logo_color'] === "white") :
        $color = 'white' ;
    else :
        $color = 'black';
    endif;
    ?>
    <header>
    <div class="content">
        <div class="row m-0 header_wrapper">
            <div class="d-flex flex-direction-row flex-wrap-nowrap head_nav_items">
                <div class="menu_icon_wrapper">
					<img class="menu_icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/menu-icon-<?php echo $color;?>.png"/>
                </div>
                <a href="<?php echo site_url('/cases');?>">Work</a>
                <a href="<?php echo site_url('/news-articles');?>">News</a>
                <a href="<?php echo site_url('/talent');?>">Talent</a>
                <a href="<?php echo site_url('/our-people');?>">People</a>
                <a href="<?php echo site_url('/about');?>">About us</a>
                <a href="<?php echo site_url('/contact');?>">Contact</a>
            </div>
            <div class="menu_icon_wrapper">
                <a class="" href="<?php echo site_url('/');?>">
                    <img class="menu_icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-<?php echo $color;?>.png"/>
                </a>
            </div>
    </div>
    </div>
    </header>
	<div class="page">
            

