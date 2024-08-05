

jQuery(function ($) {



    //fade
    AOS.init({
        once: true,
        duration: 1000,
        delay: 0,
    });


    //scroll
    $(function(){
        $('.scroll').click(function(event){
            event.preventDefault();
            var url = $(this).attr('href');
            var dest = url.split('#');var target = dest[1];
            var target_offset = $('#'+target).offset();
            var target_top = target_offset.top - 50;
            $('html, body').animate({scrollTop:target_top}, 500, 'swing');
            return false;
        });

    });



    $('#toc_container a').on('click', function(e) {
        e.preventDefault();

        var targetId = $(this).attr('href');

        $('html, body').animate({
            scrollTop: $(targetId).offset().top - 70
        }, 500);
    });


    // page-top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('#page-top').addClass('is-open');
        } else {
            $('#page-top').removeClass('is-open');
        }
    });

    if ($(this).scrollTop() > 200) {
        $('#page-top').addClass('is-open');
    } else {
        $('#page-top').removeClass('is-open');
    }

    //Scroll page top
    $('#page-top a').click(function(event){
        event.preventDefault();
        var speed = 500;
        var href= $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;
        $("html, body").animate({scrollTop:position}, speed, "swing");
        return false;
    });

    //Open Menu
    $("#header-menu .btn-openMenu").click(function () {
        $("body").toggleClass("header-open");
        $("#header-menu .header-megamenu").toggleClass("is-open");
        $(this).toggleClass("is-open");
        $("#header-menu").toggleClass("is-openMenu");
    });

    $(".bg-headerOpen").click(function () {
        $("body").toggleClass("header-open");
        $("#header-menu .header-megamenu").toggleClass("is-open");
        $("#header-menu").toggleClass("is-openMenu");
        $("#header-menu .btn-openMenu").toggleClass("is-open");
    });


    // Scroll header
    $(window).scroll( function(){
        if( $(this).scrollTop() > 200 ){
            $('#header-menu .header-nav').addClass('scroll-header');
            setTimeout(function(){
                $('#header-menu .header-nav').addClass('site-header--opening');
            },100);
        } else {
            $('#header-menu .header-nav').removeClass('scroll-header');
            $('#header-menu .header-nav').removeClass('site-header--opening');
        }
    });
    if($(this).scrollTop() > 200 ){
        $('#header-menu .header-nav').addClass('scroll-header');
        setTimeout(function(){
            $('#header-menu .header-nav').addClass('site-header--opening');
        },100);
    } else {
        $('#header-menu .header-nav').removeClass('scroll-header');
        $('#header-menu .header-nav').removeClass('site-header--opening');
    }


    //pagination ajax
    var total = 1;
    var numberPost = 3;
    $('.navigation-more a').click(function(e){
        e.preventDefault();
        var postsPerPage = numberPost += 3;
        var number = total += 1;
        var dataMax = $(this).attr('data-max');
        if(total >= dataMax){
            $(this).addClass("is-stop");
        }

        $this = $(this);

        $(this).addClass('is-loading');

        var link = window.location.href.split('#')[0];
        var urlPage = link + 'page/' + total;

        $.ajax({
            url: urlPage ,
            type:'GET',
            success: function(data){
                var thisHtml =  $(data).find('.related-article-list');
                thisHtml.each(function(){
                    var a = $(this).html();
                    $('.related-article-list').append(a);
                });
                $(".navigation-more a").removeClass('is-loading');
                if(number >= dataMax){
                    // $this.addClass("is-opacity");
                    $this.parents(".navigation-more").remove();
                }
            }
        });
    });


    $('.searchForm form input').each(function() {
        if ($(this).val() !== '') {
            $(this).parents('.control').addClass('active');
            $(this).parents(".searchForm").addClass("is-active");
            $(".searchForm").removeClass("is-active");
        }
    });

    $(document).on('focus input', '.searchForm form input', function() {
        var label = $(this).parents('.control');
        if ($(this).val() !== '' || $(this).is(':focus')) {
            label.addClass('active');
            $(".bg-loading-search").show();
            $("body").addClass("search-focus");
        } else {
            label.removeClass('active');
            $(".bg-loading-search").hide();
            $("body").removeClass("search-focus");
        }
    });

    $(document).on('focus', '.searchForm form input', function() {
        var query = $(this).val();
        if(query.length > 1){
            $(".searchForm").addClass("is-active");
        }
    });

    $(document).on('blur', '.searchForm form input', function() {
        var label = $(this).parents('.control');
        if ($(this).val() === '') {
            label.removeClass('active');
            $(this).parents(".searchForm").removeClass("is-active");
            $(".bg-loading-search").hide();
            $("body").removeClass("search-focus");
        }
    });

    $(".bg-loading-search").click(function () {
        $(".searchForm").removeClass("is-active");
        $("body").removeClass("search-focus");
        $(this).hide();
    });

    $(".search-result-item .category span").click(function () {
        var href = $(this).attr("data-href");
        window.location.replace("href");
    });

    // Sort search post
    // $('#sorter').on('change', function () {
    //     var sorter = $(this).val();
    //     var searchQuery = $('#search-box').val();
    //     var newUrl = new URL(window.location.href);
    //     if (sorter) {
    //         newUrl.searchParams.set('sorter', sorter);
    //     } else {
    //         newUrl.searchParams.delete('sorter'); // Remove sorter parameter if empty
    //     }
    //     window.history.replaceState(null, '', newUrl);
    //
    //     $.ajax({
    //         url: ajaxurl,
    //         type: 'GET',
    //         data: {
    //             action: 'sort_posts',
    //             sorter: sorter,
    //             s: searchQuery
    //         },
    //         beforeSend: function () {
    //             var htmlLoading = '<div class="ajax-loading">\n' +
    //                 '    <img alt="" src="/wp-content/themes/monopp-navi/assets/images/loader-1.gif">\n' +
    //                 '</div>'
    //             $(htmlLoading).insertAfter($("#footer"));
    //         },
    //         success: function (response) {
    //             $('#search-results').html(response);
    //             $(".ajax-loading").remove();
    //         }
    //     });
    // });


});