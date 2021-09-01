$(document).ready(function(){
  $('.p-downloadArea__input__button').click(function(){
    var target_list = [];
    $('input[name="target"]:checked').each(function() {
      target_list.push($(this).val());
    });
    if(target_list.length == 0) {
      alert('ダウンロードしたい画像を選んでください');
    } else {
      $.ajax({
        type: 'GET',
        url: ajaxurl,
        data: {'action': 'zip_product_image', 'product': $('#product_id').val(), 'target': target_list},
        success: function( response ){
          var res = JSON.parse(response);
          if(res['result'] == true) {
            window.location.href = res['zip_url']; 
            $.ajax({
              type: 'GET',
              url: ajaxurl,
              data: {'action': 'zip_product_image_del', 'zip_id': res['zip_id']},
              success: function( response ){
              },
              error: function( response ){
              }
            });
          }
        },
        error: function( response ){
        }
      });
    }
  });
});