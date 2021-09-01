$(document).ready(function(){
  function create_html( data_list ) {
    html = '<ul class="p-worksTop--image__imagegroup u-mb40">';
    var counter = 0;
    $.each(data_list, function( works_id, works ) {
      if(counter == 0) {
         html += '<li class="p-worksTop--image__imagegroup__imagewrap">';
      } else {
         html += '<li class="p-worksTop--image__imagegroup__imagewrap u-ml40">';
       }
      html += '<a href="' + works['url'] + '">';
      html += '<img src="' + works['image'] + '" alt="Works Image ' + works['post_name'] + '">';
      html += '<span>' + works['works_name'] + '</span>';
      html += '</a>';
      html += '</li>';
      counter++;
      if(counter == 3) {
        counter = 0;
        html += '</ul><ul class="p-worksTop--image__imagegroup u-mb40">';
      }
    });
    html += '</ul>';
    return html;
  }

  function get_works_list() {
    var data = {'action': 'get_works_list'};
    if($('.search-input').val()) {
      var key_word = $('.search-input').val();
      data['key_word'] = key_word;
    }
    if($('#genre_id').length) {
      var genre = $('#genre_id').val();
      data['genre'] = genre;
    }
    $.ajax({
      type: 'GET',
      url: ajaxurl,
      data: data,
      success: function( response ){
        var res = JSON.parse(response);
        if(res['result'] == true) {
          var html = create_html(res['data_list']);
          $('.p-worksTop--image').html(html);
        }
      },
      error: function( response ){
      }
    });
  }

  $('.search-submit').click(function(){
    get_works_list();
  });

  $(".search-input").keydown(function() {
    if( window.event.keyCode == 13 ) {
      get_works_list();
      return false;
    }
  });


  get_works_list();
});
