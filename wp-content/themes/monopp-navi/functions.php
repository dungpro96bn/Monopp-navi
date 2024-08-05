<?php
remove_action('wp_head', 'wp_generator');

//サイトナビゲーション用
register_nav_menus(array('gnav' => 'ナビゲーション'));

//アイキャッチ有効
add_theme_support('post-thumbnails');

//ショートコード
function uploadPath() { return content_url() . '/uploads/'; }
add_shortcode('uploadPath', 'uploadPath');

function homePath() { return home_url() . '/'; }
add_shortcode('homePath', 'homePath');

add_action( 'admin_enqueue_scripts', 'load_admin_style' );
function load_admin_style() {
    wp_enqueue_style( 'style-admin', get_template_directory_uri() . '/assets/css/style-admin.css' );
}

function my_enqueue($hook) {
    wp_enqueue_script('script_admin', get_template_directory_uri() . '/assets/js/admin.js');
}
add_action('admin_enqueue_scripts', 'my_enqueue');

function enqueue_styles() {
    wp_enqueue_style('style main.min', get_template_directory_uri() . '/assets/css/main.min.css', true, rand());
}
add_action('wp_enqueue_scripts', 'enqueue_styles');


//ウィジェット
function my_theme_widgets_init() {
  register_sidebar( array(
    'name' => 'ウィジェットエリア',
    'id' => 'widgets',
    'before_widget' => '<div class="widget-item">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>'
  ));
}
add_action('widgets_init', 'my_theme_widgets_init');

//パンくずリスト
function breadcrumb($divOption = array("id" => "breadcrumb", "class" => "breadcrumb")){
	global $post;
	global $homeName;
	if ($homeName == '') {
		$homeName = 'TOP';
	}
	$str ='';
	if(!is_home()&&!is_admin()){
		$tagAttribute = '';
		foreach($divOption as $attrName => $attrValue){
			$tagAttribute .= sprintf(' %s="%s"', $attrName, $attrValue);
		}
		$str.= '<div'. $tagAttribute .'>';
        $str.= '<div class="inner">';
		$str.= '<ol>';
		$str.= '<li><a href="'. home_url() .'/">' . $homeName . '</a></li>';

		if(is_category()) {
			$cat = get_queried_object();
			if($cat -> parent != 0){
				$ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
				foreach($ancestors as $ancestor){
					$str.='<li><a href="'. get_category_link($ancestor) .'">'. get_cat_name($ancestor) .'</a></li>';
				}
			}
			$str.='<li>'. $cat -> name . '</li>';
		} elseif(is_single()){
			$categories = get_the_category($post->ID);
			$cat = $categories[0];
			if($cat -> parent != 0){
				$ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
				foreach($ancestors as $ancestor){
					$str.='<li><a href="'. get_category_link($ancestor).'">'. get_cat_name($ancestor). '</a></li>';
				}
			}
			$str.='<li><a href="'. get_category_link($cat -> term_id). '">'. $cat-> cat_name . '</a></li>';
			$str.= '<li>'. $post -> post_title .'</li>';
		} elseif(is_page()){
			if($post -> post_parent != 0 ){
				$ancestors = array_reverse(get_post_ancestors( $post->ID ));
				foreach($ancestors as $ancestor){
					$str.='<li><a href="'. get_permalink($ancestor).'">'. get_the_title($ancestor) .'</a></li>';
				}
			}
			$str.= '<li>'. $post -> post_title .'</li>';
		} elseif(is_date()){
			if(get_query_var('day') != 0){
				$str.='<li><a href="'. get_year_link(get_query_var('year')). '">' . get_query_var('year'). '年</a></li>';
				$str.='<li><a href="'. get_month_link(get_query_var('year'), get_query_var('monthnum')). '">'. get_query_var('monthnum') .'月</a></li>';
				$str.='<li>'. get_query_var('day'). '日</li>';
			} elseif(get_query_var('monthnum') != 0){
				$str.='<li><a href="'. get_year_link(get_query_var('year')) .'">'. get_query_var('year') .'年</a></li>';
				$str.='<li>'. get_query_var('monthnum'). '月</li>';
			} else {
				$str.='<li>'. get_query_var('year') .'年</li>';
			}
		} elseif(is_search()) {
			$str.='<li>「'. get_search_query() .'」で検索した結果</li>';
		} elseif(is_author()){
			$str .='<li>投稿者 : '. get_the_author_meta('display_name', get_query_var('author')).'</li>';
		} elseif(is_tag()){
			$str.='<li>タグ : '. single_tag_title( '' , false ). '</li>';
		} elseif(is_attachment()){
			$str.= '<li>'. $post -> post_title .'</li>';
		} elseif(is_404()){
			$str.='<li>ページがみつかりません。</li>';
		} else{
			$str.='<li>'. wp_title('', true) .'</li>';
		}
		$str.='</ol>';
        $str.='</div>';
		$str.='</div>';
	}
	echo $str;
}


