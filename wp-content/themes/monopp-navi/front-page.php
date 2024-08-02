<?php get_header(); ?>

<div id="loading-spinner">
    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIHN0eWxlPSItLWFuaW1hdGlvbi1zdGF0ZTogcnVubmluZzsiPgogICAgICA8c3R5bGU+CiAgICAgICAgOnJvb3QgewogICAgICAgICAgLS1hbmltYXRpb24tc3RhdGU6IHBhdXNlZDsKICAgICAgICB9CgogICAgICAgIC8qIHVzZXIgcGlja2VkIGEgdGhlbWUgd2hlcmUgdGhlICJyZWd1bGFyIiBzY2hlbWUgaXMgZGFyayAqLwogICAgICAgIC8qIHVzZXIgcGlja2VkIGEgdGhlbWUgYSBsaWdodCBzY2hlbWUgYW5kIGFsc28gZW5hYmxlZCBhIGRhcmsgc2NoZW1lICovCgogICAgICAgIC8qIGRlYWwgd2l0aCBsaWdodCBzY2hlbWUgZmlyc3QgKi8KICAgICAgICBAbWVkaWEgKHByZWZlcnMtY29sb3Itc2NoZW1lOiBsaWdodCkgewogICAgICAgICAgOnJvb3QgewogICAgICAgICAgICAtLXByaW1hcnk6ICMyMjIyMjI7CiAgICAgICAgICAgIC0tc2Vjb25kYXJ5OiAjZmZmZmZmOwogICAgICAgICAgICAtLXRlcnRpYXJ5OiAjMDA4OGNjOwogICAgICAgICAgICAtLXF1YXRlcm5hcnk6ICNlNDU3MzU7CiAgICAgICAgICAgIC0taGlnaGxpZ2h0OiAjZmZmZjRkOwogICAgICAgICAgICAtLXN1Y2Nlc3M6ICMwMDk5MDA7CiAgICAgICAgICB9CiAgICAgICAgfQoKICAgICAgICAvKiB0aGVuIGRlYWwgd2l0aCBkYXJrIHNjaGVtZSAqLwogICAgICAgIEBtZWRpYSAocHJlZmVycy1jb2xvci1zY2hlbWU6IGRhcmspIHsKICAgICAgICAgIDpyb290IHsKICAgICAgICAgICAgLS1wcmltYXJ5OiAjMjIyMjIyOwogICAgICAgICAgICAtLXNlY29uZGFyeTogI2ZmZmZmZjsKICAgICAgICAgICAgLS10ZXJ0aWFyeTogIzAwODhjYzsKICAgICAgICAgICAgLS1xdWF0ZXJuYXJ5OiAjZTQ1NzM1OwogICAgICAgICAgICAtLWhpZ2hsaWdodDogI2ZmZmY0ZDsKICAgICAgICAgICAgLS1zdWNjZXNzOiAjMDA5OTAwOwogICAgICAgICAgfQogICAgICAgIH0KCiAgICAgICAgLyogdGhlc2Ugc3R5bGVzIG5lZWQgdG8gbGl2ZSBoZXJlIGJlY2F1c2UgdGhlIFNWRyBoYXMgYSBkaWZmZXJlbnQgc2NvcGUgKi8KICAgICAgICAuZG90cyB7CiAgICAgICAgICBhbmltYXRpb24tbmFtZTogbG9hZGVyOwogICAgICAgICAgYW5pbWF0aW9uLXRpbWluZy1mdW5jdGlvbjogZWFzZS1pbi1vdXQ7CiAgICAgICAgICBhbmltYXRpb24tZHVyYXRpb246IDNzOwogICAgICAgICAgYW5pbWF0aW9uLWl0ZXJhdGlvbi1jb3VudDogaW5maW5pdGU7CiAgICAgICAgICBhbmltYXRpb24tcGxheS1zdGF0ZTogdmFyKC0tYW5pbWF0aW9uLXN0YXRlKTsKICAgICAgICAgIHN0cm9rZTogI2ZmZjsKICAgICAgICAgIHN0cm9rZS13aWR0aDogMC41cHg7CiAgICAgICAgICB0cmFuc2Zvcm0tb3JpZ2luOiBjZW50ZXI7CiAgICAgICAgICBvcGFjaXR5OiAwOwogICAgICAgICAgcjogbWF4KDF2dywgMTFweCk7CiAgICAgICAgICBjeTogNTAlOwogICAgICAgICAgZmlsdGVyOiBzYXR1cmF0ZSgyKSBvcGFjaXR5KDAuODUpOwogICAgICAgIH0KCiAgICAgICAgLmRvdHM6Zmlyc3QtY2hpbGQgewogICAgICAgICAgZmlsbDogdmFyKC0tcXVhdGVybmFyeSk7CiAgICAgICAgfQoKICAgICAgICAuZG90czpudGgtY2hpbGQoMikgewogICAgICAgICAgZmlsbDogdmFyKC0tcXVhdGVybmFyeSk7CiAgICAgICAgICBhbmltYXRpb24tZGVsYXk6IDAuMTVzOwogICAgICAgIH0KCiAgICAgICAgLmRvdHM6bnRoLWNoaWxkKDMpIHsKICAgICAgICAgIGZpbGw6IHZhcigtLWhpZ2hsaWdodCk7CiAgICAgICAgICBhbmltYXRpb24tZGVsYXk6IDAuM3M7CiAgICAgICAgfQoKICAgICAgICAuZG90czpudGgtY2hpbGQoNCkgewogICAgICAgICAgZmlsbDogdmFyKC0tdGVydGlhcnkpOwogICAgICAgICAgYW5pbWF0aW9uLWRlbGF5OiAwLjQ1czsKICAgICAgICB9CgogICAgICAgIC5kb3RzOm50aC1jaGlsZCg1KSB7CiAgICAgICAgICBmaWxsOiB2YXIoLS10ZXJ0aWFyeSk7CiAgICAgICAgICBhbmltYXRpb24tZGVsYXk6IDAuNnM7CiAgICAgICAgfQoKICAgICAgICBAa2V5ZnJhbWVzIGxvYWRlciB7CiAgICAgICAgICAwJSB7CiAgICAgICAgICAgIG9wYWNpdHk6IDA7CiAgICAgICAgICAgIHRyYW5zZm9ybTogc2NhbGUoMSk7CiAgICAgICAgICB9CiAgICAgICAgICA0NSUgewogICAgICAgICAgICBvcGFjaXR5OiAxOwogICAgICAgICAgICB0cmFuc2Zvcm06IHNjYWxlKDAuNyk7CiAgICAgICAgICB9CiAgICAgICAgICA2NSUgewogICAgICAgICAgICBvcGFjaXR5OiAxOwogICAgICAgICAgICB0cmFuc2Zvcm06IHNjYWxlKDAuNyk7CiAgICAgICAgICB9CiAgICAgICAgICAxMDAlIHsKICAgICAgICAgICAgb3BhY2l0eTogMDsKICAgICAgICAgICAgdHJhbnNmb3JtOiBzY2FsZSgxKTsKICAgICAgICAgIH0KICAgICAgICB9CiAgICAgIDwvc3R5bGU+CgogICAgICA8ZyBjbGFzcz0iY29udGFpbmVyIj4KICAgICAgICA8Y2lyY2xlIGNsYXNzPSJkb3RzIiBjeD0iMzB2dyIvPgogICAgICAgIDxjaXJjbGUgY2xhc3M9ImRvdHMiIGN4PSI0MHZ3Ii8+CiAgICAgICAgPGNpcmNsZSBjbGFzcz0iZG90cyIgY3g9IjUwdnciLz4KICAgICAgICA8Y2lyY2xlIGNsYXNzPSJkb3RzIiBjeD0iNjB2dyIvPgogICAgICAgIDxjaXJjbGUgY2xhc3M9ImRvdHMiIGN4PSI3MHZ3Ii8+CiAgICAgIDwvZz4KICAgIDwvc3ZnPg==" alt="">
