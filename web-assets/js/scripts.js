(function ($) {
  "use strict";


  // =======Preloader========>>>>>
  // let preloaderTimeout = 4500;
  // setTimeout(function () {
  //   $('body').addClass('loaded');
  // }, preloaderTimeout);
  // =======Preloader========>>>>>

  $(window).on("load", function () {
    $(".preloader").delay(350).fadeOut("slow");
  });




  // =======Sticky-header========>>>>>
  $(window).on('scroll', function () {
    var scroll = $(window).scrollTop();
    if (scroll < 50) {
        $(".sticky-navbar").removeClass("sticky");
        $('.back-to-top').hide();
    } else {
        $(".sticky-navbar").addClass("sticky");
        $('.back-to-top').show();
    }
  });
  // =======Sticky-header========>>>>>



    // =======Social share========>>>>>
    if($('.share-link').length > 0){
      $('.share-link').on('click', function(event){
        event.preventDefault();
        let iconList = $('.social-icons-list');
        iconList.toggleClass('social-icons-toggle');
      });
    }
    // =======Social share========>>>>>


    // =======CounterUp JS-Odometer========>>>>>   
    if($('.odometer').length > 0){
      $(window).on('scroll', function () {
        let preloaderTimeout = 2500;
        function winScrollPosition() {
            var scrollPos = $(window).scrollTop(),
                winHeight = $(window).height();
            var scrollPosition = Math.round(scrollPos + (winHeight / .07));
            return scrollPosition;
        }
        var elemOffset = $('.odometer').offset().top;
        if (elemOffset < winScrollPosition()) {

          setTimeout(function () {
            $('.odometer').each(function () {
              $(this).html($(this).data('count-to'));
            });
          }, preloaderTimeout + 200);          
        }
    });
  }
 
  // =======CounterUp JS-Odometer========>>>>>


  // =======Circle========>>>>>
  const text = document.querySelector ('.rotate-text p');
  if(text){
  text.innerHTML = text.innerText.split("").map(
      (char, i)=>
      `<span style="transform:rotate(${i*9.6}deg)">${char}</span>`
  ).join("");
  }

  const text2 = document.querySelector ('.rotate-text2 p');
  if(text2){
  text2.innerHTML = text2.innerText.split("").map(
      (char, i)=>
      `<span style="transform:rotate(${i*9.6}deg)">${char}</span>`
  ).join("");
  }

  const text3 = document.querySelector ('.rotate-text3 p');
  if(text3){
    text3.innerHTML = text3.innerText.split("").map(
        (char, i)=>
        `<span style="transform:rotate(${i*9.6}deg)">${char}</span>`
    ).join("");
  }
  
  // =======Circle========>>>>>


  

    // =======Swiper .ticket-swiper========>>>>>
    if($('.ticket-swiper').length > 0){
      new Swiper(".ticket-swiper", {
        loop: true,    
        grabCursor: true,
        slidesPerView: 1,                       
        pagination: {
          el: ".ticket-swiper-pagination",
          clickable: true,    
        },            
      });
    }
    // =======Swiper .ticket-swiper========>>>>>


  // =======Swiper .lineup-swiper========>>>>>
  if($('.lineup-swiper').length > 0){
    new Swiper(".lineup-swiper", {
      loop: true,    
      grabCursor: true,
      breakpoints: {   
        380: {
          slidesPerView: 1,
          slidesPerGroup: 1,
          spaceBetween: 30        
        },        
        430: {
          slidesPerView: 2,
          slidesPerGroup: 2,
          spaceBetween: 20
        },      
        900: {
          slidesPerView: 3,
          spaceBetween: 20
        }
      },     
      
      pagination: {
        el: ".lineup-swiper-pagination",
        type: "progressbar",      
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      
    });
  } 
  // =======Swiper .lineup-swiper========>>>>>



    // =======Swiper .lineup-swiper-2========>>>>>
    if($('.lineup-swiper-2').length > 0){
      new Swiper(".lineup-swiper-2", {           
        grabCursor: true,
        breakpoints: {   
          380: {
            slidesPerView: 1,
            slidesPerGroup: 1,
            spaceBetween: 30        
          },        
          430: {
            slidesPerView: 2,
            slidesPerGroup: 2,
            spaceBetween: 20
          },      
          900: {
            slidesPerView: 3,
            spaceBetween: 20
          }
        },     
        
        pagination: {
          el: ".lineup-swiper-pagination",
          type: "progressbar",      
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        
      });
    } 
    // =======Swiper .lineup-swiper-2========>>>>>


    // =======Swiper .highlight-swiper========>>>>>
      new Swiper(".highlight-swiper", {
        loop: true,    
        grabCursor: true,
        spaceBetween: 20,
        breakpoints: {                  
          430: {
            slidesPerView: 1,
            slidesPerGroup: 1,
            spaceBetween: 20
          },      
          768: {
            slidesPerView: 2,
            slidesPerGroup: 1,
            spaceBetween: 20
          },
          1100: {
            slidesPerView: 3,
            slidesPerGroup: 1,
            spaceBetween: 20
          }
        },           
        pagination: {
          el: ".swiper-pagination",
          type: "progressbar",      
        },      
      });


        //highlight-swiper-overflow========>>>>> 
        new Swiper(".highlight-swiper-overflow", {         
          grabCursor: true,
          spaceBetween: 20,
          breakpoints: {                  
            430: {
              slidesPerView: 1,
              slidesPerGroup: 1,
              spaceBetween: 20
            },      
            768: {
              slidesPerView: 2,
              slidesPerGroup: 1,
              spaceBetween: 20
            },
            1100: {
              slidesPerView: 3,
              slidesPerGroup: 1,
              spaceBetween: 20
            }
          },    
          pagination: {
            el: ".swiper-pagination",
            type: "progressbar",      
          },      
        });
        //highlight-swiper-overflow========>>>>>

    
    // =======Swiper .highlight-swiper========>>>>>


    // =======Swiper .highlight-2-swiper========>>>>>
    new Swiper(".highlight-2-swiper", {
      loop: true,    
      grabCursor: true,
      spaceBetween: 20,
      breakpoints: {                      
        430: {
          slidesPerView: 1,
          slidesPerGroup: 1,
          spaceBetween: 20
        },      
        993: {
          slidesPerView: 2,
          slidesPerGroup: 1,
          spaceBetween: 20
        },
        1400: {
          slidesPerView: 3,
          slidesPerGroup: 1,
          spaceBetween: 20
        }
      },
      pagination: {
        el: ".swiper-pagination",
        type: "progressbar",      
      },      
    });
    // =======Swiper .highlight-2-swiper========>>>>>


  // =======Swiper .brand-swiper========>>>>>
  new Swiper(".brand-swiper", {
    loop: true,    
    grabCursor: true,      
    breakpoints: {   
      380: {
        slidesPerView: 2,
        slidesPerGroup: 2,
        spaceBetween: 20        
      },        
      420: {
        slidesPerView: 3,
        slidesPerGroup: 2,
        spaceBetween: 20
      },      
      900: {
        slidesPerView: 4,
        slidesPerGroup: 2,
        spaceBetween: 30
      },

      1200: {
        slidesPerView: 6,
        slidesPerGroup: 2,
        spaceBetween: 40
      }
    },     
    
    pagination: {
      el: ".swiper-pagination",
      type: "progressbar",      
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    
  });
  // =======Swiper .brand-swiper========>>>>>


  // =======Swiper .brand-2-swiper========>>>>>
  new Swiper(".brand-2-swiper", {
    loop: true,    
    grabCursor: true,      
    breakpoints: {                
      420: {
        slidesPerView: 1,
        slidesPerGroup: 2, 
        spaceBetween: 10,
        centeredSlides: true,
      },      
      720: {
        slidesPerView: 3,
        slidesPerGroup: 2,
        spaceBetween: 40
      },
      900: {
        slidesPerView: 4,
        slidesPerGroup: 2,
        spaceBetween: 60
      },
      1200: {
        slidesPerView: 5,
        slidesPerGroup: 2,
        spaceBetween: 90
      }
    },     
    
    pagination: {
      el: ".swiper-pagination",
      type: "progressbar",      
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    
  });
  // =======Swiper .brand-2-swiper========>>>>>


    // =======Swiper .blog-swiper========>>>>>
    new Swiper(".blog-swiper", {
      loop: false,    
      // grabCursor: true,
      spaceBetween: 20,

      breakpoints: { 
        420: {
          slidesPerView: 1,
          slidesPerGroup: 1,
          spaceBetween: 20
        },      
        768: {
          slidesPerView: 2,
          slidesPerGroup: 1,
          spaceBetween: 30
        },
      },     
      
      pagination: {
        el: ".swiper-pagination",
        type: "progressbar",      
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      
    });
    // =======Swiper .blog-swiper========>>>>>


    // =======Swiper .blog-swiper-2========>>>>>
    new Swiper(".blog-swiper-2 ", {
      loop: true,    
      grabCursor: true,
      spaceBetween: 20,
      breakpoints: {  
                
        430: {
          slidesPerView: 1,
          slidesPerGroup: 1,
          spaceBetween: 20
        },      
        700: {
          slidesPerView: 2,
          slidesPerGroup: 1,
          spaceBetween: 20
        },
        1100: {
          slidesPerView: 3,
          slidesPerGroup: 1,
          spaceBetween: 20
        }
      },     
      
      pagination: {
        el: ".swiper-pagination",
        type: "progressbar",      
      },      
    });
    // =======Swiper .blog-swiper-2========>>>>>


    // =======Swiper .blog-swiper-3========>>>>>
    new Swiper(".blog-swiper-3 ", {
      loop: true,    
      grabCursor: true,
      spaceBetween: 30,
      breakpoints: {  
                
        430: {
          slidesPerView: 1,
          slidesPerGroup: 1,
          spaceBetween: 30
        },      
        700: {
          slidesPerView: 2,
          slidesPerGroup: 1,
          spaceBetween: 30
        },        
      },     
      
      pagination: {
        el: ".swiper-pagination",
        type: "progressbar",      
      },      
    });
    // =======Swiper .blog-swiper-3========>>>>>


    // =======Swiper .merchandise-swiper========>>>>>
    new Swiper(".merchandise-swiper", {
      loop: true,    
      grabCursor: true,
      spaceBetween: 30,
      breakpoints: { 
        420: {
          slidesPerView: 1,
          slidesPerGroup: 1,
          spaceBetween: 30
        },      
        768: {
          slidesPerView: 2,
          slidesPerGroup: 1,
          spaceBetween: 30
        },
        1200: {
          slidesPerView: 3,
          slidesPerGroup: 1,
          spaceBetween: 20
        },
        1500: {
          slidesPerView: 4,
          slidesPerGroup: 1,
          spaceBetween: 20
        },
      },     
      
      pagination: {
        el: ".swiper-pagination",
        type: "progressbar",      
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      
    });
    // =======Swiper .merchandise-swiper========>>>>>


    // =======Swiper .blog-2-swiper========>>>>>
    new Swiper(".blog-2-swiper", {
      loop: true,    
      // grabCursor: true,
      spaceBetween: 30,
      breakpoints: { 
        769: {
          slidesPerView: 1,
          slidesPerGroup: 1,
          spaceBetween: 30
        },      
        770: {
          slidesPerView: 2,
          slidesPerGroup: 1,
          spaceBetween: 30
        },
        1100: {
          slidesPerView: 3,
          slidesPerGroup: 1,
          spaceBetween: 30
        }
      },           
      pagination: {
        el: ".swiper-pagination",
        type: "progressbar",      
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },      
    });
    // =======Swiper .blog-2-swiper========>>>>>


    // =======Swiper .pricing-swiper========>>>>>
    new Swiper(".pricing-swiper", {
      loop: true,    
      grabCursor: true,
      spaceBetween: 30,
      breakpoints: { 
        500: {
          slidesPerView: 1,
          slidesPerGroup: 1,
        },      
        769: {
          slidesPerView: 2,
          slidesPerGroup: 1,
          spaceBetween: 30
        },

        1200: {
          slidesPerView: 3,
          slidesPerGroup: 1,
          spaceBetween: 30
        }
      },     
      
      pagination: {
        el: ".swiper-pagination",
        type: "progressbar",      
      },
                
    });
    // =======Swiper .pricing-swiper========>>>>>


  // =========Button(Increse-Decrese)=========>>>>>
  var buttonPlus  = $(".plus-icon");
  var buttonMinus = $(".dash-icon");

  var incrementPlus = buttonPlus.click(function() {
    var $n = $(this)
    .parent(".ticket-amounts")
    .find(".input-number");
    $n.val(Number($n.val())+1 );
  });

  var incrementMinus = buttonMinus.click(function() {
    var $n = $(this)
    .parent(".ticket-amounts")
    .find(".input-number");
    var amount = Number($n.val());
    if (amount > 1) {
      $n.val(amount-1);
    }
  });
  // =========Button(Increse-Decrese)=========>>>>>


  // =========Ticket-Section Radio-Input=========>>>>>
      $('input:radio:checked').parent().addClass("radio-checked-bg border-transparent");
      $('input:radio').click(function () {
        $('input:not(:checked)').parent().removeClass("radio-checked-bg border-transparent");
        $('input:checked').parent().addClass("radio-checked-bg border-transparent");
      });
  // =========Ticket-Section Radio-Input=========>>>>>

  

  // =======Magnific-PopUp========>>>>>    
  $('.image-link').magnificPopup({
    type: 'image',
    gallery:{
      enabled:true
    },
    zoom: {
      enabled: true,
      duration: 300, // don't foget to change the duration also in CSS
      opener: function(element) {
          return element.find('img');
      }
    }  
  });


  // Video popup
	$('.video-popup-link').magnificPopup({
    disableOn: 200,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
  });
  // =======Magnific-PopUp========>>>>>


new WOW().init();


})(jQuery);