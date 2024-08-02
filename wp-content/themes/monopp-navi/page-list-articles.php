<?php get_header(); ?>

<div class="">

</div>
<div class="related-article">
    <div class="inner">
        <h2 class="heading"><?php the_title(); ?></h2>
        <ul class="related-article-list">
            <?php
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
            $args = array(
                'post_type'=> 'post',
                'post_status' => 'publish',
                'order'    => 'DESC',
                'paged' => $paged,
                'posts_per_page' => 9,
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
        <?php if ($result->max_num_pages > 1):?>
            <div class="navigation-more">
                <a class="btn-load-navigation ttl-en" data-after-load="1" data-max="<?php echo $result->max_num_pages; ?>" href="#">Load More</a>
            </div>
        <?php endif; ?>
    </div>
</div>


<?php get_footer(); ?>
