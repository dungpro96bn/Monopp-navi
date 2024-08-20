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
            #header-menu{
                top: 32px;
            }
            #header-menu .header-nav.scroll-header {
                top: 32px !important;
            }

            @media screen and (max-width: 782px) {
                #header-menu{
                    top: 46px;
                }
                #header-menu .header-nav.scroll-header {
                    top: 46px !important;
                }
            }
        </style>
    <?php endif; ?>

</head>

<style>
    #loading-spinner {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: white;
        opacity: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    #loading-spinner i {
        font-size: 60px;
        color: #000000;
    }
</style>

<body <?php body_class(); ?>>
<div class="outer">
    <div class="bg-loading-search"></div>
    <header id="header-menu" class="header-menu">
        <div class="header-nav">
            <div class="header-inner">
                <div class="header-logo">
                    <a class="link-logo" href="<?php echo home_url(); ?>">
                        <picture class="logo">
                            <source srcset="<?php bloginfo('template_directory'); ?>/assets/images/logo.svg">
                            <img class="sizes" src="<?php bloginfo('template_directory'); ?>/assets/images/logo.svg" alt="<?php bloginfo('name'); ?>">
                        </picture>
                        <span class="subTitle-logo">製造・工場系求人の情報メディア</span>
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
                    <div class="searchForm" id="search-form">
                        <div class="toggle-form">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.4591 7.33772C11.4591 9.47747 9.72454 11.2121 7.58479 11.2121C5.44505 11.2121 3.71045 9.47747 3.71045 7.33772C3.71045 5.19798 5.44505 3.46338 7.58479 3.46338C9.72454 3.46338 11.4591 5.19798 11.4591 7.33772ZM11.0718 13.2633C10.0495 13.8662 8.85755 14.2121 7.58479 14.2121C3.7882 14.2121 0.710449 11.1343 0.710449 7.33772C0.710449 3.54113 3.7882 0.463379 7.58479 0.463379C11.3814 0.463379 14.4591 3.54113 14.4591 7.33772C14.4591 8.86609 13.9604 10.278 13.1167 11.4195L17.2895 15.5922L15.3452 17.5366L11.0718 13.2633Z" fill="#2E2E2E"/>
                            </svg>
                        </div>
                        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                            <label class="control">
                                <input type="search" id="search-box" placeholder="<?php echo esc_attr_x('フリーワード検索', 'placeholder'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                                <button>
                                    <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="6.87435" cy="7.33772" r="5.37435" stroke="#A0A0A0" stroke-width="3"/>
                                        <rect x="11.0796" y="10.0928" width="7.77743" height="2.74974" transform="rotate(45 11.0796 10.0928)" fill="#A0A0A0"/>
                                    </svg>
                                </button>
                                <div class="amsearch-loader-block"></div>
                            </label>
                        </form>
                        <div class="results-form">
                            <div class="results-box"></div>
