$(function() {

  // Responsive menu
  $('.burger').sidr({
    source: '#main-nav',
    displace: false,
    side: 'right',
    name: 'sidr-main',
  });

  $('.sidr-class-close-btn').click(function() {
    $.sidr('close', 'sidr-main');
  });

  $('.sidr-class-has-sub > a').click(function(e) {
    e.preventDefault();
    $(this).next().slideToggle();
  });

});
