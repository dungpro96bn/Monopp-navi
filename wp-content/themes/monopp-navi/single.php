<?php get_header(); ?>

<?php /* breadcrumb */
  global $homeName;
  $homeName = '';
  if (function_exists('breadcrumb')) :
    breadcrumb();
  endif;
?>

<div id="new" class="new-container">
  <p class="new-heading">
    <span class="letter-top">NEW</span>
    <span class="letter-bottom">お知らせ</span>
  </p>
  <?php
  if (have_posts()) : while (have_posts()) : the_post();
  $category = get_the_category();
  $cat_id = $category[0]->cat_ID;
  $cat_name = $category[0]->cat_name;
  $cat_slug = $category[0]->category_nicename;
  $cat_link = get_category_link($cat_id);
  ?>
  <article id="post-<?php the_ID(); ?>" class="new-post">
    <div class="single-head">
      <h1 class="single-title"><?php the_title(); ?></h1>
      <p class="date">
        <span class="new-date-text"><time datetime="<?php the_time('Y-m-d')?>"><?php the_time('Y.m.d')?></time></span>
        <a class="<?php echo $cat_slug; ?> new-category" href="<?php echo $cat_link; ?>"><?php echo $cat_name; ?></a>
      </p>
    </div>
    <div class="single-body">
      <?php the_content(); ?>
    </div>
  </article><!-- .new-post -->
  <?php endwhile;?>
  <div class="post-pagenav-wrapper">
    <div class="post-pagenav">
      <?php if (get_previous_post()): ?><p class="post-prev pagenav-button"><?php previous_post_link( '%link', 'FORWARD' ); ?></p><?php endif; ?>
      <?php if (get_next_post()): ?><p class="post-next pagenav-button"><?php next_post_link( '%link', 'BACK' ); ?></p><?php endif; ?>
      <p class="post-home pagenav-button">
        <a href="<?php echo do_shortcode('[homePath]'); ?>new/">GO TO LIST</a>
      </p>
    </div>
  </div>
  <?php else : ?>
  <p class="not-post">このカテゴリーにはまだ記事がありません。</p>
  <?php endif; ?>
</div><!-- #new -->

<?php get_footer(); ?>