</div>

<div id="homepage" class="">

    <div class="silder-homepage">
        <div class="bg-slider-post"></div>
        <div class="slider">
            <ul class="sliderList">
                <?php
                $argsSlider = array(
                    'post_type'=> 'post',
                    'post_status' => 'publish',
                    'order'    => 'DESC',
                    'posts_per_page' => '1',
                    'meta_query'     => array(
                        array(
                            'key'     => 'select_this_post_slider',
                            'value'   => 'Yes',
                            'compare' => 'LIKE'
                        )
                    ),
                );

                $result = new WP_Query( $argsSlider );

                if ( $result-> have_posts() ) : ?>
                    <?php while ( $result->have_posts() ) : $result->the_post(); ?>
                        <li class="sliderItem-post">
                            <a class="link-post" href="<?php the_permalink(); ?>">
                                <p class="image-post">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                                </p>
                                <h2 class="title-post"><?php echo get_the_title(); ?></h2>
                            </a>
                            <div class="info-bottom">
                                <div class="category">
                                    <?php
                                    $country_lists = wp_get_post_terms($post->ID, 'category', array("fields" => "all"));
                                    foreach ($country_lists as $country_list) { ?>
                                        <a href="<?php echo get_category_link($country_list->term_id); ?>"># <?php echo $country_list->name; ?></a>
                                    <?php } ?>
                                </div>
                                <p class="date-time number"><?php echo get_the_date(); ?></p>
                            </div>
                        </li>
                    <?php endwhile;?>
                <?php endif;

                $first_post_id = 0;
                if ($result->have_posts()) {
                    $result->the_post();
                    $first_post_id = get_the_ID();
                }
                wp_reset_postdata(); ?>


                <?php
                $args = array(
                    'post_type'=> 'post',
                    'post_status' => 'publish',
                    'post__not_in'   => array($first_post_id),
                    'order'    => 'DESC',
                    'posts_per_page' => '4'
                );
                $result = new WP_Query( $args );
                if ( $result-> have_posts() ) : ?>
                    <?php while ( $result->have_posts() ) : $result->the_post(); ?>
                        <li class="sliderItem-post">
                            <a class="link-post" href="<?php the_permalink(); ?>">
                                <p class="image-post">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                                </p>
                                <h2 class="title-post"><?php echo get_the_title(); ?></h2>
                            </a>
                            <div class="info-bottom">
                                <div class="category">
                                    <?php
                                    $country_lists = wp_get_post_terms($post->ID, 'category', array("fields" => "all"));
                                    foreach ($country_lists as $country_list) { ?>
                                        <a href="<?php echo get_category_link($country_list->term_id); ?>"># <?php echo $country_list->name; ?></a>
                                    <?php } ?>
                                </div>
                                <p class="date-time number"><?php echo get_the_date(); ?></p>
                            </div>
                        </li>
                    <?php endwhile;?>
                <?php endif;
                wp_reset_postdata(); ?>
            </ul>
        </div>
    </div>

    <div class="article-block">
        <div class="inner">
            <div class="new-article">
                <div class="new-article-list">
                    <ul class="article-list">
                        <?php
                        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                        $args = array(
                            'post_type'=> 'post',
                            'post_status' => 'publish',
                            'order'    => 'DESC',
                            'paged' => $paged,
                            'posts_per_page' => '6',
                        );
                        $result = new WP_Query( $args );
                        if ( $result-> have_posts() ) : ?>
                            <?php while ( $result->have_posts() ) : $result->the_post(); ?>
                                <li class="article-item">
                                    <a class="link-post" href="<?php the_permalink(); ?>">
                                        <p class="image-post">
                                            <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                                        </p>
                                        <h2 class="title-post"><?php echo get_the_title(); ?></h2>
                                    </a>
                                    <div class="info-bottom">
                                        <div class="category">
                                            <?php
                                            $country_lists = wp_get_post_terms($post->ID, 'category', array("fields" => "all"));
                                            foreach ($country_lists as $country_list) { ?>
                                                <a href="<?php echo get_category_link($country_list->term_id); ?>"># <?php echo $country_list->name; ?></a>
                                            <?php } ?>
                                        </div>
                                        <p class="date-time number"><?php echo get_the_date(); ?></p>
                                    </div>
                                </li>
                            <?php endwhile;?>
                        <?php endif;
                        wp_reset_postdata(); ?>
                    </ul>
                    <div class="actions-toolbar">
                        <a class="action-links" href="/list-articles">新着記事一覧へ</a>
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>

    <div class="feature-article">
        <h2 class="heading-block"><span>特集記事</span></h2>
        <div class="factory-column feature-article-col">
            <div class="inner">
                <ul class="feature-article-list">
                    <li class="factory-column-item title-item">
                        <div class="info-inner">
                            <h3 class="title">工場コラム</h3>
                            <p class="text">説明テキストが入ります。説明テキストが入ります。説明テキストが入ります。説明テキストが入ります。</p>
                            <span class="number-block">#1</span>
                        </div>
                    </li>
                    <?php
                    $args = array(
                        'post_type'=> 'post',
                        'post_status' => 'publish',
                        'order'    => 'DESC',
                        'posts_per_page' => '4',
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'factory-column',
                            ),
                        ),
                    );
                    $result = new WP_Query( $args );
                    if ( $result-> have_posts() ) : ?>
                        <?php while ( $result->have_posts() ) : $result->the_post(); ?>
                            <li class="factory-column-item">
                                <a class="link-post" href="<?php the_permalink(); ?>">
                                    <p class="image-post">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                                    </p>
                                    <h2 class="title-post"><?php echo get_the_title(); ?></h2>
                                </a>
                                <div class="info-bottom">
                                    <div class="category">
                                        <?php
                                        $country_lists = wp_get_post_terms($post->ID, 'category', array("fields" => "all"));
                                        foreach ($country_lists as $country_list) { ?>
                                            <a href="<?php echo get_category_link($country_list->term_id); ?>"># <?php echo $country_list->name; ?></a>
                                        <?php } ?>
                                    </div>
                                    <p class="date-time number"><?php echo get_the_date(); ?></p>
                                </div>
                            </li>
                        <?php endwhile;?>
                    <?php endif;
                    wp_reset_postdata(); ?>
                </ul>
                <div class="actions-toolbar">
                    <a class="action-links" href="#">もっと見る</a>
                </div>
            </div>
        </div>

        <div class="part-time-job feature-article-col">
            <div class="inner">
                <ul class="feature-article-list part-time-list">
                    <li class="factory-column-item title-item">
                        <div class="info-inner">
                            <h3 class="title">パート・アルバイトコラム</h3>
                            <p class="text">説明テキストが入ります。説明テキストが入ります。説明テキストが入ります。説明テキストが入ります。</p>
                            <span class="number-block">#2</span>
                        </div>
                    </li>
                    <?php
                    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                    $args = array(
                        'post_type'=> 'post',
                        'post_status' => 'publish',
                        'order'    => 'DESC',
                        'paged' => $paged,
                        'posts_per_page' => '4',
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'part-time-job',
                            ),
                        ),
                    );
                    $result = new WP_Query( $args );
                    if ( $result-> have_posts() ) : ?>
                        <?php while ( $result->have_posts() ) : $result->the_post(); ?>
                            <li class="factory-column-item">
                                <a class="link-post" href="<?php the_permalink(); ?>">
                                    <p class="image-post">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                                    </p>
                                    <h2 class="title-post"><?php echo get_the_title(); ?></h2>
                                </a>
                                <div class="info-bottom">
                                    <div class="category">
                                        <?php
                                        $country_lists = wp_get_post_terms($post->ID, 'category', array("fields" => "all"));
                                        foreach ($country_lists as $country_list) { ?>
                                            <a href="<?php echo get_category_link($country_list->term_id); ?>"># <?php echo $country_list->name; ?></a>
                                        <?php } ?>
                                    </div>
                                    <p class="date-time number"><?php echo get_the_date(); ?></p>
                                </div>
                            </li>
                        <?php endwhile;?>
                    <?php endif;
                    wp_reset_postdata(); ?>
                </ul>
                <div class="actions-toolbar">
                    <a class="action-links" href="/category/feature/part-time-job/">もっと見る</a>
                </div>
            </div>
        </div>
    </div>




</div>

<script>

    $(document).ready(function() {
        $('#homepage .sliderList').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            speed: 600,
            arrows: false,
            // autoplay: true,
            // autoplaySpeed: 3000,
            dots: true,
            centerMode: true,
            variableWidth: true,
            centerPadding: '0',
            pauseOnHover: false,
        });

        function updateBackground(slideIndex) {
            var currentSlide = $('#homepage .sliderList').slick('getSlick').$slides.eq(slideIndex);
            var imgSrc = currentSlide.find('img').attr('src');
            $('.bg-slider-post').css('background-image', 'url(' + imgSrc + ')');
        }

        $('#homepage .sliderList').on('afterChange', function(event, slick, currentSlide){
            updateBackground(currentSlide);
        });

        var initialSlide = $('#homepage .sliderList').slick('slickCurrentSlide');
        updateBackground(initialSlide);
    });

</script>


<?php get_footer(); ?>
