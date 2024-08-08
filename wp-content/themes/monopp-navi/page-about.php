<?php get_header(); ?>

<?php /* breadcrumb */
global $homeName;
$homeName = '';
if (function_exists('breadcrumb')) :
    breadcrumb();
endif;
?>

<div id="abput-page">
    <div class="inner">
        <h2 class="heading-entry"><?php the_title(); ?></h2>
        <div class="about-content">
            <div class="content-body">
                <?php the_content(); ?>
            </div>
            <div class="search-job search-job">
                <div class="content-box">
                    <div class="box-top">
                        <div class="logo-option">
                            <picture class="image">
                                <source srcset="/wp-content/uploads/53799.png 2x">
                                <img class="sizes" src="/wp-content/uploads/53799.png" alt="">
                            </picture>
                        </div>
                        <div class="info">
                            <h2 class="title">ものっぷで日本のモノづくりを一緒に支えませんか？</h2>
                            <p class="text">ものっぷではさまざまな製造に関する求人を紹介いたします。</p>
                        </div>
                    </div>
                    <div class="action">
                        <a target="_blank" href="#">ものっぷでお仕事を探す</a>
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
                    <a class="action-links" href="/category/factory-column/">もっと見る</a>
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
                    wp_reset_postdata(); ?>
                </ul>
                <div class="actions-toolbar">
                    <a class="action-links" href="/category/part-time-job/">もっと見る</a>
                </div>
            </div>
        </div>
    </div>

</div>


<?php get_footer(); ?>
