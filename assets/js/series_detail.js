$(document).ready(function(){
  $('div.p-productSeries--section--item__imagegroup--wrap').click(function(){
    var href = $(this).data('href');
    if(href) {
      $('.p-productSeries--section--item__image.case').html('<a href="' + href + '"><img src="' + $(this).find('img').attr('src') + '" alt="Series Image 06" /></a>');
    } else {
      $('.p-productSeries--section--item__image.case').html('<img src="' + $(this).find('img').attr('src') + '" alt="Series Image 06" />');
    }
  });
});
