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
                    <div class="searchForm" id="search-form">
                        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                            <label class="control">
                                <input type="search" id="search-box" placeholder="<?php echo esc_attr_x('サイト内検索', 'placeholder'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
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

                                    if (response.count > 2) {
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