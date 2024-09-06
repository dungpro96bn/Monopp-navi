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
            <h2 class="heading-entry"><?php the_title(); ?></h2>
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
                            <li class="page-item">
                                <a class="link-page" href="/new/">
                                    <span class="title-page">新着記事</span>
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="link-page" href="/popular/">
                                    <span class="title-page">人気記事</span>
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </li>
                            <li class="page-item">
                                <div class="link-page toggle">
                                    <span class="title-page">特集記事</span>
                                    <i class="fa-light fa-plus"></i>
                                </div>
                                <div class="sub-menu">
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
                                    <ul class="menu-list">
                                        <?php foreach($areas as $area) :?>
                                            <?php $terms = $area->slug;
                                            $termID = $area->term_id;
                                            $num = $number++;
                                            ?>
                                            <li class="menu-item"><a href="/category/<?php echo $area->slug; ?>"><span>#<?php echo $num;?></span><?php echo $area->name; ?><i class="fa-solid fa-arrow-right-long"></i></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </li>
                            <li class="page-item">
                                <div class="link-page toggle">
                                    <span class="title-page">おすすめタグ</span>
                                    <i class="fa-light fa-minus"></i>
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
                            </li>
<!--                            --><?php
//                            $args = array(
//                                'post_type'      => 'page',
//                                'post_status' => 'publish',
//                                'post__not_in'   => array($front_page_id),
//                                'posts_per_page' => -1,
//                                'orderby'       => 'title',
//                                'order'         => 'ASC'
//                            );
//
//                            $result = new WP_Query($args);
//
//                            if ($result->have_posts()) : ?>
<!--                                --><?php //while ($result->have_posts()) : $result->the_post(); ?>
<!--                                    <li class="page-item">-->
<!--                                        <a class="link-page" href="--><?php //the_permalink(); ?><!--">-->
<!--                                            <span class="title-page">--><?php //echo get_the_title(); ?><!--</span>-->
<!--                                            <i class="fa-solid fa-arrow-right-long"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                --><?php //endwhile; ?>
<!--                            --><?php //endif;
//                            wp_reset_postdata();
//                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>