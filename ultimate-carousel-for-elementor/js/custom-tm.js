var maAdvancedCarousel = function($scope, $) {
  var maAdvancedCarousel = $scope.find(".tm-slider").eq(0);

      maAdvancedCarousel.each(function(index, el) {
        var mobiles    = jQuery(this).data('mobiles');
        var tabs    = jQuery(this).data('tabs');
        jQuery(this).slick({
            dots: true,
            infinite: true,
            slidesToShow: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            //swipeToSlide: true,
            centerMode: true,
            centerPadding: '0',
            //variableWidth: true,
            //slidesToShow: 3,
            //slidesToScroll: 1,
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: tabs,
                  slidesToScroll: 1
                }
              },
              {
                breakpoint: 480,
                settings: {
                  slidesToShow: mobiles,
                  slidesToScroll: 1
                }
              }
              ]
          });

          jQuery(this).on('breakpoint', function(event, slick, currentSlide, nextSlide){

                $('.tp-flipbox__btn_open').click(function(event) {
                  event.preventDefault();
                  var tp = $(this).closest('.tp-flipbox');
                  tp.addClass('flipbox_add');
                  //console.log(tp);
                });

                $('.tp-flipbox__btn_close').click(function(event) {
                  event.preventDefault();
                  var tp = $(this).closest('.tp-flipbox');
                  tp.removeClass('flipbox_add');
                  //console.log(tp);
                });
      
          });


          // jQuery(this).on('beforeChange', function(event, slick, currentSlide, nextSlide){
          //   changecolor("white", 0);
          // });
          // jQuery(this).on('afterChange', function(event, slick, currentSlide, nextSlide){
          //   changecolor("red", 30);
          // });

          // function changecolor(color, padding) { 
          //   //$('.slick-slider .slick-current').css("background-color", color);
          //   //$('.slick-slider .slick-current').css("padding", padding);
          //   //$('.slick-slider').slick("setPosition");
          // //  $('.slick-slider').slick('resize');

          //   $('.slick-current').find('.tp-flipbox__holder').css("height", '430');
          //   $('.slick-current').find('.tp-flipbox__holder').css("margin-top", '15px');

          //   $('.slick-current').next().next().find('.tp-flipbox__holder').css("height", '430');
          //   $('.slick-current').next().next().find('.tp-flipbox__holder').css("margin-top", '15px');


          //   $('.slick-current').next().find('.tp-flipbox__holder').css("height", '460');
          //   $('.slick-current').next().find('.tp-flipbox__holder').css("margin-top", '0px');

          // }
          // changecolor("red", 30);


      });

    jQuery(document).ready(function() {
      setTimeout(function() {
        jQuery('.tm-slider.slick-slider .slick-next, .post-slider.slick-slider .slick-next').addClass('fas fa-chevron-right');  
        jQuery('.tm-slider.slick-slider .slick-prev, .post-slider.slick-slider .slick-prev').addClass('fas fa-chevron-left'); 

              $('.slick-current').next().next().addClass('slick-current-last');


      }, 300);
    });

  }

  // Make sure you run this code under Elementor..
    jQuery(window).on('elementor/frontend/init', function () {
      elementorFrontend.hooks.addAction( 
        'frontend/element_ready/advanced-carousel.default',
         maAdvancedCarousel
      );
  });

