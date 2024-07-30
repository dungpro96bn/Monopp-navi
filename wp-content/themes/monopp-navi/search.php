<?php get_header(); ?>

<?php /* breadcrumb */
  global $homeName;
  $homeName = '';
  if (function_exists('breadcrumb')) :
    breadcrumb();
  endif;
?>

<div class="search-box">
  <p class="search-results-number">『<?php echo get_search_query(); ?>』での検索結果（<?php echo $wp_query->found_posts; ?> 件）</p>
  <?php if(have_posts()): ?>
  <?php while(have_posts()): the_post(); ?>
  <article class="search-results-box">
    <a href="<?php the_permalink(); ?>">
      <h1 class="search-results-title"><?php the_title(); ?></h1>
      <div class="search-results-text"><?php the_excerpt(); ?></div>
    </a>
  </article>
  <?php endwhile; ?>
  <?php else : ?>
  <p class="search-results-none">検索条件にヒットした記事がありませんでした。</p>
  <?php endif; ?>
</div><!-- .search-box -->

<?php get_footer(); ?>