    </main>

    <?php get_sidebar(); ?>

    <footer id="footer" class="footer">
      <div id="page-top" class="page-top">
        <a href="#" class="page-top-anchor">
          <i class="fas fa-arrow-up"></i>
        </a>
      </div><!-- #page-top -->
      <div class="footer-top">
        <div class="footer-inner-top">
          <p class="footer-logo">
            <a href="<?php echo do_shortcode('[homePath]'); ?>">
              <picture>
                <source media="(max-width: 959px)" srcset="<?php echo do_shortcode('[uploadPath]'); ?>logo_sp.png 2x">
                <source media="(min-width: 960px)" srcset="<?php echo do_shortcode('[uploadPath]'); ?>logo_pc.png 2x">
                <img class="sizes" src="<?php echo do_shortcode('[uploadPath]'); ?>logo_pc.png" alt="<?php bloginfo( 'name' ); ?>">
              </picture>
            </a>
          </p>
          <nav class="footer-menu-nav">
            <ul class="footer-nav-list">
              <li class="footer-nav-item">
                <a href="<?php echo do_shortcode('[homePath]'); ?>">
                  <span class="letter-top">HOME</span>
                  <span class="letter-bottom">ホーム</span>
                </a>
              </li>
              <li class="footer-nav-item">
                <a href="<?php echo do_shortcode('[homePath]'); ?>xxxxxx/">
                  <span class="letter-top">CONTENT1</span>
                  <span class="letter-bottom">コンテンツ1</span>
                </a>
              </li>
              <li class="footer-nav-item">
                <a href="<?php echo do_shortcode('[homePath]'); ?>xxxxxx/">
                  <span class="letter-top">CONTENT2</span>
                  <span class="letter-bottom">コンテンツ2</span>
                </a>
              </li>
              <li class="footer-nav-item">
                <a href="<?php echo do_shortcode('[homePath]'); ?>xxxxxx/">
                  <span class="letter-top">CONTENT3</span>
                  <span class="letter-bottom">コンテンツ3</span>
                </a>
              </li>
              <li class="footer-nav-item">
                <a href="<?php echo do_shortcode('[homePath]'); ?>new/">
                  <span class="letter-top">NEW</span>
                  <span class="letter-bottom">お知らせ</span>
                </a>
              </li>
              <li class="footer-nav-item">
                <a href="<?php echo do_shortcode('[homePath]'); ?>contact/">
                  <span class="letter-top">CONTACT</span>
                  <span class="letter-bottom">お問い合わせ</span>
                </a>
              </li>
            </ul><!-- .footer-nav-list -->
          </nav><!-- .footer-menu-nav -->
        </div><!-- .footer-inner-top -->
      </div><!-- .footer-top -->
      <div class="footer-bottom">
        <div class="footer-inner-bottom">
          <nav class="footer-remote-nav">
            <ul class="footer-nav-list">
              <li class="footer-nav-item">
                <a href="#" target="_blank" rel="noopener noreferrer">
                  <span class="letter">コーポレートサイト<i class="blank-icon fas fa-external-link-alt"></i></span>
                </a>
              </li>
              <li class="footer-nav-item">
                <a href="#" target="_blank" rel="noopener noreferrer">
                  <span class="letter">会社概要<i class="blank-icon fas fa-external-link-alt"></i></span>
                </a>
              </li>
              <li class="footer-nav-item">
                <a href="#" target="_blank" rel="noopener noreferrer">
                  <span class="letter">プライバシーポリシー<i class="blank-icon fas fa-external-link-alt"></i></span>
                </a>
              </li>
            </ul><!-- .footer-nav-list -->
          </nav><!-- .footer-remote-nav -->
          <address class="copyright">
            <small>&copy; <?php bloginfo( 'name' ); ?> All Rights Reserved.</small>
          </address>
        </div><!-- .footer-inner-bottom -->
      </div><!-- .footer-bottom -->
    </footer><!-- #footer -->
  </div><!-- .outer -->

<?php wp_footer(); ?>

