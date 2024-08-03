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
    wp_enqueue_style( 'style-admin', get_template_directory_uri() . '/assets/css/style-admin.css', false, '1.0.0' );
}

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
add_action('wp_ajax_nopriv_quick_search', 'quick_search_callback'); // Nếu bạn muốn cho phép tìm kiếm cho người dùng chưa đăng nhập

function quick_search_callback() {
    global $wpdb;

    $query = isset($_GET['query']) ? sanitize_text_field($_GET['query']) : '';

    $response = [
        'count' => 0,
        'html'  => '',
        'link'  => ''
    ];

    if (!empty($query)) {
        $search_terms = explode(' ', $query);
        $search_terms = array_map('esc_sql', $search_terms);

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
            LIMIT 4
        ");

        // Lưu số lượng bài viết
        $response['count'] = $total_results;

        if ($results) {
            foreach ($results as $post): ?>
            <?php
                $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'thumbnail');
                $categories = get_the_category($post->ID);
                $cat_name = $categories[0]->cat_name;
                $cat_link = get_category_link($post->ID);
                $post_date = get_the_date('', $post->ID);
                ?>
                <div class="search-result-item">
                    <a href="<?php echo get_permalink($post->ID); ?>" class="post-link">
                        <div class="image-post">
                            <div class="img-inner">
                                <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($post->post_title); ?>">
                            </div>
                        </div>
                        <div class="info">
                            <h2 class="title-post"><?php echo esc_html($post->post_title); ?></h2>
                            <div class="info-bottom">
                                <div class="category">
                                    <span data-href="<?php echo esc_url($cat_link); ?>"># <?php echo esc_html($cat_name); ?></span>
                                </div>
                                <p class="date-time number"><?php echo esc_html($post_date); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php } else {
            echo '<p  class="ttl-en result-error">Your search returned no results. Please contact us with your question by phone at 888-8888-8888 or submit your question by email to demo@monoppu.com</p>';
        }

        // Thêm liên kết đến trang tìm kiếm với tổng số bài viết tìm được
        $search_url = esc_url(add_query_arg('s', $query, home_url('/search/')));
        $response['link'] = '<a href="' . $search_url . '">Xem tất cả ' . $total_results . ' kết quả tìm kiếm</a>';

    }

    wp_die(); // Kết thúc AJAX request
}




?>