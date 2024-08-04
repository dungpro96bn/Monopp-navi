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

//global $wpdb;

// Lấy giá trị tìm kiếm từ URL và bảo vệ
$search_query = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';

// Nếu không có từ khóa tìm kiếm, hiển thị thông báo
if (empty($search_query)):?>
    <div class="search-box">
        <div class="related-article">
            <div class="inner">
                <p class="search-results-none en">Please enter a search keyword.</p>
            </div>
        </div>
    </div>
<?php else: ?>
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
    $sql = "
        SELECT ID
        FROM $wpdb->posts
        WHERE ($search_query_string)
        AND post_status = 'publish'
        AND post_type = 'post'
    ";

    $post_ids = $wpdb->get_col($sql);

    // Nếu có kết quả từ truy vấn SQL
    if ($post_ids) {
        // Tạo đối tượng WP_Query với các tham số tìm kiếm
        $args = [
            'post_type' => 'post',
            'post_status' => 'publish',
            'post__in' => $post_ids, // Lọc bài viết theo ID
            'orderby' => 'date', // Sắp xếp theo ngày đăng
            'order' => 'DESC', // Thứ tự giảm dần
            'posts_per_page' => 10, // Giới hạn số bài viết hiển thị
        ];

        $query = new WP_Query($args);
    } else {
        // Nếu không có bài viết nào phù hợp
        $query = new WP_Query([
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 10, // Giới hạn số bài viết hiển thị
            'orderby' => 'date', // Sắp xếp theo ngày đăng
            'order' => 'DESC', // Thứ tự giảm dần
            'post__in' => [] // Không có bài viết nào
        ]);
    }
    ?>
    <div class="search-box">
        <div class="related-article">
            <div class="inner">
                <h2 class="heading"><span class="ttl-en">Results for: </span>"<?php echo esc_html($search_query); ?>"</h2>
                <?php if ($query->have_posts()): ?>
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
                <?php else: ?>
                    <p class="search-results-none en">Your search returned no results. Please contact us with your question by phone at 888-8888-8888 or submit your question by email to demo@monoppu.com</p>
                <?php endif; ?>
                <?php wp_reset_postdata(); // Đặt lại dữ liệu bài viết sau khi truy vấn ?>
            </div>
        </div>
    </div>

<?php endif; ?>


<?php get_footer(); ?>