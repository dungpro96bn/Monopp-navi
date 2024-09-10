<?php get_header(); ?>

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
                            'value'   => '選択',
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
                                    $country_lists = wp_get_post_terms($post->ID, 'post-tags', array("fields" => "all"));
                                    foreach($country_lists as $country_list) { ?>
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
                                    $country_lists = wp_get_post_terms($post->ID, 'post-tags', array("fields" => "all"));
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
                    <h2 class="heading-block"><span>新着記事</span></h2>
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
                                            $country_lists = wp_get_post_terms($post->ID, 'post-tags', array("fields" => "all"));
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
                        <a class="action-links" href="/new/">新着記事一覧へ</a>
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>

    <div class="feature-article">
        <h2 class="heading-block"><span>特集記事</span></h2>

        <div class="blogs-list">
            <?php
            $args = array(
                'taxonomy'   => 'category',
                'hide_empty' => true,
                'orderby'    => 'ID',
                'order'      => 'ASC',
                'parent'     => 0,
                'exclude'    => array(1)
            );
            $areas = get_categories($args);
            $number = 1;
            ?>

            <?php foreach($areas as $area) :?>
                <?php $terms = $area->slug;
                $termID = $area->term_id;
                $num = $number++;
                ?>

                <div class="<?php echo $terms; ?> feature-article-col">
                    <div class="inner">
                        <ul class="feature-article-list">
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
                                        'terms'    => $terms,
                                    ),
                                ),
                            );
                            $result = new WP_Query( $args );
                            if ( $result-> have_posts() ) : ?>
                                <li class="factory-column-item title-item">
                                    <div class="info-inner">
                                        <?php $titleCategory = get_term_meta($termID, 'sub_title_category', true);
                                        if($titleCategory):?>
                                            <h3 class="title"><?php echo nl2br(htmlspecialchars($titleCategory)); ?></h3>
                                        <?php else: ?>
                                            <h3 class="title"><?php echo $area->name; ?></h3>
                                        <?php endif; ?>
                                        <div class="text"><?php echo $area->description; ?></div>
                                        <span class="number-block">#<?php echo $num; ?></span>
                                    </div>
                                </li>
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
                                                $country_lists = wp_get_post_terms($post->ID, 'post-tags', array("fields" => "all"));
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
                            <a class="action-links" href="/category/<?php echo $terms; ?>">もっと見る</a>
                        </div>
                    </div>
                    <?php $titleEN = get_term_meta($termID,'title_en', true);
                    if($titleEN): ?>
                        <span class="title-banner"><?php echo $titleEN; ?></span>
                    <?php endif; ?>
                </div>

            <?php endforeach; ?>

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
            autoplay: true,
            autoplaySpeed: 3000,
            dots: true,
            centerMode: true,
            variableWidth: true,
            centerPadding: '0',
            pauseOnHover: false,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: false,
                        variableWidth: false,
                        centerPadding: false,
                        adaptiveHeight: true
                    }
                }
            ]
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
