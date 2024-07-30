<?php get_header(); ?>

<?php /* breadcrumb */
  global $homeName;
  $homeName = '';
  if (function_exists('breadcrumb')) :
    breadcrumb();
  endif;
?>

<div id="new" class="new-container">
  <h1 class="new-heading">
    <span class="letter-top">NEW</span>
    <span class="letter-bottom">お知らせ</span>
  </h1>
  <ul class="category-list">
    <li class="category-list-item category-all">
      <a class="category-list-name" href="<?php echo do_shortcode('[homePath]'); ?>new/">記事一覧</a>
    </li>
    <?php
    $args = array(
      'parent' => '1',
      'hide_empty' => '0'
    );
    $categories = get_categories($args);
    usort($categories, function ($a, $b) {
      return $a->description - $b->description;
    });
    foreach( $categories as $categorys ) :
    ?>
    <li class="category-list-item <?php echo $categorys->slug; if( is_category( array($categorys->slug) ) ) : echo ' current'; endif; ?>">
      <a class="<?php echo $categorys->slug; ?> category-list-name" href="<?php echo get_category_link( $categorys->term_id ); ?>"><?php echo $categorys->name; ?></a>
    </li>
    <?php endforeach; ?>
  </ul>
  <?php if (have_posts()) : ?>
  <div class="new-list">
    <?php
    while (have_posts()) : the_post();
    $category = get_the_category();
    $cat_id = $category[0]->cat_ID;
    $cat_name = $category[0]->cat_name;
    $cat_slug = $category[0]->category_nicename;
    $cat_link = get_category_link($cat_id);
    ?>
    <article class="new-list-item">
      <h2 class="new-title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h2>
      <p class="new-date">
        <span class="new-date-text"><time datetime="<?php the_time('Y-m-d')?>"><?php the_time('Y/m/d')?></time></span>
        <a class="<?php echo $cat_slug; ?> new-category" href="<?php echo $cat_link; ?>"><?php echo $cat_name; ?></a>
      </p>
    </article>
    <?php endwhile; ?>
  </div>
  <div class="pagenav">
    <p class="result-count"><?php my_result_count(); ?></p>
    <?php if (function_exists('wp_pagenavi')) : wp_pagenavi(); endif; ?>
  </div>
  <?php else : ?>
  <div class="new-list">
    <p class="not-post">このカテゴリーにはまだ記事がありません。</p>
  </div>
  <?php endif; ?>
</div><!-- #new -->
<?php
  function my_result_count() {
    global $wp_query;
    $paged = get_query_var( 'paged' ) - 1;
    $ppp   = get_query_var( 'posts_per_page' );
    $count = $total = $wp_query->post_count;
    $from  = 0;
    if ( 0 < $ppp ) {
      $total = $wp_query->found_posts;
      if ( 0 < $paged )
        $from  = $paged * $ppp;
    }
    printf(
      '<span class="result-count-text">全%1$s件中 <br class="sp-br">%2$s%3$s件を表示</span>',
      $total,
      ( 1 < $count ? ($from + 1 . '〜') : '' ),
      ($from + $count )
    );
  }
?>

<?php get_footer(); ?>