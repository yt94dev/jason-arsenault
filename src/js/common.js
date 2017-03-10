$(document).ready(function(){
  $('.singleslider').slick({
    dots:true,
    // autoplay: true
  });

});

// hamburger menu
$('.hamburger-menu').on('click', function(){
  var menuOpenState = $('.navigation').css('display');
  if (menuOpenState == 'none'){
    $('.navigation').slideDown( 1000, function() {
      $( this ).css('display', 'block');
    });
    $('.hamburger-menu > .fa').removeClass('fa-bars');
    $('.hamburger-menu > .fa').addClass('fa-times');
  }
  else if(menuOpenState == 'block'){
    $('.navigation').slideUp( 1000, function() {
      $( this ).css('display', 'none');
    });
    $('.hamburger-menu > .fa').removeClass('fa-times');
    $('.hamburger-menu > .fa').addClass('fa-bars');
  }
  else{
    $('.navigation').css('display', 'block');
  }
})


