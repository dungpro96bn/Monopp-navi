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

<?php
// Lấy giá trị tìm kiếm từ URL và bảo vệ
$search_query = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';

// Lấy giá trị sắp xếp từ URL và bảo vệ
$sort_by = isset($_GET['sorter']) ? sanitize_text_field($_GET['sorter']) : 'DESC';
?>

<div id="article-page" class="search-box">
    <div class="inner">

        <?php if ($search_query): ?>
            <h2 class="heading"><span class="txt-search">“<?php echo esc_html($search_query); ?>”</span>の検索結果</h2>
        <?php else: ?>
            <h2 class="heading">検索結果一覧</h2>
        <?php endif; ?>

        <div class="single-main">
            <div class="main-content">
                <div class="related-article">

                    <?php

                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $posts_per_page = 10; // Number of posts per page

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

                    // Xác định giá trị sắp xếp
                    $orderby = 'date'; // Mặc định sắp xếp theo ngày
                    $order = 'DESC'; // Mặc định là mới nhất
                    $meta_key = '';

                    if ($sort_by === 'views') {
                        $orderby = 'meta_value_num';
                        $meta_key = 'post_view'; // Meta key cho số lượt xem
                    } elseif ($sort_by === 'ASC') {
                        $order = 'ASC';
                    } elseif ($sort_by === 'DESC') {
                        $order = 'DESC';
                    }

                    $args = [
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'post__in' => $post_ids,
                        'orderby' => $orderby,
                        'order' => $order,
                        'meta_key' => $meta_key,
                        'posts_per_page' => $posts_per_page,
                        'paged' => $paged,
                    ];

                    if ($post_ids) :?>

                        <?php
                        $query = new WP_Query($args);

                        $all_num = $query->found_posts;

                        $current_page = get_query_var('paged') ? get_query_var('paged') : 1;

                        $current_first = ($current_page - 1) * $posts_per_page + 1;
                        $current_last = min($current_first + $posts_per_page - 1, $all_num);
                        ?>

                        <div class="search-results-block">
                            <div class="search-wrap">
                                <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                                    <label class="control">
                                        <input type="search" id="search-box" placeholder="<?php echo esc_attr_x('フリーワード検索', 'placeholder'); ?>" value="<?php echo get_search_query(); ?>" name="s"/>
                                        <button>
                                            <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="6.87435" cy="7.33772" r="5.37435" stroke="#A0A0A0" stroke-width="3"/>
                                                <rect x="11.0796" y="10.0928" width="7.77743" height="2.74974" transform="rotate(45 11.0796 10.0928)" fill="#A0A0A0"/>
                                            </svg>
                                        </button>
                                        <div class="amsearch-loader-block"></div>
                                    </label>
                                </form>
                                <div class="toolbar-title-wrapper">
                                    <div class="toolbar-amount en" id="toolbar-amount">
                                        <!--<span class="toolbar-number number-first"><?php echo $current_first; ?></span> - -->
                                        <!--<span class="toolbar-number number-last"><?php echo $current_last; ?></span> of -->
                                        <p class="toolbar-number number-all">全<span class="all-number number"><?php echo $all_num; ?></span>件</p>
                                    </div>
                                </div>
                                <div class="sort-by">
                                    <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                        <input type="hidden" name="s" value="<?php echo esc_attr($search_query); ?>"/>
                                        <label class="label-sort en">Sort By</label>
                                        <select name="sorter" id="sorter" onchange="this.form.submit()">
                                            <option value="views" <?php selected($sort_by, 'views'); ?>>Most viewed</option>
                                            <option value="ASC" <?php selected($sort_by, 'ASC'); ?>>Oldest to Newest</option>
                                            <option value="DESC" <?php selected($sort_by, 'DESC'); ?>>Newest to Oldest</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <?php if ($query->have_posts()): ?>
                            <ul class="related-article-list article-col-2">
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
                            if ($query->max_num_pages > 1) {
                                wp_pagenavi(['query' => $query]);
                            }
                            ?>
                        <?php endif; ?>

                        <?php wp_reset_postdata(); ?>

                    <?php else: ?>

                        <div class="search-results-block">
                            <div class="search-wrap">
                                <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                                    <label class="control">
                                        <input type="search" id="search-box" placeholder="<?php echo esc_attr_x('フリーワード検索', 'placeholder'); ?>" value="<?php echo get_search_query(); ?>" name="s"/>
                                        <button>
                                            <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="6.87435" cy="7.33772" r="5.37435" stroke="#A0A0A0" stroke-width="3"/>
                                                <rect x="11.0796" y="10.0928" width="7.77743" height="2.74974" transform="rotate(45 11.0796 10.0928)" fill="#A0A0A0"/>
                                            </svg>
                                        </button>
                                        <div class="amsearch-loader-block"></div>
                                    </label>
                                </form>
                                <div class="toolbar-title-wrapper">
                                    <div class="toolbar-amount en" id="toolbar-amount">
                                        <p class="toolbar-number number-all">全<span class="all-number number">0</span>件</p>
                                    </div>
                                </div>
                                <div class="sort-by">
                                    <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                        <input type="hidden" name="s" value="<?php echo esc_attr($search_query); ?>"/>
                                        <label class="label-sort en">Sort By</label>
                                        <select name="sorter" id="sorter" onchange="this.form.submit()">
                                            <option value="views" <?php selected($sort_by, 'views'); ?>>Most viewed</option>
                                            <option value="ASC" <?php selected($sort_by, 'ASC'); ?>>Oldest to Newest</option>
                                            <option value="DESC" <?php selected($sort_by, 'DESC'); ?>>Newest to Oldest</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="search-results-message">
                            <p class="search-results-none">該当する記事はありません。</p>
                        </div>

                    <?php endif; ?>
                </div>

                <div class="popup-error">
                    <p class="ttl-en result-error">Please enter at least 2 characters to search.</p>
                    <span class="btn-close">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.59912 1.86279L15.5991 15.8628" stroke="#1C1C1C" stroke-width="2" stroke-linecap="round"/>
                            <path d="M15.5991 1.86279L1.59912 15.8628" stroke="#1C1C1C" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </span>
                </div>
                
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<script>
    $("#search-form #search-box").val("");
</script>

<?php get_footer(); ?>
