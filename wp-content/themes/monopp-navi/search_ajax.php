<?php get_header(); ?>

<?php /* breadcrumb */
global $homeName;
$homeName = '';
if (function_exists('breadcrumb')) :
    breadcrumb();
endif;
?>

<?php
// Lấy giá trị tìm kiếm từ URL và bảo vệ
$search_query = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';

$sort_by = isset($_GET['sorter']) ? sanitize_text_field($_GET['sorter']) : '';

?>

<div class="search-box">
    <div class="related-article">
        <h2 class="heading"><span class="ttl-en">Results for: </span>"<?php echo esc_html($search_query); ?>"</h2>
        <div class="search-results-block">
            <div class="inner">
                <div class="search-wrap">
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                        <label class="control">
                            <input type="search" id="search-box" placeholder="<?php echo esc_attr_x('Search the site', 'placeholder'); ?>" value="<?php echo esc_attr($search_query); ?>" name="s"/>
                            <button type="submit">
                                <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="6.87435" cy="7.33772" r="5.37435" stroke="#A0A0A0" stroke-width="3"/>
                                    <rect x="11.0796" y="10.0928" width="7.77743" height="2.74974" transform="rotate(45 11.0796 10.0928)" fill="#A0A0A0"/>
                                </svg>
                            </button>
                            <div class="amsearch-loader-block"></div>
                        </label>
                    </form>
                    <div class="sort-by">
                        <select name="sorter" id="sorter">
                            <option value="" <?php selected($sort_by, ''); ?>>Order By</option>
                            <option value="views" <?php selected($sort_by, 'views'); ?>>Views</option>
                            <option value="ASC" <?php selected($sort_by, 'ASC'); ?>>Oldest to Newest</option>
                            <option value="DESC" <?php selected($sort_by, 'DESC'); ?>>Newest to Oldest</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="inner">
            <?php if (empty($search_query)): ?>
                <p class="search-results-none en">Please enter a search keyword.</p>
            <?php else: ?>
                <div id="search-results">
                    <?php
                    // Chia giá trị tìm kiếm thành các từ khóa
                    $search_terms = explode(' ', $search_query);
                    $search_terms = array_map('sanitize_text_field', $search_terms);

                    // Tạo các điều kiện tìm kiếm cho tiêu đề và nội dung
                    $search_conditions = [];
                    foreach ($search_terms as $term) {
                        $search_conditions[] = "post_title LIKE '%" . esc_sql($term) . "%'";
                        $search_conditions[] = "post_content LIKE '%" . esc_sql($term) . "%'";
                    }
                    // Kết hợp các điều kiện với OR
                    $search_query_string = implode(' OR ', $search_conditions);

                    // Thực hiện truy vấn SQL tùy chỉnh để lấy ID bài viết
                    global $wpdb;
                    $sql = "SELECT ID FROM $wpdb->posts WHERE ($search_query_string) AND post_status = 'publish' AND post_type = 'post'";
                    $post_ids = $wpdb->get_col($sql);

                    if ($post_ids) :?>

                        <?php
                        $orderby = 'date';
                        $order = 'DESC';
                        $meta_key = '';

                        if ($sort_by === 'views') {
                            $orderby = 'meta_value_num';
                            $meta_key = 'post_view';
                        } elseif ($sort_by === 'ASC') {
                            $order = 'ASC';
                        } elseif ($sort_by === 'DESC') {
                            $order = 'DESC';
                        } elseif ($sort_by === ""){
                            $order = 'DESC';
                        }

                        $args = [
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'post__in' => $post_ids,
                            'orderby' => $orderby,
                            'order' => $order,
                            'meta_key' => $meta_key,
                            'posts_per_page' => -1,
                        ];

//                        $args = [
//                            'post_type' => 'post',
//                            'post_status' => 'publish',
//                            'post__in' => $post_ids,
//                            'orderby' => 'date',
//                            'order' => 'DESC',
//                            'posts_per_page' => -1,
//                        ];

                        $query = new WP_Query($args);
                        if ($query->have_posts()) :
                            ?>
                            <ul class="related-article-list">
                                <?php while ($query->have_posts()): $query->the_post(); ?>
                                    <li class="article-item">
                                        <a class="link-post" href="<?php the_permalink(); ?>">
                                            <p class="image-post">
                                                <?php if (has_post_thumbnail()): ?>
                                                    <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                                                <?php endif; ?>
                                            </p>
                                            <h2 class="title-post"><?php the_title(); ?></h2>
                                        </a>
                                        <div class="info-bottom">
                                            <div class="category">
                                                <?php
                                                $country_lists = wp_get_post_terms($post->ID, 'post-tags', array("fields" => "all"));
                                                foreach ($country_lists as $country_list) { ?>
                                                    <a href="<?php echo get_category_link($country_list->term_id); ?>"># <?php echo $country_list->name; ?></a>
                                                <?php } ?>
                                            </div>
                                            <p class="date-time number"><?php echo esc_html(get_the_date()); ?></p>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php
                        else:
                            echo '<p class="search-results-none en">Your search returned no results. Please contact us with your question by phone at 888-8888-8888 or submit your question by email to demo@monoppu.com</p>';
                        endif;
                        wp_reset_postdata();
                    else:
                        echo '<p class="search-results-none en">Your search returned no results. Please contact us with your question by phone at 888-8888-8888 or submit your question by email to demo@monoppu.com</p>';
                    endif;
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>


