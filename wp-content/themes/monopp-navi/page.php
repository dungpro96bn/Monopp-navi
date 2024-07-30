<?php get_header(); ?>

<?php /* breadcrumb */
  global $homeName;
  $homeName = '';
  if (function_exists('breadcrumb')) :
    breadcrumb();
  endif;
?>

<?php
  if (have_posts()) : while (have_posts()) : the_post();
    remove_filter('the_content', 'wpautop');
    the_content();
  endwhile;
  else :
    echo '<p class="no-post">お探しの記事、ページは見つかりませんでした。</p>';
  endif;
?>

<?php get_footer(); ?>