<?php get_header(); ?>

<?php
$post_id = get_the_ID();
$categories = get_the_category($post_id);
if (!empty($categories)) {
    $first_category = $categories[0];
    $category_slug = $first_category->slug;
}
?>

    <div class="single-page">

        <?php /* breadcrumb */
        global $homeName;
        $homeName = '';
        if (function_exists('breadcrumb')) :
            breadcrumb();
        endif;
        ?>

        <div class="bg-post" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>

        <div class="inner">
            <div class="header-entry">
                <div class="header-info">
                    <h1 class="heading"><?php the_title(); ?></h1>
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
                </div>
                <div class="header-image">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title();?>">
                </div>
            </div>
            <div class="single-main">
                <div class="main-content">
                    <div class="single-box">
                        <div class="single-body">
                            <div class="share-title">
                                <div class="icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M22.96 9.15L13.11 2V5.52C5.39 6.59 2 11.75 2 21.2H3.03C3.35 19.43 3.76 18.54 4.58 17.07C6.36 13.89 9.82 12.95 13.11 12.58V16.3L22.96 9.15Z" fill="#B2B2B2"/>
                                    </svg>
                                    <span>記事をシェアする</span>
                                </div>
                            </div>
                            <?php the_content(); ?>
                        </div>
                        <?php
                        $dataValue = get_field('link_options');
                        if( $dataValue == 'https://monoppu.com' ):?>
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
                                    <a target="_blank" href="<?php echo $dataValue; ?>">ものっぷでお仕事を探す</a>
                                </div>
                            </div>
                        </div>
                        <?php elseif ($dataValue == "https://monoppu.com/register"):?>
                        <div class="search-job register">
                            <div class="content-box">
                                <div class="box-top">
                                    <div class="logo-option">
                                        <picture class="image">
                                            <source srcset="/wp-content/uploads/53799.png 2x">
                                            <img class="sizes" src="/wp-content/uploads/53799.png" alt="">
                                        </picture>
                                    </div>
                                    <div class="info">
                                        <h2 class="title">ものっぷでは製造に興味があるメンバーを募集中！</h2>
                                        <p class="text">製造系のお仕事にご興味がある⽅は、まずはカンタン応募/登録へ！<br/>⼀⼈ひとりに担当がついてご希望などをヒアリングして、あなたに合ったお仕事をご紹介します。</p>
                                    </div>
                                </div>
                                <div class="action">
                                    <a target="_blank" href="<?php echo $dataValue; ?>">カンタン応募/登録する</a>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>

        <div class="related-article">
            <div class="inner">
                <h2 class="heading">関連記事</h2>
                <ul class="related-article-list">
                    <?php
                    $args = array(
                        'post_type'=> 'post',
                        'post_status' => 'publish',
                        'post__not_in'   => array($post_id),
                        'order'    => 'DESC',
                        'posts_per_page' => '6',
                        'orderby'        => 'rand',
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => $category_slug,
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
            </div>
        </div>

    </div>

<?php get_footer(); ?>