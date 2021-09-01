$(document).ready(function(){
  var showPage = function(page) {
    $('.pager_handle').removeClass('active');
    $('.pager_handle[data-page="' + page + '"]').addClass('active');
    $('.pager_handle').find('a').removeClass('active');
    $('.pager_handle[data-page="' + page + '"]').find('a').addClass('active');
    $('.p-search-result__List__item').hide();
    $('.p-search-result__List__item[data-page="' + page + '"]').show();
    if(page != '1') {
      $('.pre').show();
    } else {
      $('.pre').hide();
    }
    var page_number = $('.pagination').data('page_number');
    if(page != page_number) {
      $('.next').show();
    } else {
      $('.next').hide();
    }
  }
  
  $('.pager_handle').click(function(){
    var page = $(this).data('page');
    showPage(page);
  });
  
  $('.next').click(function(){
    var page = $('.pager_handle.active').next().data('page');
    showPage(page);
  });
  
  $('.pre').click(function(){
    var page = $('.pager_handle.active').prev().data('page');
    showPage(page);
  });
  
  $('.search-submit').click(function(){
    $(this).closest('form').submit();
  });
});