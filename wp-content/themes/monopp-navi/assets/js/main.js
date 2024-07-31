

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


    // slider homepage
    // ============================
    $('#homepage .sliderList').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        speed: 600,
        arrows: false,
        // autoplay: true,
        // autoplaySpeed: 3000,
        dots: true,
        centerMode: true,
        variableWidth: true,
        centerPadding: '0',
        pauseOnHover: false,
    });

    function updateBackground(slideIndex) {
        var currentSlide = $('#homepage .sliderList').slick('getSlick').$slides.eq(slideIndex);
        var imgSrc = currentSlide.find('img').attr('src');
        $('.bg-slider-post').css('background-image', 'url(' + imgSrc + ')');
    }

    $('#homepage .sliderList').on('afterChange', function(event, slick, currentSlide){
        updateBackground(currentSlide);
    });

    var initialSlide = $('#homepage .sliderList').slick('slickCurrentSlide');
    updateBackground(initialSlide);


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



});