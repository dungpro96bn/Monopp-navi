<?php get_header(); ?>

<div id="mv-slider" class="mv-slider">
  <div class="mv-wrapper">
    <h1 class="mv-catch-copy">キャッチコピーが入りますキャッチコピー</h1>
    <div class="mv-picture js-mv-picture">
      <div class="mv-picture-item"></div>
      <div class="mv-picture-item"></div>
      <div class="mv-picture-item"></div>
    </div><!-- .mv-picture -->
  </div><!-- .mv-wrapper -->
  <div class="mv-opening-animation">
    <div class="mv-opening-animation-logo js-fadein">
      <picture>
        <source media="(max-width: 959px)" srcset="<?php echo do_shortcode('[uploadPath]'); ?>logo_sp.png 2x">
        <source media="(min-width: 960px)" srcset="<?php echo do_shortcode('[uploadPath]'); ?>logo_pc.png 2x">
        <img class="sizes" src="<?php echo do_shortcode('[uploadPath]'); ?>logo_pc.png" alt="<?php bloginfo( 'name' ); ?>">
      </picture>
    </div>
  </div><!-- .mv-opening-animation -->
</div><!-- #mv-slider -->

<?php get_footer(); ?>