function add_ajax_script() {
    ?>
    <script type="text/javascript">
        var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>
    <?php
}
add_action('wp_head', 'add_ajax_script');



add_action('wp_ajax_quick_search', 'quick_search_callback');
add_action('wp_ajax_nopriv_quick_search', 'quick_search_callback'); // cho phép tìm kiếm cho người dùng chưa đăng nhập

function quick_search_callback() {
    global $wpdb;

    // Lấy giá trị tìm kiếm từ yêu cầu
    $query = isset($_GET['query']) ? sanitize_text_field($_GET['query']) : '';

    $response = [
        'count' => 0,
        'html'  => '',
        'link'  => '',
        'show_link' => true
    ];

    if (!empty($query)) {
        // Chia giá trị tìm kiếm thành các từ khóa
        $search_terms = explode(' ', $query);
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

        // Thực hiện truy vấn để lấy các bài viết (giới hạn 4 bài)
        $results = $wpdb->get_results("
            SELECT ID, post_title
            FROM $wpdb->posts
            WHERE ($query_string)
            AND post_status = 'publish'
            AND post_type = 'post'
            ORDER BY post_date DESC
            LIMIT 6
        ");

        // Lưu số lượng bài viết
        $response['count'] = $total_results;

        if ($results) {
            foreach ($results as $post) {
                // Lấy thông tin bài viết
                $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'thumbnail');
                $categories = get_the_category($post->ID);
                $cat_name = !empty($categories) ? $categories[0]->cat_name : 'Chưa có danh mục';
                $cat_link = !empty($categories) ? get_category_link($categories[0]->term_id) : '#';
                $post_date = get_the_date('', $post->ID);

                // Tạo HTML cho kết quả
                $response['html'] .= '<div class="search-result-item">';
                $response['html'] .= '<div class="post-link">';
                if ($thumbnail_url) {
                    $response['html'] .= '<div class="image-post"><a href="'. esc_url(get_permalink($post->ID)) .'">';
                    $response['html'] .= '<div class="img-inner">';
                    $response['html'] .= '<img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr($post->post_title) . '">';
                    $response['html'] .= '</div></a>';
                    $response['html'] .= '</div>';
                }
                $response['html'] .= '<div class="info">';
                $response['html'] .= '<h2 class="title-post"><a href="'. esc_url(get_permalink($post->ID)) .'"> ' . esc_html($post->post_title) . '</a></h2>';
                $response['html'] .= '<div class="info-bottom">';
                $response['html'] .= '<div class="category">';
                $response['html'] .= '<a href="' . esc_url($cat_link) . '"># ' . esc_html($cat_name) . '</a>';
                $response['html'] .= '</div>';
                $response['html'] .= '<p class="date-time number">' . esc_html($post_date) . '</p>';
                $response['html'] .= '</div>';
                $response['html'] .= '</div>';
                $response['html'] .= '</div>';
                $response['html'] .= '</div>';
            }

            // Thêm liên kết đến trang tìm kiếm với tổng số bài viết tìm được
            $search_url = esc_url(add_query_arg('s', $query, home_url('/')));
            $response['link'] = '<a class="ttl-en" href="' . $search_url . '">Views All (' . $total_results . ')</a>';

        } else {
            $response['html'] .= '<p class="ttl-en result-error">Your search returned no results. Please contact us with your question by phone at 888-8888-8888 or submit your question by email to demo@monoppu.com</p>';
            $response['show_link'] = false;
        }
    } else {
        $response['html'] .= '<p>Please enter search keywords.</p>';
        $response['show_link'] = false;
    }

    wp_send_json($response); // Kết thúc AJAX request
}


add_action('wp_ajax_check_selected_posts', 'check_selected_posts');

