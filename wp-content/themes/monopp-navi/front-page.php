<?php get_header(); ?>

<div id="homepage" class="">

    <div class="silder-homepage">
        <div class="bg-slider-post"></div>
        <div class="slider">
            <ul class="sliderList">
                <?php
                $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type'=> 'post',
                    'post_status' => 'publish',
                    'order'    => 'DESC',
                    'paged' => $paged,
                    'posts_per_page' => '5',
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
                        <a class="action-links" href="#">新着記事一覧へ</a>
                    </div>
                </div>
                <div class="popular-articles">
                    <h2 class="heading-block">人気記事</h2>
                    <ul class="popular-articles-list">
                        <?php
                        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                        $args = array(
                            'post_type'      => 'post',
                            'post_status'    => 'publish',
                            'meta_key'       => 'post_views_count',
                            'orderby'       => 'meta_value_num',
                            'order'         => 'DESC',
                            'paged'         => $paged,
                            'posts_per_page' => 5,
                        );
                        $result = new WP_Query( $args );
                        $num = 1;
                        if ( $result-> have_posts() ) : ?>
                            <?php while ( $result->have_posts() ) : $result->the_post(); ?>
                            <?php $numberPost = $num++; ?>
                                <li class="popular-articles-item">
                                    <a class="link-post" href="<?php the_permalink(); ?>">
                                        <p class="image-post">
                                            <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                                        </p>
                                        <div class="info">
                                            <h2 class="title-post"><?php echo get_the_title(); ?></h2>
                                            <p class="date-time number"><?php echo get_the_date(); ?></p>
                                        </div>
                                    </a>
                                    <span class="number-post en"><?php echo "0".$numberPost; ?></span>
                                </li>
                            <?php endwhile;?>
                        <?php endif;
                        wp_reset_postdata(); ?>
                    </ul>
                    <div class="actions-toolbar">
                        <a class="action-links" href="#">人気記事一覧へ</a>
                    </div>
                </div>
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
    </div>




</div>


<?php get_footer(); ?>
