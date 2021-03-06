jQuery(document).ready(function($) {

    var rtl, winWidth;

    winWidth = $(window).width();
    
    if( the_conference_data.rtl == '1' ){
        rtl = true;
    }else{
        rtl = false;
    }
    
    //Header Search form show/hide
    $('.site-header .nav-holder .form-holder').prepend('<div class="btn-close-form"><span></span></div>');

    $('.site-header .form-section').click(function(event) {
        event.stopPropagation();
    });
    $("#btn-search").click(function() {
        $(".site-header .form-holder").show("fast");
    });

    $('.btn-close-form').click(function(){
        $('.site-header .nav-holder .form-holder').hide("fast");
    });

    /**
     *
     * Custom js from theme
     *
     */ 
    new WOW().init();

    $('.scroll-down').click(function(){
        $('html, body').animate({
            scrollTop: $(".scroll-down").parent('.item').parents('.site-banner').next().offset().top
        }, 800);
    });

    //append responsive button
    if($(window).width() <= 1024) {
        $('.site-header .container').append('<button class="toggle-btn"><span class="bar"></span><span class="bar"></span><span class="bar"></span></button>');
        $('.nav-wrap').insertBefore('.site');
        $('.site-header button.toggle-btn').on('click', function(){
            $('body').addClass('nav-toggled');
        });

        $('.main-navigation .toggle-button').on('click', function(){
            $('body').removeClass('nav-toggled');
        });

        $('.main-navigation li.menu-item-has-children').prepend('<span class="submenu-toggle"><i class="fa fa-angle-down"></i></span>');
        $('.menu-item-has-children .submenu-toggle').on('click', function(){
            $(this).toggleClass('active');
            $(this).siblings('ul').slideToggle();
        });
    }

    //wrap widget title content with span
    $('#secondary .widget-title, .site-footer .widget-title').wrapInner('<span class="title-wrap"></span>');

    //calculate header height
    var headerHeight = $('header.site-header').outerHeight();
    $('header.page-header, body.home:not(.hasbanner) .site').css('padding-top', headerHeight);
    $('.site-header + .site-banner .banner-caption').css('padding-top', headerHeight);

    //banner countdown
    if ( ! ( the_conference_data.banner_event_timer === undefined || the_conference_data.banner_event_timer.length == 0 ) ) {
        $('#bannerClock .days').countdown( the_conference_data.banner_event_timer, function(event) {
            $(this).html(event.strftime('%D'));
        });
        $('#bannerClock .hours').countdown( the_conference_data.banner_event_timer, function(event) {
            $(this).html(event.strftime('%H'));
        });
        $('#bannerClock .minutes').countdown(the_conference_data.banner_event_timer, function(event) {
            $(this).html(event.strftime('%M'));
        });
        $('#bannerClock .seconds').countdown(the_conference_data.banner_event_timer, function(event) {
            $(this).html(event.strftime('%S'));
        });                                                                                                                          
    }
    
    //custom scroll bar
    if( $('.widget_rrtc_description_widget').length ){
        $('.description').each(function(){ 
            var ps = new PerfectScrollbar($(this)[0]); 
        });
    }
});