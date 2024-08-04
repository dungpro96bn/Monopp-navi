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

global $wpdb;

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

    // Tạo các điều kiện tìm kiếm
    $conditions = [];
    foreach ($search_terms as $term) {
        $conditions[] = $wpdb->prepare("post_title LIKE %s", '%' . $wpdb->esc_like($term) . '%');
        $conditions[] = $wpdb->prepare("post_content LIKE %s", '%' . $wpdb->esc_like($term) . '%');
    }

    // Kết hợp các điều kiện
    $query_string = implode(' OR ', $conditions);

    // Thực hiện truy vấn để lấy số lượng bài viết
    $total_results = $wpdb->get_var("
        SELECT COUNT(ID)
        FROM $wpdb->posts
        WHERE ($query_string)
        AND post_status = 'publish'
        AND post_type = 'post'
    ");

    // Thực hiện truy vấn để lấy các bài viết (giới hạn 10 bài)
    $results = $wpdb->get_results("
        SELECT ID, post_title
        FROM $wpdb->posts
        WHERE ($query_string)
        AND post_status = 'publish'
        AND post_type = 'post'
        ORDER BY post_date DESC
        LIMIT 1000
    ");
    ?>
    <div class="search-box">
        <div class="related-article">
            <div class="inner">
                <h2 class="heading"><span class="ttl-en">Results for: </span>"<?php echo esc_html($search_query); ?>"
                </h2>
                <?php if (!empty($results)): ?>
                    <ul class="related-article-list">
                        <?php foreach ($results as $post): ?>
                            <?php
                            $post = get_post($post->ID);
                            setup_postdata($post);
                            ?>
                            <li class="article-item">
                                <a class="link-post" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                    <p class="image-post">
                                        <?php if (has_post_thumbnail($post->ID)): ?>
                                            <img src="<?php echo esc_url(get_the_post_thumbnail_url($post->ID)); ?>"
                                                 alt="<?php echo esc_attr(get_the_title($post->ID)); ?>">
                                        <?php endif; ?>
                                    </p>
                                    <h2 class="title-post"><?php echo esc_html(get_the_title($post->ID)); ?></h2>
                                </a>
                                <div class="info-bottom">
                                    <div class="category">
                                        <?php
                                        $categories = get_the_category($post->ID);
                                        foreach ($categories as $category) { ?>
                                            <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"># <?php echo esc_html($category->name); ?></a>
                                        <?php } ?>
                                    </div>
                                    <p class="date-time number"><?php echo esc_html(get_the_date('', $post->ID)); ?></p>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="search-results-none en">Your search returned no results. Please contact us with your
                        question by phone at 888-8888-8888 or submit your question by email to demo@monoppu.com</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php wp_reset_postdata(); ?>

<?php endif; ?>


<?php get_footer(); ?>