<?php get_header();

global $post;
global $wp_query;
$pageID = get_option('page_on_front');
?>

<?php /* breadcrumb */
global $homeName;
$homeName = '';
if (function_exists('breadcrumb')) :
    breadcrumb();
endif;
?>

<?php
$category = get_queried_object();
if ($category && isset($category->name)) {
    $category_name = $category->name;
    $category_slug = $category->slug;
}
?>

    <div id="article-page">

        <?php if($category_slug == "factory-column" || $category_slug == "part-time-job"): ?>
            <div class="feature-article feature-article-category">
                <?php if($category_slug == "factory-column"): ?>
                    <div class="factory-column feature-article-col">
                    <div class="inner">
                        <ul class="feature-article-list">
                            <li class="factory-column-item title-item">
                                <div class="info-inner">
                                    <h3 class="title"><?php the_field('title_factory_column', $pageID); ?></h3>
                                    <div class="text"><?php the_field('description_factory_column', $pageID); ?></div>
                                    <span class="number-block">#1</span>
                                </div>
                            </li>
                            <?php
                            $args = array(
                                'post_type'=> 'post',
                                'post_status' => 'publish',
                                'order'    => 'DESC',
                                'posts_per_page' => '1',
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
                                <?php while ( $result->have_posts() ) : $result->the_post(); $postID = get_the_ID(); ?>
                                    <li class="factory-column-item id-post" data-id="<?php echo get_the_ID(); ?>">
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
                <?php elseif ($category_slug == "part-time-job"): ?>
                    <div class="part-time-job feature-article-col">
                    <div class="inner">
                        <ul class="feature-article-list part-time-list">
                            <li class="factory-column-item title-item">
                                <div class="info-inner">
                                    <h3 class="title"><?php the_field('title_part_time_job', $pageID); ?></h3>
                                    <div class="text"><?php the_field('description_part_time_job', $pageID); ?></div>
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
                                'posts_per_page' => '1',
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
                                <?php while ( $result->have_posts() ) : $result->the_post(); $postID = get_the_ID(); ?>
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
                    </div>
                </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="inner">
            <div class="single-main">
                <div class="main-content">
                    <div id="archive" class="new-container">
                        <div class="related-article">
                            <?php
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $args = array(
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'order' => 'DESC',
                                'post__not_in'   => array($postID),
                                'paged' => $paged,
                                'posts_per_page' => 10,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'category',
                                        'field' => 'slug',
                                        'terms' => $category_slug,
                                    ),
                                ),
                            );
                            $result = new WP_Query($args);
                            if ($result->have_posts()) : ?>
                                <ul class="related-article-list article-col-2">
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
                                                </div>
                                                <p class="date-time number"><?php echo get_the_date(); ?></p>
                                            </div>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                            <?php if ($result->max_num_pages > 1): ?>
                                <?php echo wp_pagenavi(['query' => $result]); ?>
                            <?php endif; ?>
                        </div>
                    </div><!-- #new -->
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>