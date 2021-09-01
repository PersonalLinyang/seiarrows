$(function () {


  // $(".l-header").load("../../inc/header.html");
  // $(".l-footer").load("../../inc/footer.html");


  $(".t-page--slider").slick({
    dots: true,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: true,
    prevArrow: false,
    nextArrow: false,
    variableWidth: true,
    slidesToShow: 1,
    centerMode: false,
    responsive: [{
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
      }
    }, ]

  })

  $(".p-productSeries--slider").slick({
    dots: true,
    autoplay: false,
    autoplaySpeed: 3000,
    arrows: true,
    prevArrow: false,
    nextArrow: false,
    variableWidth: true,
    slidesToShow: 1,
    centerMode: false,
    responsive: [{
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
      }
    }, ]

  })

  $(".p-featuredTop--slider").slick({
    dots: true,
    autoplay: false,
    autoplaySpeed: 3000,
    arrows: true,
    prevArrow: false,
    nextArrow: false,
    variableWidth: true,
    slidesToShow: 1,
    centerMode: false,
    responsive: [{
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
      }
    }, ]

  })
  
  $(".head-search-button").click(function(){
    $(this).closest('form').submit();
  });


const trigger = new ScrollTrigger.default()
trigger.add('.js-scrollAnimation', {
  once: true,
})
$('.p-showroomSlider__thumbnail__item').click(function(){
  $('.p-showroomSlider__mainimg').find('img').attr('src', $(this).data('src'));
  $('.p-showroomSlider__thumbnail__item').removeClass('is-current');
  $(this).addClass('is-current');
});

let ua = window.navigator.userAgent;

if(ua.indexOf('Edge') != -1 || ua.indexOf('Edg') != -1 || ua.indexOf('Trident') != -1 || ua.indexOf('MSIE') != -1) {
  $("head").append('<style>body{font-weight: 300;}</style>');
 } else {
    $("head").append('<style>body{font-weight: 100;}</style>');
  }

})
