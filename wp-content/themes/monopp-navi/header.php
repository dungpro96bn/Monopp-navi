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

    <!--font import-->
    <!--font-family: "Roboto", sans-serif;-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

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
            <div class="header-inner">
                <div class="header-logo">
                    <a class="link-logo" href="<?php echo home_url(); ?>">
                        <picture class="logo">
                            <source srcset="<?php bloginfo('template_directory'); ?>/assets/images/logo.svg">
                            <img class="sizes" src="<?php bloginfo('template_directory'); ?>/assets/images/logo.svg" alt="<?php bloginfo('name'); ?>">
                        </picture>
                        <span class="subTitle-logo">製造・福祉の情報メディア</span>
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
                </div>
                <div class="header-action-right">
                    <div class="searchForm">
                        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                            <label>
                                <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('サイト内検索', 'placeholder'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                            </label>
                        </form>
                    </div>
                    <div class="btn-openMenu">
                    <span class="icon-btnMenu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="10" viewBox="0 0 23 10" fill="none">
                          <rect x="0.579102" width="22" height="2" fill="white"/>
                          <rect x="0.579102" y="4" width="16" height="2" fill="white"/>
                          <rect x="0.579102" y="8" width="11" height="2" fill="white"/>
                        </svg>
                    </span>
                        <span class="title-btnMenu">menu</span>
                    </div>
                </div>
            </div>
        </div><!-- .header-nav -->
    </header><!-- #header-menu -->

    <main role="main">
        <div class="bg-popup"></div>