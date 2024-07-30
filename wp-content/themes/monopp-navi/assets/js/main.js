

jQuery(function ($) {

    //Slider banner homepage
    $('.bannerSlider .sliderList-image').slick({
        autoplay: true,
        cssEase: 'linear',
        pauseOnHover: false,
        focusOnSelect: false,
        pauseOnFocus: false,
        fade: true,
        autoplaySpeed: 2000,
        infinite: true,
        dots: false,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 800
    });

    //Slider Vietnam tour
    var count1 = $('#northern .list-imageTour').attr("data-count");
    $('#northern .list-imageTour').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        // fade: true,
        dots: true,
        autoplay: true,
        pauseOnHover: false,
        focusOnSelect: false,
        pauseOnFocus: false,
        autoplaySpeed: 2000,
        infinite: true,
        asNavFor: '#northern .list-thumbnailTour',
        prevArrow:"<button type='button' class='slick-prev pull-left'><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"5.561\" height=\"9.707\" viewBox=\"0 0 5.561 9.707\">\n" +
            "  <path id=\"Path_957\" data-name=\"Path 957\" d=\"M1025.725,1702.412l-4.5,4.5,4.5,4.5\" transform=\"translate(-1020.518 -1702.058)\" fill=\"none\" stroke=\"#fff\" stroke-width=\"1\"/>\n" +
            "</svg>\n</button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"5.561\" height=\"9.707\" viewBox=\"0 0 5.561 9.707\">\n" +
            "  <path id=\"Path_958\" data-name=\"Path 958\" d=\"M1025.725,1702.412l-4.5,4.5,4.5,4.5\" transform=\"translate(1026.079 1711.765) rotate(180)\" fill=\"none\" stroke=\"#fff\" stroke-width=\"1\"/>\n" +
            "</svg>\n</button>",
    });
    $('#northern .list-thumbnailTour').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '#northern .list-imageTour',
        dots: false,
        arrows: false,
        focusOnSelect: true,
        infinite: true,
    });

    var count2 = $('#central .list-imageTour').attr("data-count");
    $('#central .list-imageTour').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        // fade: true,
        dots: true,
        autoplay: true,
        pauseOnHover: false,
        focusOnSelect: false,
        pauseOnFocus: false,
        autoplaySpeed: 2000,
        infinite: true,
        asNavFor: '#central .list-thumbnailTour',
        prevArrow:"<button type='button' class='slick-prev pull-left'><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"5.561\" height=\"9.707\" viewBox=\"0 0 5.561 9.707\">\n" +
            "  <path id=\"Path_957\" data-name=\"Path 957\" d=\"M1025.725,1702.412l-4.5,4.5,4.5,4.5\" transform=\"translate(-1020.518 -1702.058)\" fill=\"none\" stroke=\"#fff\" stroke-width=\"1\"/>\n" +
            "</svg>\n</button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"5.561\" height=\"9.707\" viewBox=\"0 0 5.561 9.707\">\n" +
            "  <path id=\"Path_958\" data-name=\"Path 958\" d=\"M1025.725,1702.412l-4.5,4.5,4.5,4.5\" transform=\"translate(1026.079 1711.765) rotate(180)\" fill=\"none\" stroke=\"#fff\" stroke-width=\"1\"/>\n" +
            "</svg>\n</button>",
    });
    $('#central .list-thumbnailTour').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '#central .list-imageTour',
        dots: false,
        arrows: false,
        focusOnSelect: true,
        infinite: true,
    });

    var count3 = $('#southern .list-imageTour').attr("data-count");
    $('#southern .list-imageTour').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        // fade: true,
        dots: true,
        autoplay: true,
        pauseOnHover: false,
        focusOnSelect: false,
        pauseOnFocus: false,
        autoplaySpeed: 2000,
        infinite: true,
        asNavFor: '#southern .list-thumbnailTour',
        prevArrow:"<button type='button' class='slick-prev pull-left'><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"5.561\" height=\"9.707\" viewBox=\"0 0 5.561 9.707\">\n" +
            "  <path id=\"Path_957\" data-name=\"Path 957\" d=\"M1025.725,1702.412l-4.5,4.5,4.5,4.5\" transform=\"translate(-1020.518 -1702.058)\" fill=\"none\" stroke=\"#fff\" stroke-width=\"1\"/>\n" +
            "</svg>\n</button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"5.561\" height=\"9.707\" viewBox=\"0 0 5.561 9.707\">\n" +
            "  <path id=\"Path_958\" data-name=\"Path 958\" d=\"M1025.725,1702.412l-4.5,4.5,4.5,4.5\" transform=\"translate(1026.079 1711.765) rotate(180)\" fill=\"none\" stroke=\"#fff\" stroke-width=\"1\"/>\n" +
            "</svg>\n</button>",
    });
    $('#southern .list-thumbnailTour').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '#southern .list-imageTour',
        dots: false,
        arrows: false,
        focusOnSelect: true,
        infinite: true,
    });

    var count4 = $('#southern-resort .list-imageTour').attr("data-count");
    $('#southern-resort .list-imageTour').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        // fade: true,
        dots: true,
        autoplay: true,
        pauseOnHover: false,
        focusOnSelect: false,
        pauseOnFocus: false,
        autoplaySpeed: 2000,
        infinite: true,
        asNavFor: '#southern-resort .list-thumbnailTour',
        prevArrow:"<button type='button' class='slick-prev pull-left'><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"5.561\" height=\"9.707\" viewBox=\"0 0 5.561 9.707\">\n" +
            "  <path id=\"Path_957\" data-name=\"Path 957\" d=\"M1025.725,1702.412l-4.5,4.5,4.5,4.5\" transform=\"translate(-1020.518 -1702.058)\" fill=\"none\" stroke=\"#fff\" stroke-width=\"1\"/>\n" +
            "</svg>\n</button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"5.561\" height=\"9.707\" viewBox=\"0 0 5.561 9.707\">\n" +
            "  <path id=\"Path_958\" data-name=\"Path 958\" d=\"M1025.725,1702.412l-4.5,4.5,4.5,4.5\" transform=\"translate(1026.079 1711.765) rotate(180)\" fill=\"none\" stroke=\"#fff\" stroke-width=\"1\"/>\n" +
            "</svg>\n</button>",
    });
    $('#southern-resort .list-thumbnailTour').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '#southern-resort .list-imageTour',
        dots: false,
        arrows: false,
        focusOnSelect: true,
        infinite: true,
    });

    $('.post-template .list-imageTour').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        // fade: true,
        dots: false,
        autoplay: true,
        autoplaySpeed: 2000,
        infinite: true,
        asNavFor: '.post-template .list-thumbnailTour',
        prevArrow:"<button type='button' class='slick-prev pull-left'><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"5.561\" height=\"9.707\" viewBox=\"0 0 5.561 9.707\">\n" +
            "  <path id=\"Path_957\" data-name=\"Path 957\" d=\"M1025.725,1702.412l-4.5,4.5,4.5,4.5\" transform=\"translate(-1020.518 -1702.058)\" fill=\"none\" stroke=\"#fff\" stroke-width=\"1\"/>\n" +
            "</svg>\n</button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"5.561\" height=\"9.707\" viewBox=\"0 0 5.561 9.707\">\n" +
            "  <path id=\"Path_958\" data-name=\"Path 958\" d=\"M1025.725,1702.412l-4.5,4.5,4.5,4.5\" transform=\"translate(1026.079 1711.765) rotate(180)\" fill=\"none\" stroke=\"#fff\" stroke-width=\"1\"/>\n" +
            "</svg>\n</button>"
    });
    $('.post-template .list-thumbnailTour').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.post-template .list-imageTour',
        dots: false,
        arrows: false,
        focusOnSelect: true,
        infinite: true,
    });


    //fade
    AOS.init({
        once: true,
        duration: 1000,
        delay: 0,
    });


    // Check submit contact complete
    setInterval(function () {
        if($(".mw_wp_form_confirm .wpcf7-form").hasClass("sent")){
            var strHref = window.location.href,
                href = strHref.replace('confirm/', '');
            $(".mw_wp_form_confirm .wpcf7-form").removeClass("sent");
            window.location.replace(href + 'complete/');
        }
    }, 100);

    $(".mw_wp_form_confirm .submit-form").click(function () {
        localStorage.setItem('sendmail', 'complete');
    });

    $(document).ready(function () {
        var checkItem1 = document.getElementsByClassName('contact-form-complete');
        var checkItem2 = document.getElementsByClassName('mw_wp_form_confirm');
        if(checkItem1.length <= 0 || checkItem2.length <= 0){
            localStorage.removeItem('sendmail');
        }
    });

    $(".link-top a").click(function () {
        localStorage.removeItem('sendmail');
    });


    //Open line box
    $("#line-contactBox .boxClose").click(function () {
        $("#line-contactBox").addClass("is-hide");
        $(".lineBox").removeClass("is-close");
    });
    $(".lineBox").click(function () {
        $("#line-contactBox").removeClass("is-hide");
        $(this).addClass("is-close");
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

        // $('.locationItem a').hover(function(event){
        //     // event.preventDefault();
        //     var url = $(this).attr('data-id');
        //     // var dest = url.split('#');
        //     var target = url;
        //     $(".vietnam-tour .map-tour .locationItem a").removeClass("active");
        //     // $(".tourInfo-item .aos-init").removeClass("aos-animate");
        //     $(this).addClass("active");
        //     $("#vietnam-tour").attr("data-map", target);
        //     $(".vietnam-tour .tourInfo .tourInfo-item").removeClass("active");
        //     $('#'+target).addClass("active");
        //     $(".vietnam-tour .tourInfo .list-imageTour").slick("refresh");
        //     // AOS.refresh();
        // });
    });

    // window.addEventListener('resize', function(event){
    //     if ($(window).width() > 767) {
    //         $('.locationItem a').hover(function(){
    //             var url = $(this).attr('data-id');
    //             var target = url;
    //             // $(".tourInfo-item .aos-init").removeClass("aos-animate");
    //             $(".vietnam-tour .map-tour .locationItem a").removeClass("active");
    //             $(this).addClass("active");
    //             $("#vietnam-tour").attr("data-map", target);
    //             $(".vietnam-tour .tourInfo .tourInfo-item").removeClass("active");
    //             $('#'+target).addClass("active");
    //             var id ='#'+target;
    //             // $(id + ".tourInfo-item .aos-init").removeClass("aos-animate");
    //             $(".vietnam-tour .tourInfo .list-imageTour").slick("refresh");
    //             $(".vietnam-tour .tourInfo .list-thumbnailTour").slick("refresh");
    //             // $('#'+target+ ' ' +".tourInfo-item .aos-init").removeClass("aos-animate");
    //             // AOS.refresh();
    //         });
    //     } else {
    //         $(".vietnam-tour .map-tour .locationItem a").removeClass("active");
    //         $('.locationItem a').click(function(event){
    //             event.preventDefault();
    //             var url = $(this).attr('data-id');
    //             var target = url;
    //             $(".vietnam-tour .map-tour .locationItem a").removeClass("active");
    //             $(this).addClass("active");
    //             $("#vietnam-tour").attr("data-map", target);
    //             $(".vietnam-tour .tourInfo .tourInfo-item").removeClass("is-open");
    //             $('#'+target).addClass("is-open");
    //             $(".vietnam-tour .tourInfo .tourInfo-item").removeClass("active");
    //             $('#'+target).addClass("active");
    //             $('#line-contactBox').fadeOut();
    //             $(".vietnam-tour .tourInfo .list-imageTour").slick("refresh");
    //             $(".vietnam-tour .tourInfo .list-thumbnailTour").slick("refresh");
    //             // AOS.refresh();
    //         });
    //     }
    // });

    if ($(window).width() > 767) {
        $('.locationItem a').hover(function(){
            var url = $(this).attr('data-id');
            var target = url;
            $(".vietnam-tour .map-tour .locationItem a").removeClass("active");
            $(this).addClass("active");
            $("#vietnam-tour").attr("data-map", target);
            $(".vietnam-tour .tourInfo .tourInfo-item").removeClass("active");
            $('#'+target).addClass("active");
            // var id ='#'+target;
            // $(id + ".tourInfo-item .aos-init").removeClass("aos-animate");
            $(".vietnam-tour .tourInfo .list-imageTour").slick("refresh");
            $(".vietnam-tour .tourInfo .list-thumbnailTour").slick("refresh");
            // AOS.refresh();
        });
    } else {
        $("#vietnam-tour").attr("data-map", "");
        $(".vietnam-tour .map-tour .locationItem a").removeClass("active");
        $(".tourInfo-item div").removeAttr("data-aos");
        $('.locationItem a').click(function(event){
            event.preventDefault();
            var url = $(this).attr('data-id');
            var target = url;
            $(".vietnam-tour .map-tour .locationItem a").removeClass("active");
            $(this).addClass("active");
            $("#vietnam-tour").attr("data-map", target);
            $(".vietnam-tour .tourInfo .tourInfo-item").removeClass("is-open");
            $('#'+target).addClass("is-open");
            $(".vietnam-tour .tourInfo .tourInfo-item").removeClass("active");
            $('#'+target).addClass("active");
            $("body").addClass("active");
            $('#line-contactBox').fadeOut();
            $("#page-top").removeClass("is-open");
            $(".vietnam-tour .tourInfo .list-imageTour").slick("refresh");
            $(".vietnam-tour .tourInfo .list-thumbnailTour").slick("refresh");
            // AOS.refresh();
        });
    }

    $(".vietnam-tour .tourInfo-item .close-popup, .vietnam-tour .tourInfo .bg-tourInfo,.vietnam-tour .tourInfo .tag-location").click(function () {
        $(this).parents(".tourInfo-item").removeClass("is-open");
        $('#line-contactBox').fadeIn();
        $("body").removeClass("active");
        $("#page-top").addClass("is-open");
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

    $(window).on('scroll', function () {
        if($(window).width() < 1024){
            var ptop = $(".footer-bottom").offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > ptop - windowHeight) {
                $('#line-contactBox').fadeOut();
            } else {
                $('#line-contactBox').fadeIn();
            }
        }
    });


    $(".tab-action").click(function (event) {
        event.preventDefault();
        $(".post-template .tourContent-info").removeClass("active");
        $(".tab-action").removeClass("active");
        $(".guide-infoContent").removeClass("active");
        $(".tourContent-infoInner .aos-init").removeClass("aos-animate");
        $(".guide-infoContent .aos-init").removeClass("aos-animate");
        var url = $(this).attr('href');
        var dest = url.split('#');
        var target = dest[1];
        $('#'+target).addClass("active");
        $(this).addClass("active");
        AOS.refresh();
    });

    $(".tab-action-hotel").click(function (event) {
        event.preventDefault();
        var idParents = $(this).parents(".hotel-colItem").attr("data-hotel");
        $('[data-hotel="'+ idParents +'"] .tab-action-hotel').removeClass("active");
        $(".hotel-colItem .aos-init").removeClass("aos-animate");
        $(this).parents(".hotel-colItem").find(".hotel-by-rating").removeClass("active");
        var url = $(this).attr('href');
        var dest = url.split('#');
        var target = dest[1];
        $('#'+target).addClass("active");
        $(this).addClass("active");
        AOS.refresh();
    });

    //pagination ajax
    var total = 1;
    $('.hotel-by-rating .navigation-more a').click(function(e){
        e.preventDefault();
        var number = total += 1;
        var dataMax = $(this).attr('data-max');
        if(total >= dataMax){
            $(this).addClass("is-stop");
        }

        $this = $(this);

        $(this).addClass('is-loading');
        var classParents = $(this).parents('.hotel-by-rating').attr('data-class');

        var link = window.location.href.split('#')[0];
        var urlPage = link + 'page/' + total;

        $.ajax({
            url: urlPage ,
            type:'GET',
            success: function(data){
                var thisHtml =  $(data).find('#' + classParents + ' .hotel_list');
                thisHtml.each(function(){
                    var a = $(this).html();
                    $('#'+classParents + ' .hotel_list').append(a);
                });
                $(".navigation-more a").removeClass('is-loading');
                if(number >= dataMax){
                    $this.addClass("is-opacity");
                }
            }
        });
    });


    // navigation tourArea
    // var totaltourArea = 1;
    $("body").delegate('.tourArea .navigation-more a', "click", function(e) {
        e.preventDefault();
        var num = $(this).attr("data-after-load");
        var totaltourArea = parseInt(num);
        var number = totaltourArea += 1;
        var dataMax = $(this).attr('data-max');
        if(number >= dataMax){
            $(this).addClass("is-stop");
        }

        $this = $(this);

        $(this).attr("data-after-load", number);
        $(this).addClass('is-loading');
        var classParents = $(this).parents('.tourArea').attr('data-tour');

        var link = window.location.href.split('#')[0];
        var urlPage = link + 'page/' + totaltourArea;

        $.ajax({
            url: urlPage ,
            type:'GET',
            success: function(data){
                var thisHtml =  $(data).find('.tourArea[data-tour="'+classParents + '"] .tourList-area');
                thisHtml.each(function(){
                    var a = $(this).html();
                    $('.tourArea[data-tour="'+classParents + '"] .tourList-area').append(a);
                });
                $(".navigation-more a").removeClass('is-loading');
                if(number >= dataMax){
                    $this.addClass("is-opacity");
                }
            }
        });
    });

    // navigation tourOverseas
    $("body").delegate('.tourOverseas .navigation-more a', "click", function(e) {
        e.preventDefault();
        var num = $(this).attr("data-after-load");
        var totaltourArea = parseInt(num);
        var number = totaltourArea += 1;
        var dataMax = $(this).attr('data-max');
        if(number >= dataMax){
            $(this).addClass("is-stop");
        }

        $this = $(this);

        $(this).attr("data-after-load", number);
        $(this).addClass('is-loading');
        var classParents = $(this).parents('.tourOverseas').attr('data-tour');

        var link = window.location.href.split('#')[0];
        var urlPage = link + 'page/' + totaltourArea;

        $.ajax({
            url: urlPage ,
            type:'GET',
            success: function(data){
                var thisHtml =  $(data).find('.tourOverseas[data-tour="'+classParents + '"] .overseas_list');
                thisHtml.each(function(){
                    var a = $(this).html();
                    $('.tourOverseas[data-tour="'+classParents + '"] .overseas_list').append(a);
                });
                $(".navigation-more a").removeClass('is-loading');
                if(number >= dataMax){
                    $this.addClass("is-opacity");
                }
            }
        });
    });


    $(document).ready(function () {
        $(window).on('scroll', function () {
            var checkCl = $('.header-top');
            if (checkCl.length) {
                var nav = $('.header-top').offset().top;
            }
            // var heightBlockP2 = $("#data-scroll-01").height();
            // $("#welfare .block-main .block-img .max-width-img").css("height", heightBlockP2);

            var top = $('.header-top').outerHeight();

            if ($(window).scrollTop() >= nav) {
                $('.columns-sidebar').addClass("sidebar-scroll");
            } else {
                $('.columns-sidebar').removeClass("sidebar-scroll");
            }

            var Y = $(window).height() - $(".sidebar-content").height() - top;
            var headerBottom = $(".header-bottom").height();

            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            var subfooter = $("#footer").offset().top;

            if (scroll > subfooter - windowHeight + Y + 5) {
                $('.columns-sidebar').addClass("hide-sidebar");
            } else {
                $('.columns-sidebar').removeClass("hide-sidebar");
            }
        });
    });

    setTimeout(function(){
        var checkUrl = location.hash;
        if(checkUrl){
            var url = window.location.href.split('#')[0];
            window.history.pushState(location.hash,'', url);
        }
    },2000);

    $("input#email-address-confirmation").change(function () {
        var valCheck = $("input#email-address").val(),
            valConfirmation = $(this).val();
        if(valConfirmation != valCheck && $(this).val().length !== 0){
            $(".valid-confirm").remove();
            $('<span class="valid-confirm" aria-hidden="true">Email does not match.</span>').appendTo($('span[data-name="email-address-confirmation"]'));
        } else if( $(this).val().length === 0 || $(this).val().length === null ) {
            $(".valid-confirm").remove();
        } else {
            $(".valid-confirm").remove();
        }
    })


    var first = $(location).attr('pathname');
    first.indexOf(1);
    first.toLowerCase();
    first = first.split("/")[1];
    var pathName = '/'+first+'/';
    $(".menu-item a").each(function () {
        var href = $(this).attr('href');
        if(href === pathName){
            $(this).parents(".menu-item").addClass("current-menu-item");
        }
    });

    $("#schedule-start").change(function () {
        var valTime = $(this).val();
        $(".tour-schedule-list").attr("data-time", valTime);
    });

    var checkImg = $(".post-template .inner-info p img");
    if(checkImg.length){
        checkImg.each(function () {
            $(this).parents("p").addClass("contentImg");
            $(this).parents("p").attr("data-image", "hasImage");
        });
    }

    var checkUl = $(".post-template .inner-info ul");
    if(checkUl.length){
        checkUl.each(function () {
            $(this).addClass("contentUl");
        });
    }

    $(".post-template .inner-info").each(function () {
        var checkImg1 = $(this).find("p img");
        var checkUl1 = $(this).find("ul");
        $this = $(this);
        if(checkUl1.length){
            var checkDataImg = checkUl1.prev().attr("data-image");
            if(checkDataImg === "hasImage"){
                $this.addClass("image-text");
            }
        }

    });

    $(".hotel-by-rating .hotel_item .hotel_information .btn-seeMore").click(function () {
        var title = $(this).val();
        var popupInfo = $(this).prev().html();
        $("#hotel_popup .title-popup").html(title);
        $("#hotel_popup .popupInfo").html(popupInfo);
        $("#hotel_popup").addClass("is-open");
    });

    $("#hotel_popup .mask-popup, #hotel_popup .close-popup").click(function () {
        $("#hotel_popup").removeClass("is-open");
    })


});