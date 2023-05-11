<!DOCTYPE html>
<html>
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <?php 
    wp_head();
    ?>
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
            