<script>
jQuery(function($) {
  const ua = navigator.userAgent;
  const uaLowerCase = navigator.userAgent.toLowerCase();
  const isSp = ua.indexOf('iPhone') > 0 || ua.indexOf('iPod') > 0 || (ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0);
  const isTablet = ua.indexOf('iPad') > 0 || (ua.indexOf('Android') > 0 && ua.indexOf('Mobile') == -1) || ua.indexOf('A1_07') > 0 || ua.indexOf('SC-01C') > 0 || uaLowerCase.indexOf('macintosh') > 0 && 'ontouchend' in document;
  const isPc = (! isSp && ! isTablet);
  cssVars({
    rootElement: document
  });
  
  
  /* header */
  var startPos = 0;
  var winScrollTop = 0;
  var state = false;
  var scrollpos;
  var winHeight;
  var headerNavHeight;
  function headerMenu() {
    if($(window).width() >= 960) {
      $('#header-menu').parents('body').addClass('pc-only');
      $('#header-menu .sp__menu').css({'display': 'none'});
    } else {
      $('#header-menu').parents('body').removeClass('pc-only');
      $('#header-menu .sp__menu').css({'display': 'flex'});
    }
  }
  function headerHeight() {
    if($(window).width() >= 960) {
      $('#header-menu .nav-item-list').css({'height': 'auto'});
    } else {
      winHeight = window.innerHeight;
      headerNavHeight = $('#header-menu .header-nav').height();
      $('#header-menu .nav-item-list').css({'height': winHeight - headerNavHeight, 'top': headerNavHeight});
    }
  }
  headerMenu();
  headerHeight();
  $(window).on('orientationchange resize', function(){
    headerMenu();
    headerHeight();
  });
  $('#header-menu .header-logo').show();
  if(ua.indexOf('Trident') === -1) {/* not IE */
    $(window).on('scroll',function(){
      winScrollTop = $(this).scrollTop();
      if (winScrollTop >= startPos) {
        $('#header-menu .header-nav').addClass('hide');
      } else {
        $('#header-menu .header-nav').removeClass('hide');
      }
      startPos = winScrollTop;
    });
  }
  $('#header-menu .sp__menu').on('click', function(){
    if (state == false) {
      scrollpos = $(window).scrollTop();
      $('body').addClass('nav-fixed').css({
        'top': -scrollpos
      });
      state = true;
    } else {
      $('body').removeClass('nav-fixed').css({
        'top': 0
      });
      window.scrollTo(0, scrollpos);
      state = false;
    }
  });
  
  
  /* hamburger */
  $('#header-menu #hamburger').click(function() {
    $(this).toggleClass('active');
    $('#header-menu .nav-item-list').slideToggle();
    $('#header-menu .modal-menu').toggleClass('modal-on');
    $('#header-menu .modal-menu').parent().toggleClass('modal-on');
    $('#header-menu .hamburger--collapse').toggleClass('js-hb-active');
    $(this).parents('body').toggleClass('modal-on');//背景要素を止める（スタイル併用）
  });
  $('body:not(.pc-only) #header-menu .nav-items a[href]').on('click', function(){
    $('#header-menu .nav-item-list').slideUp();
    $('#header-menu .modal-menu').removeClass('modal-on');
    $('#header-menu .modal-menu').parent().removeClass('modal-on');
    $('#header-menu .hamburger--collapse').removeClass('js-hb-active');
    $(this).parents('body').removeClass('modal-on');//背景要素を止める>解除（スタイル併用）
    $('body').removeClass('nav-fixed').css({
      'top': 0
    });
    window.scrollTo(0, scrollpos);
  });
  
  
  /* mvSlider */
  var mvHeightsize, orientation;
  function mvHeight() {
    orientation = window.orientation;
    if (isSp && orientation == 0 || isTablet && orientation == 0) {
      mvHeightsize = $(window).height() / 2;
    } else {
      mvHeightsize = $(window).height() - $('.header-nav').height();
    }
    $('.mv-wrapper .bx-viewport, .mv-picture-item').css({
      'height': mvHeightsize + 'px',
      'z-index': '0'
    });
  }
  mvHeight();
  $(window).on('orientationchange resize', function() {
    mvHeight();
  });
  var mvSlideElement = $('.js-mv-picture');
  var mvActive = 'active';
  var mvSlider = mvSlideElement.bxSlider({
    mode: 'fade',
    auto: true,
    pager: true,
    controls: true,
    minSlides: 1,
    maxSlides: 1,
    responsive: true,
    useCSS: true,
    speed: 1500,
    pause: 5000,
    touchEnabled: false,
    onSliderLoad: function() {
      mvSlideElement.children('.mv-picture-item').eq(0).addClass(mvActive);
    },
    onSlideAfter: function($slideElement, oldIndex, newIndex) {
      mvSlideElement.children('.mv-picture-item').removeClass(mvActive).eq(newIndex).addClass(mvActive);
    }
  });
  
  
  /* mvOpeningAnimation */
  var timer = false;
  var opAnimationElement = $('.mv-opening-animation');
  function opAnimationHeight() {
    var opAnimationHeightsize = $(window).height();
    opAnimationElement.css({'height': opAnimationHeightsize + 'px'});
  }
  opAnimationHeight();
  $(window).on('orientationchange resize', function() {
    opAnimationHeight();
  });
  if($.cookie('mv-opening-animation') == undefined) {// 1回目のアクセス
    $.cookie('mv-opening-animation', 'onece');
    $('.mv-opening-animation-logo').on('transitionend webkitTransitionEnd',function() {
      if (timer !== false) {
        clearTimeout(timer);
      }
      timer = setTimeout(function() {
        opAnimationElement.fadeOut();
        $('.mv-catch-copy').addClass('show-onece');
        mvSlider.reloadSlider();
      }, 500);
    });
  } else {// 2回目以降
    opAnimationElement.remove();
    $('.mv-catch-copy').addClass('show-second');
  }
  
  
  /* webregistForm */
  $('.mw_wp_form_confirm').parents('#webregist').addClass('confirm');
  $('.mw_wp_form .address-zip-button').on('click', function() {
    AjaxZip3.zip2addr('your-address[data][0]', 'your-address[data][1]', 'your-prefectures', 'your-municipality');
  });
  changeSubmitBtn();
  $('.mw_wp_form .personal-acception .mwform-checkbox-field').click(function(){
    changeSubmitBtn();
  });
  function changeSubmitBtn(){
    if ($('#kiyaku-1').prop('checked')) {
      $('.mw_wp_form_input input[type="submit"]').removeAttr("disabled");
    } else {
      $('.mw_wp_form_input input[type="submit"]').attr("disabled", "disabled");
    }
  }
  $('.wpcf7 #your-address').keyup(function() {
    AjaxZip3.zip2addr( this, '', 'your-prefectures', 'your-municipality');
  });
  
  
  /* fadein */
  var ptop, scroll, firstView, windowHeight;
  $(window).on('load', function(){
    $(window).scroll(function () {
      $('.js-fadein').each(function() {
        ptop = $(this).offset().top;
        scroll = $(window).scrollTop();
        windowHeight = $(window).height();
        if (scroll > ptop - windowHeight + 100) {
          $(this).addClass('scroll-in');
        }
      });
    });
    $('.js-fadein').each(function(){
      ptop = $(this).offset().top;
      firstView = $(window).scrollTop();
      windowHeight = $(window).height();
      if (firstView > ptop - windowHeight){
        $(this).addClass('scroll-in');
      }
    });
  });
  
  
  /* scroll */
  $('.scroll').click(function(event) {
    event.preventDefault();
    var url = $(this).attr('href');
    var dest = url.split('#');
    var target = dest[1];
    var target_offset = $('#' + target).offset();
    var target_top = target_offset.top;
    $('html, body').animate({
      scrollTop: target_top
    }, 500, 'swing');
    return false;
  });
  
  
  /* pageTop */
  $('.page-top').hide();
  $(window).scroll(function() {
    if ( $(document).scrollTop() < 100 || $(document).scrollTop() + $(window).height() >= $('#footer').offset().top) {
      $('.page-top').fadeOut();
    } else {
      $('.page-top').fadeIn();
    }
  });
  $('.page-top-anchor').on('click', function(event) {
    event.preventDefault();
    $('html, body').animate({scrollTop: 0}, 500);
    return false;
  });
  
  
  /* only IE */
  if(ua.indexOf('Trident') !== -1) {
    $('.sizes').each(function() {
      var objElement = $(this);
      var objOmg = new Image();
      objOmg.src = objElement.attr('src');
      if (objOmg.width != 0) {
        objElement.css({'width': objOmg.width / 2});
      }
    });
  }
  
});
</script>
</body>
</html>