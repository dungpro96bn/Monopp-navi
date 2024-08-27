<?php get_header(); ?>

<?php /* breadcrumb */
global $homeName;
$homeName = '';
if (function_exists('breadcrumb')) :
    breadcrumb();
endif;
?>

<div id="article-page">
    <div class="inner">
        <div class="single-main">
            <div class="main-content">
                <div class="related-article factory-column">
                    <h2 class="heading">特集記事</h2>
                    <h3 class="title">工場コラム</h3>
                    <ul class="related-article-list article-col-2">
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
                        $result = new WP_Query($args);
                        if ($result->have_posts()) : ?>
                            <?php while ($result->have_posts()) : $result->the_post(); ?>
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
                                            <!--                                --><?php //echo "(" . get_field('post_view') . ")"; ?>
                                        </div>
                                        <p class="date-time number"><?php echo get_the_date(); ?></p>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        <?php endif;
                        wp_reset_postdata(); ?>
                    </ul>
<!--                    --><?php //if ($result->max_num_pages > 1): ?>
<!--                            <div class="navigation-more">-->
<!--                                <a class="btn-load-navigation ttl-en" data-after-load="1" data-max="--><?php //echo $result->max_num_pages; ?><!--" href="#">Load More</a>-->
<!--                            </div>-->
<!--                    --><?php //endif; ?>
                    <div class="actions-toolbar action-feature">
                        <a class="action-links" href="/category/factory-column/">もっと見る</a>
                    </div>
                </div>

                <div class="related-article part-time-job">
                    <h3 class="title">パート・アルバイトコラム</h3>
                    <ul class="related-article-list article-col-2">
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
                        $result = new WP_Query($args);
                        if ($result->have_posts()) : ?>
                            <?php while ($result->have_posts()) : $result->the_post(); ?>
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
                                            <!--                                --><?php //echo "(" . get_field('post_view') . ")"; ?>
                                        </div>
                                        <p class="date-time number"><?php echo get_the_date(); ?></p>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        <?php endif;
                        wp_reset_postdata(); ?>
                    </ul>
                    <div class="actions-toolbar action-feature">
                        <a class="action-links" href="/category/part-time-job/">もっと見る</a>
                    </div>
<!--                    --><?php //if ($result->max_num_pages > 1): ?>
<!--                        <div class="navigation-more">-->
<!--                            <a class="btn-load-navigation ttl-en" data-after-load="1" data-max="--><?php //echo $result->max_num_pages; ?><!--" href="#">Load More</a>-->
<!--                        </div>-->
<!--                    --><?php //endif; ?>
                </div>

            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>