function check_selected_posts() {
    global $wpdb;

    // Lấy danh sách ID bài viết từ yêu cầu AJAX
    $current_post_id = isset($_POST['current_post_id']) ? intval($_POST['current_post_id']) : 0;

    if (!$current_post_id) {
        wp_send_json(array('error' => 'Invalid post ID'));
        exit;
    }

    // Truy vấn bài viết đã được chọn
    $selected_posts = $wpdb->get_results($wpdb->prepare("
        SELECT p.ID, p.post_title
        FROM {$wpdb->posts} p
        INNER JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id
        WHERE pm.meta_key = 'select_this_post_slider'
          AND pm.meta_value = 'a:1:{i:0;s:3:\"Yes\";}'
          AND p.ID != %d
          AND p.post_type = 'post'
    ", $current_post_id));

    // Trả về dữ liệu dưới dạng JSON
    wp_send_json($selected_posts);
}


add_action('wp_ajax_check_selected_posts_popular', 'check_selected_posts_popular');

function check_selected_posts_popular() {
    global $wpdb;

    // Lấy danh sách ID bài viết từ yêu cầu AJAX
    $current_post_id = isset($_POST['current_post_id']) ? intval($_POST['current_post_id']) : 0;

    if (!$current_post_id) {
        wp_send_json(array('error' => 'Invalid post ID'));
        exit;
    }

    // Truy vấn bài viết đã được chọn
    $selected_posts = $wpdb->get_results($wpdb->prepare("
        SELECT p.ID, p.post_title
        FROM {$wpdb->posts} p
        INNER JOIN {$wpdb->postmeta} pm ON p.ID = pm.post_id
        WHERE pm.meta_key = 'select_popular_posts'
          AND pm.meta_value = 'a:1:{i:0;s:3:\"Yes\";}'
          AND p.ID != %d
          AND p.post_type = 'post'
    ", $current_post_id));

    // Trả về dữ liệu dưới dạng JSON
    wp_send_json($selected_posts);
}



//ajax quick search
//======================
add_action('wp_ajax_sort_posts', 'handle_sort_posts');
add_action('wp_ajax_nopriv_sort_posts', 'handle_sort_posts');

function handle_sort_posts() {

    // Get the search query and sorter from the AJAX request
    $search_query = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';
    $sorter = isset($_GET['sorter']) ? sanitize_text_field($_GET['sorter']) : 'DESC';

    // Prepare the search terms and conditions
    $search_terms = explode(' ', $search_query);
    $search_terms = array_map('sanitize_text_field', $search_terms);
    $search_conditions = [];
    foreach ($search_terms as $term) {
        $search_conditions[] = "post_title LIKE '%" . esc_sql($term) . "%'";
        $search_conditions[] = "post_content LIKE '%" . esc_sql($term) . "%'";
    }
    $search_query_string = implode(' OR ', $search_conditions);

    // Query the posts
    global $wpdb;
    global $post;

    $sql = "SELECT ID FROM $wpdb->posts WHERE ($search_query_string) AND post_status = 'publish' AND post_type = 'post'";
    $post_ids = $wpdb->get_col($sql);

    if ($post_ids) {
        $orderby = 'date';
        $order = 'DESC';
        $meta_key = '';

        if ($sorter === 'views') {
            $orderby = 'meta_value_num';
            $meta_key = 'post_view';
        } elseif ($sorter === 'ASC') {
            $order = 'ASC';
        } elseif ($sorter === 'DESC') {
            $order = 'DESC';
        } elseif ($sorter === ""){
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

        $query = new WP_Query($args);
        if ($query->have_posts()) {
            ob_start(); // Start output buffering
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
            wp_reset_postdata();
            $response = ob_get_clean(); // Get the output and clean the buffer
            echo $response;
        } else {
            echo '<p class="search-results-none en">Your search returned no results. Please contact us with your question by phone at 888-8888-8888 or submit your question by email to demo@monoppu.com</p>';
        }
    } else {
        echo '<p class="search-results-none en">Your search returned no results. Please contact us with your question by phone at 888-8888-8888 or submit your question by email to demo@monoppu.com</p>';
    }

    wp_die();
}

function wpse_modify_video_archive_query( $query ) {
    // Chỉ áp dụng cho vòng lặp chính trên giao diện frontend và khi không phải là trang admin.
    if ( is_admin() || ! $query->is_main_query() ) {
        return;
    }

    // Kiểm tra nếu là trang tìm kiếm hoặc trang lưu trữ loại bài viết 'post'.
    if ( is_search() ) {
        $query->set( 'posts_per_page', 1 );
    }
}
add_action( 'pre_get_posts', 'wpse_modify_video_archive_query' );

?>