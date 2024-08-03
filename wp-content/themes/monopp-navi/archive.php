<?php get_header(); ?>

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
}
?>

    <div id="archive" class="new-container">
        <div class="related-article">
            <div class="inner">
                <h2 class="heading"><?php echo $category_name; ?></h2>
                <?php if (have_posts()) : ?>
                <ul class="related-article-list">
                    <?php
                    while (have_posts()) : the_post();
                        ?>
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
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>

    </div><!-- #new -->

<?php get_footer(); ?>