<?php get_header(); ?>

<?php /* breadcrumb */
global $homeName;
$homeName = '';
if (function_exists('breadcrumb')) :
    breadcrumb();
endif;
?>

<?php $front_page_id = get_option('page_on_front');?>

<div id="sitemap">
    <div class="inner">
        <div class="sitemap-inner">
            <h2 class="heading"><?php the_title(); ?></h2>
            <div class="sitemap-content">
                <div class="box-content">
                    <div class="pages">
                        <ul class="page-list">
                            <li class="page-item">
                                <a class="link-page" href="<?php the_permalink($front_page_id); ?>">
                                    <span class="title-page"><?php echo get_the_title($front_page_id); ?></span>
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </li>
                            <?php
                            $args = array(
                                'post_type'      => 'page',
                                'post_status' => 'publish',
                                'post__not_in'   => array($front_page_id),
                                'posts_per_page' => -1,
                                'orderby'       => 'title',
                                'order'         => 'ASC'
                            );

                            $result = new WP_Query($args);

                            if ($result->have_posts()) : ?>
                                <?php while ($result->have_posts()) : $result->the_post(); ?>
                                    <li class="page-item">
                                        <a class="link-page" href="<?php the_permalink(); ?>">
                                            <span class="title-page"><?php echo get_the_title(); ?></span>
                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            <?php endif;
                            wp_reset_postdata();
                            ?>
                        </ul>
                    </div>
                    <div class="tags-post-list">
                        <ul class="tags-list">
                            <?php
                            $tags = get_terms(array(
                                'taxonomy' => 'post-tags',
                                'hide_empty' => false,
                            )); ?>
                            <?php foreach ($tags as $tag): ?>
                                <li class="tag-item">
                                    <a class="item-tag-post <?php echo $tag->slug; ?>" href="<?php echo get_category_link($tag->term_id); ?>"># <?php echo $tag->name; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>