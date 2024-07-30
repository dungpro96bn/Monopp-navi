<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <!--[if lt IE 10]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <![endif]-->
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1">
    <title><?php
        global $page, $paged;
        wp_title('|', true, 'right');
        bloginfo('name');
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page())) {
            echo " | $site_description";
        }
        if ($paged >= 2 || $page >= 2) {
            echo ' | ' . sprintf(__('Page %s', 'cTpl'), max($paged, $page));
        }
        ?></title>

    <!-- css file-->
    <link rel="stylesheet" media="all" href="<?php bloginfo('template_directory'); ?>/assets/css/all.min.css">
    <link rel="stylesheet" media="all" href="<?php bloginfo('template_directory'); ?>/assets/css/aos.css" rel="stylesheet">
    <link rel="stylesheet" media="all" href="<?php bloginfo('template_directory'); ?>/assets/css/slick.css">
    <link rel="stylesheet" media="all" href="<?php bloginfo('stylesheet_url'); ?>?ver=<?php echo rand(); ?>">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <script src="<?php bloginfo('template_directory'); ?>/assets/js/pro.js" crossorigin="anonymous"></script>
    <?php
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', array(), '2.2.4');
    wp_head();
    ?>

    <!--file js-->
    <script src="<?php bloginfo('template_directory'); ?>/assets/js/aos.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/js/slick.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/assets/js/main.js?ver=<?php echo rand(); ?>"></script>

    <?php if (is_admin_bar_showing()): ?>
        <style type="text/css" media="screen">
            #header-menu .header-nav.scroll-header {
                top: 32px !important;
            }

            @media screen and (max-width: 782px) {
                #header-menu .header-nav.scroll-header {
                    top: 46px !important;
                }
            }
        </style>
    <?php endif; ?>

</head>

<body <?php body_class(); ?>>
<div class="outer">
    <header id="header-menu" class="header-menu">
        <div class="header-nav">
            <div class="header-logo">
                <a class="link-logo" href="<?php echo home_url(); ?>">
                    <picture class="logo-scroll">
                        <source srcset="<?php bloginfo('template_directory'); ?>/assets/images/logo_scroll.svg">
                        <img class="sizes" src="<?php bloginfo('template_directory'); ?>/assets/images/logo_scroll.svg" alt="<?php bloginfo('name'); ?>">
                    </picture>
                    <picture class="logo">
                        <source srcset="<?php bloginfo('template_directory'); ?>/assets/images/logo.svg">
                        <img class="sizes" src="<?php bloginfo('template_directory'); ?>/assets/images/logo.svg" alt="<?php bloginfo('name'); ?>">
                    </picture>
                </a>
            </div><!-- .header-logo -->
            <div class="right-header header-megamenu">
                <?php wp_nav_menu(
                    array(
                        'menu_class' => 'navMenu',
                        'menu_id' => 'navList-menu',
                        'container' => 'div',
                        'container_id' => 'nav-container'
                    )
                ); ?>
                <div class="contact-action">
                    <a class="contact-btn btn-green c-g" href="/contact/">Contact</a>
                </div>
            </div>
            <div class="btn-openMenu">
                <p class="c-g"><small class="open">Menu</small><small class="close">Close</small></p>
                <div class="toggle-btn">
                    <span></span>
                </div>
            </div>

        </div><!-- .header-nav -->
    </header><!-- #header-menu -->

    <main role="main">
        <div class="bg-popup"></div>