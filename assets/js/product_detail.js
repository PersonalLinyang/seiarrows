$(document).ready(function(){
  $('.p-productColorThumbnailHandle').click(function(){
    $('.p-productMainImg').find('img').attr('src', $(this).data('src'));
    $('.p-productColorThumbnailHandle').removeClass('current');
    $(this).addClass('current');
  });

  $('div.p-productDetail--image__imagegroup__imagewrap').click(function(){
    $('.p-productDetail--image__topimage').find('img').attr('src', $(this).find('img').attr('src'));
  });

  $('.p-productDetail--desc__price_list_handle').click(function(){
    if($(this).hasClass('active')) {
      $(this).removeClass('active');
      $('.p-productDetail--desc__price_list[data-target="' + $(this).data('target') + '"]').slideUp();
      $('.p-productDetail--desc__price_list').removeClass('u-mb20');
      console.log('aaa');
    } else {
      $(this).addClass('active');
      $('.p-productDetail--desc__price_list[data-target="' + $(this).data('target') + '"]').slideDown();
      $('.p-productDetail--desc__price_list').addClass('u-mb20');
      console.log('000');
    }
  });
});

