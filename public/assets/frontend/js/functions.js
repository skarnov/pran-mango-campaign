(function ($){
    'use strict';
    jQuery(document).ready(function () {
      
      //swiper initaial js
      var clientContainer = new Swiper('.client-container', {
          slidesPerView: 5,
         grabCursor: true,
          autoplay: {
            delay: 5500,
            disableOnInteraction: false
          },
          loop: true,
          spaceBetween: 50,
          breakpoints: {
            990: {
              slidesPerView: 4,
              spaceBetween: 30
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            640: {
              slidesPerView: 2,
              spaceBetween: 0
            }
          }
        });


       //swiper initaial js
      var clientContainer = new Swiper('.testimonial-container', {
          slidesPerView: 3,
         grabCursor: true,
          autoplay: {
            delay: 5500,
            disableOnInteraction: false
          },
          loop: true,
          spaceBetween: 50,
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          breakpoints: {
            990: {
              slidesPerView: 2,
              spaceBetween: 30
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 30
            }
          }
        });


      //swiper initaial js
      var clientContainer2 = new Swiper('.testimonial-container2', {
          slidesPerView: 1,
           grabCursor: true,
           spaceBetween: 30,
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          // autoplay: {
          //   delay: 5500,
          //   disableOnInteraction: false
          // },
          loop: true
        });

      //swiper initaial js
      var clientContainer = new Swiper('.client-container2', {
          slidesPerView: 4,
         grabCursor: true,
          autoplay: {
            delay: 5500,
            disableOnInteraction: false
          },
          loop: true,
          spaceBetween: 50,
          breakpoints: {
            990: {
              slidesPerView: 4,
              spaceBetween: 30
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            640: {
              slidesPerView: 2,
              spaceBetween: 0
            }
          }
        });


      //lightcase
      $('a[data-rel^=lightcase]').lightcase();

    });
})(jQuery);

