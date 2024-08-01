<?php get_header(); ?>




    <div class="single-page">

        <div class="inner">
            <?php /* breadcrumb */
            global $homeName;
            $homeName = '';
            if (function_exists('breadcrumb')) :
                breadcrumb();
            endif;
            ?>
        </div>

        <div class="bg-post" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>

        <div class="inner">
            <div class="single-main">
                <div class="main-content">
                    <div class="single-body">
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>