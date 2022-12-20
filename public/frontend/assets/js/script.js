// navbar part sticky menu js start
$(window).scroll(function(){
  if($(window).scrollTop()){
    $('.navbar').addClass('stciky');
  }else{
    $('.navbar').removeClass('stciky');
  }
});
// navbar part sticky menu js end

// category part js start
$(".category-slider").slick({
    arrows:true,
    centerMode: true,
    slidesToShow: 3,
    autoplay: true,
    autoplaySpeed: 5000,
    nextArrow: '<i class="fa-solid fa-arrow-right next"></i>',
    prevArrow: '<i class="fa-solid fa-arrow-left prev"></i>',
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });
  // category part js end

  $(".feed-slick").slick({
    arrows:false,
    slidesToShow: 2,
    slidesToScroll : 1,
    autoplay: true,
    autoplaySpeed: 5000,
    // nextArrow: '<i class="fa-solid fa-arrow-right next"></i>',
    // prevArrow: '<i class="fa-solid fa-arrow-left prev"></i>'
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });