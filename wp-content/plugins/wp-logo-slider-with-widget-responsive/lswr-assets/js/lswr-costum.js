jQuery( document ).ready(function($) {
  // Logo Slider
  $( '.lswr-logo-slider' ).each(function( index ) {    
    var slider_id   = $(this).attr('id');
    var logo_conf   = $.parseJSON( $(this).closest('.logo-slider-outter').find('.lswr-logo-slider-js-call').attr('data-conf') );
    if( typeof(slider_id) != 'undefined' && slider_id != '' ) {
        jQuery('#'+slider_id).slick({
            centerMode      : (logo_conf.center_mode) == "true" ? true : false,
            dots            : (logo_conf.dots) == "true" ? true : false,
            arrows          : (logo_conf.arrows) == "true" ? true : false,
            infinite        : (logo_conf.loop) == "true" ? true : false,
            speed           : parseInt(logo_conf.speed),
            autoplay        : (logo_conf.autoplay) == "true" ? true : false,
            slidesToShow    : parseInt(logo_conf.slides_column),
            slidesToScroll  : parseInt(logo_conf.slides_scroll),
            rows            : parseInt(logo_conf.rows),
            autoplaySpeed   : parseInt(logo_conf.autoplay_interval),
            cssEase       : (logo_conf.ticker) == "true" ? "linear" : "ease",
            pauseOnFocus        : false,
            prevArrow: "<div class='slick-prev'><i class='fa fa-angle-left'></i></div>",
            nextArrow: "<div class='slick-next'><i class='fa fa-angle-right'></i></div>",
            centerPadding       : '0px',
           mobileFirst         : (Wpls.is_mobile == 1) ? true : false,
            responsive: [{
              breakpoint: 1023,
              settings: {
                slidesToShow  : (parseInt(logo_conf.slides_column) > 3) ? 3 : parseInt(logo_conf.slides_column),
                slidesToScroll  : 1
              }
            },{
              breakpoint: 640,
              settings: {
                slidesToShow  : (parseInt(logo_conf.slides_column) > 2) ? 2 : parseInt(logo_conf.slides_column),
                slidesToScroll  : 1
              }
            },{
              breakpoint: 479,
              settings: {
                slidesToShow  : 1,
                slidesToScroll  : 1
              }
            },{
              breakpoint: 319,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }]
      });
    }
  });
  /* For logo slider animation */
  $( '.lswr-logo-slider' ).each(function( index ) {
    var hover_eft = $(this).attr('data-animation');
    if( typeof(hover_eft) != 'undefined' && hover_eft !='' ) {
      var hover_eft = 'animated' +' '+ hover_eft;
      $(this).find('.lswr-logo-inner').hover(function() {
        jQuery(this).addClass(hover_eft).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function(){
          jQuery(this).removeClass(hover_eft);
        });
      });
      $( ".lswr-logo-inner" ).mouseleave(function() {
        $(this).removeClass(hover_eft);
      });
    }
  });
  /* For logo grid animation */
  $( '.lswr-logo-outter' ).each(function( index ) {
    var hover_eft = $(this).attr('data-animation');
    if( typeof(hover_eft) != 'undefined' && hover_eft !='' ) {
      var hover_eft = 'animated' +' '+ hover_eft;
      $(this).find('.lswr-logo-inner').hover(function() {
        jQuery(this).addClass(hover_eft).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function(){
          jQuery(this).removeClass(hover_eft);
        });
      });
      $( ".lswr-logo-inner" ).mouseleave(function() {
        $(this).removeClass(hover_eft);
      });
    }
  });
  /* Logo Filter */
  if( $('.lswr-filtr-row').length > 0) {
    jQuery('.lswr-filtr-row').filterizr({      
      selector  : '.lswr-filtr-row',
      layout    : 'sameWidth',
    });    
    $(document).on('click', '.lswr-tabs-outter li', function(){
      $('.lswr-tab').removeClass('lswr-tab-current');
      $(this).addClass('lswr-tab-current');
    });
  }
});