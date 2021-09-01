$(document).ready(function(){
  function create_html( data_list ) {
    var html = '';
    $.each(data_list, function( series_slug, series ) {
      html += '<div class="p-productTop--image--wrap">';
      html += '<div class="p-productTop--image--wrap__mainimage">';
      html += '<a href="' + series['url'] + '">';
      html += '<div><img src="' + series['image'] + '" alt="Product Top Main Image 01"></div>';
      html += '<span>' + series['name'] + '</span>';
      html += '</a>';
      html += '</div>';
      html += '<ul class="p-productTop--image--wrap__imagegroup">';
      $.each(series['product_list'], function( product_id, product ) {
        html += '<li class="p-productTop--image--wrap__imagegroup__imagewrap">';
        html += '<a href="' + product['url'] + '">';
        html += '<div><img src="' + product['image'] + '" alt="Product Top 01 Image 01"></div>';
        html += '<span>' + product['product_name'] + '</span>';
        html += '</a>';
        html += '</li>';
      });
      html += '</ul>';
      html += '</div>';
    });
    const spinner = document.getElementById('loading');
    spinner.classList.add('loaded');
    return html;
  }

  function get_product_list() {
    var data = {'action': 'get_product_list'};
    if($('.p-productTop--abcmenu__nav').find('li.is_active').length) {
      var first_letter = $('.p-productTop--abcmenu__nav').find('li.is_active').find('.p-productTop--abcmenu__nav__item').text();
      if(first_letter != 'ALL') {
        data['first_letter'] = first_letter;
      }
    }
    if($('.search-input').val()) {
      var key_word = $('.search-input').val();
      data['key_word'] = key_word;
    }
    if($('#product_category_id').length) {
      var product_category = $('#product_category_id').val();
      data['product_category'] = product_category;
    }
    $.ajax({
      type: 'GET',
      url: ajaxurl,
      data: data,
      success: function( response ){
        var res = JSON.parse(response);
        if(res['result'] == true) {
          var html = create_html(res['data_list']);
          $('.p-productTop--image').html(html);
        }
      },
      error: function( response ){
      }
    });
  }

  $('.p-productTop--abcmenu__nav__item').click(function(){
    if($(this).closest('li').hasClass('is_active')) {
      $(this).closest('li').removeClass('is_active');
    } else {
      $('.p-productTop--abcmenu__nav').find('li').removeClass('is_active');
      $(this).closest('li').addClass('is_active');
    }
    get_product_list();
  });

  $('.search-submit').click(function(){
    get_product_list();
  });

  $(".search-input").keydown(function() {
    if( window.event.keyCode == 13 ) {
      get_product_list();
      return false;
    }
  });

  get_product_list();
});