<!--                            <div class="results-count ttl-en"></div>-->
                            <div class="search-link"></div>
                            <div class="loading"><img src="<?php bloginfo('template_directory'); ?>/assets/images/loader-1.gif" alt=""></div>
                        </div>
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

    <div id="header-popup">
        <div class="inner">
            <div class="header-content">
                <div class="logo">
                    <picture>
                        <source srcset="<?php bloginfo('template_directory'); ?>/assets/images/logo-popup.svg">
                        <img class="sizes" src="<?php bloginfo('template_directory'); ?>/assets/images/logo-popup.svg" alt="<?php bloginfo('name'); ?>">
                    </picture>
                    <span class="subTitle-logo">製造・工場系求人の情報メディア</span>
                </div>
                <div id="menu">
                    <?php wp_nav_menu(
                        array(
                            'menu_class' => 'navMenu',
                            'menu_id' => 'navList-menu',
                            'container' => 'div',
                            'container_id' => 'nav-container'
                        )
                    ); ?>
                </div>
                <ul class="contact-list">
                   <li class="link-item">
                       <a href="/about/"><span>ものっぷナビについて</span><i class="fa-solid fa-arrow-right-long"></i></a>
                   </li>
                    <li class="link-item">
                        <a target="_blank" href="https://www.hirayama-global-support.com/hirayamastaff/contact/"><span>お問い合わせ</span><i class="fa-solid fa-arrow-right-long"></i></a>
                    </li>
                    <li class="link-item">
                        <a href="/sitemap/"><span>サイトマップ</span><i class="fa-solid fa-arrow-right-long"></i></a>
                    </li>
                    <li class="link-item">
                        <a target="_blank" href="https://www.hirayamastaff.co.jp/#info"><span>運営会社</span><i class="fa-solid fa-arrow-right-long"></i></a>
                    </li>
                </ul>
                <ul class="social-list">
                    <li class="social-item">
                        <a href="https://x.com/hy_monomaru" target="_blank">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="24" cy="24" r="23.5" stroke="white"/>
                                <path d="M26.0929 22.3154L34.283 13H32.3422L25.2309 21.0886L19.5511 13H13L21.589 25.2313L13 35H14.941L22.4508 26.4583L28.4491 35H35.0002L26.0928 22.3154H26.0933H26.0929ZM23.4346 25.3391L22.5643 24.1212L15.6402 14.4296H18.6212L24.2092 22.2508L25.0795 23.4687L32.3431 33.6352H29.3621L23.4348 25.3392V25.3387L23.4346 25.3391Z" fill="white"/>
                            </svg>
                        </a>
                    </li>
                    <li class="social-item">
                        <a href="https://www.instagram.com/hirayama_monoppu/" target="_blank">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="24" cy="24" r="23.5" stroke="white"/>
                                <path d="M19.4442 13.0761C18.2738 13.1314 17.4744 13.3188 16.7759 13.5925C16.0527 13.8743 15.4398 14.2523 14.83 14.8645C14.2195 15.4772 13.8446 16.0912 13.5647 16.815C13.2939 17.5153 13.1102 18.3152 13.0587 19.4863C13.0073 20.6598 12.9956 21.034 13.0013 24.0211C13.007 27.0079 13.0202 27.3827 13.0761 28.5564C13.132 29.7266 13.3188 30.5257 13.5925 31.2246C13.8747 31.9477 14.2522 32.5604 14.8647 33.1705C15.477 33.7806 16.0914 34.1552 16.8157 34.4353C17.5153 34.7059 18.3154 34.89 19.4863 34.9413C20.6595 34.993 21.0342 35.0044 24.0205 34.9987C27.0081 34.993 27.3827 34.9798 28.556 34.9241C29.7264 34.8682 30.525 34.6808 31.2244 34.4078C31.9475 34.1249 32.5604 33.748 33.1703 33.1355C33.7801 32.5233 34.155 31.9088 34.4348 31.1846C34.7056 30.485 34.89 29.6848 34.9408 28.5146C34.9921 27.3407 35.0042 26.9656 34.9985 23.9791C34.9927 20.9922 34.9793 20.618 34.9237 19.4449C34.868 18.2739 34.6806 17.475 34.4073 16.7759C34.1246 16.0527 33.7475 15.4405 33.1353 14.83C32.523 14.2201 31.9086 13.8446 31.1843 13.5654C30.4843 13.2946 29.6846 13.11 28.5137 13.0594C27.3407 13.0071 26.9663 12.9956 23.9789 13.0013C20.9922 13.0071 20.6177 13.0198 19.4445 13.0761M19.5727 32.9615C18.5002 32.9149 17.9179 32.7367 17.5298 32.5873C17.0159 32.3884 16.6491 32.1499 16.263 31.7669C15.8778 31.3823 15.6387 31.0167 15.438 30.5039C15.2873 30.1158 15.1058 29.5341 15.0557 28.4616C15.0011 27.3022 14.9886 26.9544 14.9833 24.0172C14.9776 21.0808 14.9884 20.7328 15.039 19.5725C15.0849 18.5009 15.2642 17.9177 15.4132 17.53C15.6121 17.0155 15.8497 16.6494 16.2336 16.2633C16.6181 15.8774 16.9838 15.6389 17.497 15.4383C17.8849 15.2867 18.4663 15.1067 19.5384 15.0559C20.6985 15.0009 21.0461 14.9893 23.9824 14.9835C26.9194 14.9778 27.2674 14.9882 28.4277 15.0392C29.4993 15.0858 30.0826 15.2634 30.47 15.4134C30.9843 15.6123 31.3511 15.8492 31.7367 16.2338C32.1224 16.6184 32.3615 16.9833 32.5622 17.4977C32.7135 17.8845 32.8937 18.4668 32.9443 19.5384C32.9995 20.6985 33.0121 21.0463 33.0174 23.9829C33.0231 26.9201 33.0123 27.2679 32.9615 28.4275C32.9148 29.5 32.7369 30.0826 32.5873 30.4711C32.3884 30.9846 32.1506 31.3513 31.7664 31.7374C31.3823 32.122 31.0167 32.3618 30.503 32.5624C30.116 32.7136 29.5337 32.894 28.4623 32.9448C27.3022 32.9993 26.9546 33.0119 24.0172 33.0172C21.0808 33.0229 20.7332 33.0119 19.5729 32.9615M28.5399 18.1201C28.5412 18.8485 29.1337 19.4383 29.8621 19.437C30.591 19.4357 31.1808 18.8437 31.1797 18.115C31.1782 17.3866 30.5859 16.7963 29.8571 16.7977C29.1282 16.799 28.5384 17.3914 28.5397 18.1199M18.3519 24.0108C18.3579 27.1304 20.8916 29.6538 24.0106 29.6476C27.1297 29.6415 29.6544 27.1086 29.6485 23.989C29.6423 20.8705 27.1084 18.3458 23.9888 18.3517C20.8698 18.3579 18.3458 20.8919 18.3519 24.0108ZM20.3333 24.0068C20.3297 21.9822 21.9685 20.3372 23.9927 20.3337C26.0174 20.3298 27.6626 21.9679 27.6665 23.993C27.6705 26.0181 26.0317 27.6626 24.0066 27.6665C21.9822 27.6705 20.337 26.0322 20.3333 24.0071" fill="white"/>
                            </svg>
                        </a>
                    </li>
                    <li class="social-item">
                        <a href="https://www.facebook.com/people/%E6%A0%AA%E5%BC%8F%E4%BC%9A%E7%A4%BE-%E5%B9%B3%E5%B1%B1%E6%B1%82%E4%BA%BA%E3%82%B5%E3%82%A4%E3%83%88-%E3%82%82%E3%81%AE%E3%81%A3%E3%81%B7/100057441670039/" target="_blank">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="24" cy="24" r="23.5" stroke="white"/>
                                <path d="M34 24C34 18.4772 29.5228 14 24 14C18.4772 14 14 18.4772 14 24C14 28.6896 17.2288 32.6248 21.5844 33.7056V27.056H19.5224V24H21.5844V22.6832C21.5844 19.2796 23.1248 17.702 26.4664 17.702C27.1 17.702 28.1932 17.8264 28.6404 17.9504V20.7204C28.4044 20.6956 27.9944 20.6832 27.4852 20.6832C25.8456 20.6832 25.212 21.3044 25.212 22.9192V24H28.4784L27.9172 27.056H25.212V33.9268C30.1636 33.3288 34.0004 29.1128 34.0004 24H34Z" fill="white"/>
                            </svg>
                        </a>
                    </li>
                    <li class="social-item">
                        <a href="https://www.youtube.com/channel/UCFQF7BbFBStPFowSvpYMykQ/featured" target="_blank">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="24" cy="24" r="23.5" stroke="white"/>
                                <path d="M34.5418 18.4986C34.2883 17.5146 33.544 16.7413 32.5968 16.4779C30.88 16 24 16 24 16C24 16 17.12 16 15.405 16.4779C14.4579 16.7413 13.7135 17.5146 13.46 18.4986C13 20.2803 13 24 13 24C13 24 13 27.7197 13.46 29.5014C13.7135 30.4854 14.4579 31.2587 15.405 31.5221C17.12 32 24 32 24 32C24 32 30.88 32 32.595 31.5221C33.5421 31.2587 34.2865 30.4854 34.54 29.5014C35 27.7197 35 24 35 24C35 24 35 20.2803 34.54 18.4986H34.5418ZM21.7996 27.428V20.572L27.5151 24L21.7996 27.428Z" fill="white"/>
                            </svg>
                        </a>
                    </li>
                    <li class="social-item">
                        <a href="https://www.tiktok.com/@hirayamasaiyou" target="_blank">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="24" cy="24" r="23.5" stroke="white"/>
                                <path d="M30.1618 17.4099C28.9885 16.6372 28.1412 15.4011 27.8769 13.9598C27.8199 13.648 27.7886 13.3276 27.7886 13H24.0429L24.0366 28.1582C23.9733 29.856 22.5905 31.2184 20.8943 31.2184C20.3675 31.2184 19.8711 31.085 19.4342 30.8529C18.4321 30.3201 17.7458 29.2593 17.7458 28.039C17.7458 26.2859 19.1582 24.8596 20.8943 24.8596C21.2187 24.8596 21.529 24.9132 21.8237 25.0064V21.145C21.5196 21.1032 21.2101 21.0771 20.8943 21.0771C17.0931 21.0771 14 24.2005 14 28.039C14 30.3943 15.1655 32.4789 16.943 33.7387C18.0631 34.5327 19.4248 35 20.8943 35C24.6956 35 27.7886 31.8774 27.7886 28.0382V20.3518C29.2574 21.4165 31.0576 22.0441 33 22.0441V18.2616C31.9541 18.2616 30.9794 17.9475 30.1625 17.4092L30.1618 17.4099Z" fill="white"/>
                            </svg>
                        </a>
                    </li>
                    <li class="social-item">
                        <a href="https://page.line.me/monoppu?openQrModal=true" target="_blank">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="24" cy="24" r="23.5" stroke="white"/>
                                <path d="M35 22.9427C35 18.0127 30.0651 14 24 14C17.9349 14 13 18.0127 13 22.9427C13 27.3619 16.9133 31.0645 22.1992 31.7652C22.5565 31.8443 23.0445 32.004 23.1689 32.3093C23.279 32.5877 23.2413 33.0242 23.2051 33.3057C23.2051 33.3057 23.076 34.0839 23.0477 34.2484C23.0004 34.5284 22.8273 35.3382 24 34.8431C25.1743 34.3481 30.3343 31.1056 32.642 28.4469C34.2365 26.696 35 24.9182 35 22.9443V22.9427ZM19.6932 25.8767H17.5083C17.1903 25.8767 16.9322 25.6173 16.9322 25.2978V20.9198C16.9322 20.6003 17.1919 20.3409 17.5083 20.3409C17.8247 20.3409 18.0844 20.6003 18.0844 20.9198V24.7205H19.6932C20.0112 24.7205 20.2693 24.9783 20.2693 25.2962C20.2693 25.6141 20.0112 25.8751 19.6932 25.8751V25.8767ZM21.9536 25.2978C21.9536 25.6173 21.6955 25.8767 21.3775 25.8767C21.0595 25.8767 20.8014 25.6173 20.8014 25.2978V20.9198C20.8014 20.6003 21.0595 20.3409 21.3775 20.3409C21.6955 20.3409 21.9536 20.6003 21.9536 20.9198V25.2978ZM27.2159 25.2978C27.2159 25.5477 27.0585 25.7675 26.8224 25.845C26.7626 25.8672 26.7012 25.8767 26.6398 25.8767C26.4604 25.8767 26.2872 25.7897 26.1786 25.6458L23.9386 22.59V25.2994C23.9386 25.6189 23.6805 25.8783 23.3625 25.8783C23.0445 25.8783 22.7863 25.6189 22.7863 25.2994V20.9213C22.7863 20.6714 22.9453 20.45 23.1799 20.3725C23.2397 20.3519 23.3011 20.3425 23.3625 20.3425C23.5419 20.3425 23.7151 20.4294 23.8237 20.5734L26.0637 23.6307V20.9213C26.0637 20.6018 26.3234 20.3425 26.6398 20.3425C26.9562 20.3425 27.2159 20.6018 27.2159 20.9213V25.2994V25.2978ZM30.7514 22.5315C31.0694 22.5315 31.3291 22.7924 31.3291 23.1104C31.3291 23.4283 31.071 23.6892 30.7514 23.6892H29.1427V24.7237H30.7514C31.0694 24.7237 31.3291 24.9815 31.3291 25.2994C31.3291 25.6173 31.0694 25.8783 30.7514 25.8783H28.5665C28.2486 25.8783 27.9904 25.6189 27.9904 25.2994V23.1104V20.9229C27.9904 20.6034 28.2486 20.3425 28.5665 20.3425H30.7514C31.0694 20.3425 31.3291 20.6018 31.3291 20.9213C31.3291 21.2408 31.071 21.4986 30.7514 21.4986H29.1427V22.5315H30.7514Z" fill="white"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="search-popup">
                <h2 class="title-search">フリーワード検索</h2>
                <div class="search-wp">
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                        <label class="control">
                            <input type="search" id="search-box" placeholder="<?php echo esc_attr_x('フリーワード検索', 'placeholder'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                            <button>
                                <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="6.87435" cy="7.33772" r="5.37435" stroke="#A0A0A0" stroke-width="3"/>
                                    <rect x="11.0796" y="10.0928" width="7.77743" height="2.74974" transform="rotate(45 11.0796 10.0928)" fill="#A0A0A0"/>
                                </svg>
                            </button>
                            <div class="amsearch-loader-block"></div>
                        </label>
                    </form>
                </div>
                <div class="popular-articles sidebar-box">
                    <h2 class="heading-block">人気記事</h2>
                    <ul class="popular-articles-list">
                        <?php
                        $args = array(
                            'post_type'      => 'post',
                            'post_status'    => 'publish',
                            'order'         => 'DESC',
                            'posts_per_page' => 1,
                            'meta_query'     => array(
                                array(
                                    'key'     => 'select_popular_posts',
                                    'value'   => 'Yes',
                                    'compare' => 'LIKE'
                                )
                            ),
                        );
                        $result = new WP_Query( $args );
                        if ( $result-> have_posts() ) : ?>
                            <?php while ( $result->have_posts() ) : $result->the_post(); ?>
                                <li class="popular-articles-item">
                                    <a class="link-post" href="<?php the_permalink(); ?>">
                                        <div class="image-post">
                                            <p class="img-inner">
                                                <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                                            </p>
                                        </div>
                                        <div class="info">
                                            <h2 class="title-post color-w"><?php echo get_the_title(); ?></h2>
                                            <p class="date-time number"><?php echo get_the_date(); ?></p>
                                        </div>
                                    </a>
                                    <span class="number-post en color-w">01</span>
                                </li>
                            <?php endwhile;?>
                        <?php endif;
                        $idSelect = 0;
                        if ($result->have_posts()) {
                            $result->the_post();
                            $idSelect = get_the_ID();
                        }
                        wp_reset_postdata(); ?>

                        <?php
                        $args = array(
                            'post_type'      => 'post',
                            'post_status'    => 'publish',
                            'post__not_in'   => array($idSelect),
                            'meta_key'       => 'post_view',
                            'orderby'       => 'meta_value_num',
                            'order'         => 'DESC',
                            'posts_per_page' => 4,
                        );
                        $result = new WP_Query( $args );
                        $num = 2;
                        if ( $result-> have_posts() ) : ?>
                            <?php while ( $result->have_posts() ) : $result->the_post(); ?>
                                <?php $numberPost = $num++; ?>
                                <li class="popular-articles-item">
                                    <a class="link-post" href="<?php the_permalink(); ?>">
                                        <div class="image-post">
                                            <p class="img-inner">
                                                <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                                            </p>
                                        </div>
                                        <div class="info">
                                            <h2 class="title-post color-w"><?php echo get_the_title(); ?></h2>
                                            <p class="date-time number"><?php echo get_the_date(); ?></p>
                                        </div>
                                    </a>
                                    <span class="number-post en color-w"><?php echo "0".$numberPost; ?></span>
                                </li>
                            <?php endwhile;?>
                        <?php endif;
                        wp_reset_postdata(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bg-header"></div>
        <div class="close-header">
            <svg width="52" height="48" viewBox="0 0 52 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M45.4031 6.22575L43.2817 4.10443L25.8059 21.5803L8.71814 4.49254L6.59681 6.61386L23.6846 23.7016L6 41.3862L8.12132 43.5075L25.8059 25.8229L43.8786 43.8956L45.9999 41.7743L27.9272 23.7016L45.4031 6.22575Z" fill="white"/>
            </svg>
            <span class="txt-close en">CLOSE</span>
        </div>
    </div>

    <main role="main">
        <div class="bg-popup"></div>

        <script>
            document.getElementById('search-form').addEventListener('submit', function(event) {
                var searchBox = document.getElementById('search-box');
                if (searchBox.value.length < 2) {
                    event.preventDefault();
                    $error = '<p class="ttl-en result-error">Please enter at least 2 characters to search.</p>'
                    $('.results-box').html($error);
                    $(".searchForm").addClass("is-active");
                    $("body").addClass("search-focus");
                }
            });

            $("#navList-menu > li:last-child > a").attr("target", "_blank");

        </script>

        <script>
            $(document).ready(function($) {
                var debounceTime = 1000;
                var debounceTimeout;
                var lastQuery = ''; // Biến lưu trữ giá trị tìm kiếm trước đó

                $(document).on('focus input', '.searchForm form input', function() {
                    clearTimeout(debounceTimeout); // Xóa timeout trước đó nếu có

                    var query = $(this).val(); // Lấy giá trị của ô tìm kiếm

                    // Nếu giá trị tìm kiếm không thay đổi, không thực hiện tìm kiếm
                    if (query === lastQuery) {
                        return;
                    }

                    // Cập nhật giá trị tìm kiếm trước đó
                    lastQuery = query;

                    if (query.length > 1) {
                        $(".amsearch-loader-block").show();
                        $(".loading").addClass("active");
                    }

                    debounceTimeout = setTimeout(function() {
                        if (query.length > 1) {
                            $.ajax({
                                url: ajaxurl, // URL của endpoint AJAX trong WordPress
                                type: 'GET',
                                data: {
                                    action: 'quick_search', // Tên hành động AJAX
                                    query: query // Truyền giá trị tìm kiếm
                                },
                                success: function(response) {
                                    $('.results-box').html(response.html); // Hiển thị kết quả trong div.results-box

                                    if (response.count > 6) {
                                        $('.search-link').html(response.link).show(); // Hiển thị liên kết đến trang tìm kiếm nếu có nhiều hơn 2 kết quả
                                    } else {
                                        $('.search-link').hide(); // Ẩn liên kết tìm kiếm nếu ít hơn hoặc bằng 2 kết quả
                                    }

                                    $(".searchForm").addClass("is-active");
                                    $(".amsearch-loader-block").hide();
                                    $(".loading").removeClass("active");
                                },
                                error: function() {
                                    $('.results-box').html('<p class="ttl-en">Đã xảy ra lỗi. Vui lòng thử lại sau.</p>'); // Xử lý lỗi
                                    $(".amsearch-loader-block").hide();
                                }
                            });
                        } else {
                            $('.results-box').empty(); // Xóa kết quả nếu ô tìm kiếm rỗng
                            $('.search-link').hide(); // Ẩn liên kết tìm kiếm
                            $(".searchForm").removeClass("is-active");
                            $(".loading").removeClass("active");
                            $(".amsearch-loader-block").hide();
                        }
                    }, debounceTime); // Đặt timeout để thực hiện tìm kiếm sau thời gian debounce
                });
            });
        </script>