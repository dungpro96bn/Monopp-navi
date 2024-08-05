<?php get_header(); ?>

    <div id="breadcrumb" class="breadcrumb">
        <div class="inner">
            <ol>
                <li>
                    <a href="<?php echo home_url(); ?>">TOP</a></i>
                </li>
                <li>404 not found</li>
            </ol>
        </div>
    </div>

    <div id="page-404" class="">
        <div class="inner">
            <div class="not-found-box">
                <p class="not-found-text">申し訳ございません。<br>お探しのページは見つかりませんでした。</p>
                <a href="<?php echo do_shortcode('[homePath]'); ?>" class="not-found-button">トップページへ戻る</a>
            </div>
        </div>

    </div><!-- #404 -->

<?php get_footer(); ?>