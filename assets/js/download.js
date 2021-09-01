$(document).ready(function(){
  $('.p-downloadArea__input__button').click(function(){
    $.ajax({
      type: 'GET',
      url: ajaxurl,
      data: {'action': 'download_3d_cad', 'password': $('.p-downloadArea__input__text').val(), 'product': $('#product_id').val()},
      success: function( response ){
        var res = JSON.parse(response);
        if(res['result'] == true) {
          window.location.href = res['zip_url']; 
        } else {
          alert('パスワードが間違いました');
        }
      },
      error: function( response ){
      }
    });
  });
});