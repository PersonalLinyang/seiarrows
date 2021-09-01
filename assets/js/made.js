$(function () {


  var accordion = $('.p-madeorderTop--section__listgroup--menu').find('.p-madeorderTop--section__listgroup--menu__accordion');
  accordion.find('> ul').animate({ height: 'toggle' }, 0);
  accordion.find('> a').attr({ 'role': 'button' });

  accordion.on('click', ' > a', function (event) {
    event.preventDefault();
    var parent = $(this).parent(),
        ul = $(this).find(' ~ ul');
    if (parent.hasClass('open')) {
      parent.removeClass('open');
    } else {
      parent.addClass('open');
    }
    ul.animate({ height: 'toggle' }, 240);
    return false;
  });

})
