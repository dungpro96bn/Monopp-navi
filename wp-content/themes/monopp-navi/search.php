<?php get_header();
global $post;
?>

<?php /* breadcrumb */
global $homeName;
$homeName = '';
if (function_exists('breadcrumb')) :
    breadcrumb();
endif;
?>
    <div class="search-box">
        <div class="related-article">
            <div class="inner">
                <h2 class="heading"><span class="ttl-en">Results for: </span>"<?php echo get_search_query(); ?>"</h2>
                <?php if (have_posts()): ?>
                    <ul class="related-article-list">
                        <?php while (have_posts()): the_post();
                            $category = get_the_category();
                            $cat_id = $category[0]->cat_ID;
                            $cat_name = $category[0]->cat_name;
                            $cat_slug = $category[0]->category_nicename;
                            $cat_link = get_category_link($cat_id); ?>
                            <li class="article-item">
                                <a class="link-post" href="<?php the_permalink(); ?>">
                                    <p class="image-post">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                                    </p>
                                    <h2 class="title-post"><?php echo get_the_title(); ?></h2>
                                </a>
                                <div class="info-bottom">
                                    <div class="category">
                                        <a href="<?php echo $cat_link; ?>"># <?php echo $cat_name; ?></a>
                                    </div>
                                    <p class="date-time number"><?php echo get_the_date(); ?></p>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php else : ?>
                    <p class="search-results-none">検索条件にヒットした記事がありませんでした。</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>