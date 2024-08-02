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

// Hàm để cập nhật số lượt xem
function set_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Hàm để theo dõi lượt xem khi xem bài viết
function track_post_views($post_id) {
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }

    // Tạo tên cookie dựa trên ID bài viết
    $cookie_name = 'viewed_post_' . $post_id;

    // Kiểm tra xem cookie đã tồn tại chưa
    if (!isset($_COOKIE[$cookie_name])) {
        // Nếu chưa có cookie, tăng số lượt xem
        set_post_views($post_id);

        // Đặt cookie với thời gian hết hạn (ví dụ: 1 ngày)
        setcookie($cookie_name, '1', time() + 86400, '/');
    }
}

// Kích hoạt theo dõi lượt xem
add_action('wp_head', 'track_post_views');


// Thêm cột số lượt xem vào danh sách bài viết
function add_views_column($columns) {
    $columns['post_views'] = 'Number of views';
    return $columns;
}
add_filter('manage_posts_columns', 'add_views_column');

// Hiển thị số lượt xem trong cột mới
function display_views_column($column_name, $post_id) {
    if ($column_name == 'post_views') {
        $views = get_post_meta($post_id, 'post_views_count', true);
        echo $views ? $views : '0';
    }
}
add_action('manage_posts_custom_column', 'display_views_column', 10, 2);

// sắp xếp cột số lượt xem
function sort_views_column($query) {
    if (!is_admin()) {
        return;
    }
    if (isset($query->query['post_type']) && $query->query['post_type'] == 'post' && isset($query->query['orderby']) && $query->query['orderby'] == 'post_views') {
        $query->set('meta_key', 'post_views_count');
        $query->set('orderby', 'meta_value_num');
    }
}
add_action('pre_get_posts', 'sort_views_column');

function sortable_views_column($columns) {
    $columns['post_views'] = 'post_views';
    return $columns;
}
add_filter('manage_edit-post_sortable_columns', 'sortable_views_column');

//
//function generate_table_of_contents($content) {
//    if (is_singular() && !is_admin()) {
//        // Tạo mục lục chỉ cho bài viết đơn
//        $toc = '<div class="table-of-contents">';
//        $toc .= '<div class="heading-table"><p class="title"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
//<path d="M7 11.4226C6.3812 11.7799 5.6188 11.7799 5 11.4226L1.80385 9.57735C1.18505 9.22008 0.803849 8.55983 0.803849 7.8453L0.803849 4.1547C0.803849 3.44017 1.18505 2.77992 1.80385 2.42265L5 0.577353C5.6188 0.220087 6.3812 0.220088 7 0.577353L10.1962 2.42265C10.815 2.77992 11.1962 3.44017 11.1962 4.1547L11.1962 7.8453C11.1962 8.55983 10.815 9.22009 10.1962 9.57735L7 11.4226Z" fill="#EE6E01"/>
//</svg><span>CONTENTS</span></p></div>';
//        $toc .= '<ul>';
//
//        // Tạo DOMDocument để xử lý nội dung
//        $dom = new DOMDocument();
//        @$dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
//
//        // Lấy tất cả các thẻ tiêu đề từ h2 đến h4
//        $headings = $dom->getElementsByTagName('h2');
//        $headingLevels = array();
//
//        foreach ($headings as $heading) {
//            $id = sanitize_title($heading->nodeValue);
//            $heading->setAttribute('id', $id);
//
//            $toc .= '<li><a href="#' . $id . '">' . $heading->nodeValue . '</a>';
//
//            // Xử lý các thẻ h3 và h4 dưới h2
//            $nextElement = $heading->nextSibling;
//            while ($nextElement) {
//                if ($nextElement->nodeName === 'h3' || $nextElement->nodeName === 'h4') {
//                    if ($nextElement->nodeName === 'h3') {
//                        $toc .= '<ul>';
//                    }
//                    while ($nextElement && ($nextElement->nodeName === 'h3' || $nextElement->nodeName === 'h4')) {
//                        $subId = sanitize_title($nextElement->nodeValue);
//                        $nextElement->setAttribute('id', $subId);
//                        $toc .= '<li><a href="#' . $subId . '">' . $nextElement->nodeValue . '</a>';
//
//                        // Xử lý các thẻ h4 dưới h3
//                        if ($nextElement->nodeName === 'h3') {
//                            $subNextElement = $nextElement->nextSibling;
//                            if ($subNextElement && $subNextElement->nodeName === 'h4') {
//                                $toc .= '<ul>';
//                                while ($subNextElement && $subNextElement->nodeName === 'h4') {
//                                    $subSubId = sanitize_title($subNextElement->nodeValue);
//                                    $subNextElement->setAttribute('id', $subSubId);
//                                    $toc .= '<li><a href="#' . $subSubId . '">' . $subNextElement->nodeValue . '</a></li>';
//                                    $subNextElement = $subNextElement->nextSibling;
//                                }
//                                $toc .= '</ul>';
//                            }
//                        }
//
//                        $toc .= '</li>';
//                        $nextElement = $nextElement->nextSibling;
//                    }
//                    if ($nextElement->nodeName === 'h3') {
//                        $toc .= '</ul>';
//                    }
//                } else {
//                    break;
//                }
//            }
//
//            $toc .= '</li>';
//        }
//
//        $toc .= '</ul>';
//        $toc .= '</div>';
//
//        // Thêm mục lục vào đầu nội dung
//        $content = $toc . $content;
//    }
//
//    return $content;
//}
//add_filter('the_content', 'generate_table_of_contents');


?>