<div id="sidebar">
    <div class="sidebar-content">
        <div class="popular-articles sidebar-box">
            <h2 class="heading-block">人気記事</h2>
            <ul class="popular-articles-list">
                <?php
                $args = array(
                    'post_type'      => 'post',
                    'post_status'    => 'publish',
                    'order'         => 'DESC',
                    'posts_per_page' => 1,
                    'meta_query'     => array(
                        array(
                            'key'     => 'select_popular_posts',
                            'value'   => 'Yes',
                            'compare' => 'LIKE'
                        )
                    ),
                );
                $result = new WP_Query( $args );
                if ( $result-> have_posts() ) : ?>
                    <?php while ( $result->have_posts() ) : $result->the_post(); ?>
                        <li class="popular-articles-item">
                            <a class="link-post" href="<?php the_permalink(); ?>">
                                <div class="image-post">
                                    <p class="img-inner">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                                    </p>
                                </div>
                                <div class="info">
                                    <h2 class="title-post"><?php echo get_the_title(); ?></h2>
                                    <p class="date-time number"><?php echo get_the_date(); ?></p>
                                </div>
                            </a>
                            <span class="number-post en">01</span>
                        </li>
                    <?php endwhile;?>
                <?php endif;
                $idSelect = 0;
                if ($result->have_posts()) {
                    $result->the_post();
                    $idSelect = get_the_ID();
                }
                wp_reset_postdata(); ?>

                <?php
                $args = array(
                    'post_type'      => 'post',
                    'post_status'    => 'publish',
                    'post__not_in'   => array($idSelect),
                    'meta_key'       => 'post_view',
                    'orderby'       => 'meta_value_num',
                    'order'         => 'DESC',
                    'posts_per_page' => 4,
                );
                $result = new WP_Query( $args );
                $num = 2;
                if ( $result-> have_posts() ) : ?>
                    <?php while ( $result->have_posts() ) : $result->the_post(); ?>
                        <?php $numberPost = $num++; ?>
                        <li class="popular-articles-item">
                            <a class="link-post" href="<?php the_permalink(); ?>">
                                <div class="image-post">
                                    <p class="img-inner">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                                    </p>
                                </div>
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
                <a class="action-links" href="/popular/">人気記事一覧へ</a>
            </div>
        </div>
        <div class="recommended-tags sidebar-box">
            <h2 class="heading-block">おすすのタグ</h2>
            <div class="list-tags-post">
                <?php
                $check_all = get_option('checked_tags_check_all', '');
                $checked_tags = get_option('checked_tags', array());

                if ($check_all === 'checkAll'):?>
                    <?php
                    $tags = get_terms(array(
                        'taxonomy' => 'post-tags',
                        'hide_empty' => false,
                    )); ?>
                    <?php foreach ($tags as $tag): ?>
                        <a class="item-tag-post <?php echo $tag->slug; ?>" href="<?php echo get_category_link($tag->term_id); ?>"># <?php echo $tag->name; ?></a>
                    <?php endforeach; ?>
                <?php else: ?>
                    <?php
                    $args = array(
                        'taxonomy' => 'post-tags',
                        'hide_empty' => false,
                        'parent' => 0,
                        'orderby' => 'name',
                        'order' => 'ASC',
                        'meta_query' => array(
                            array(
                                'key' => 'display_tags_in_sidebar',
                                'value' => 'Show',
                                'compare' => 'LIKE'
                            )
                        )
                    );
                    $country_lists = get_categories($args);
                    foreach ($country_lists as $country_list):?>
                        <a class="item-tag-post <?php echo $country_list->slug; ?>" href="<?php echo get_category_link($country_list->term_id); ?>"># <?php echo $country_list->name; ?></a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

