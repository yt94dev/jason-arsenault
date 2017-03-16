$(document).ready(function(){
  if ($('#singleslider-index').length > 0 ) {
    $('.singleslider').slick({
      dots:true,
      // autoplay: true
    });
  }

  //Code for small business modal

  $('button#go-small').click( function(event){
    event.preventDefault();
    $('#overlay').fadeIn(400,
      function(){
        $('#modal_form-small')
          .css('display', 'block')
          .animate({opacity: 1, top: '50%'}, 200);
      });
  });

    $('.modal_close, #overlay').click( function(){
      $('#modal_form-small')
        .animate({opacity: 0, top: '45%'}, 200,
          function(){
            $(this).css('display', 'none');
            $('#overlay').fadeOut(400);
          }
        );
    });

  //Code for small business modal


  //Code for big business modal

  $('button#go-big').click( function(event){
    event.preventDefault();
    $('#overlay').fadeIn(400,
      function(){
        $('#modal_form-big')
          .css('display', 'block')
          .animate({opacity: 1, top: '50%'}, 200);
      });
  });

  $('.modal_close, #overlay').click( function(){
    $('#modal_form-big')
      .animate({opacity: 0, top: '45%'}, 200,
        function(){
          $(this).css('display', 'none');
          $('#overlay').fadeOut(400);
        }
      );
  });

  //Code for big business modal



  //Code for enterprise business modal

  $('button#go-enterprise').click( function(event){
    event.preventDefault();
    $('#overlay').fadeIn(400,
      function(){
        $('#modal_form-enterprise')
          .css('display', 'block')
          .animate({opacity: 1, top: '50%'}, 200);
      });
  });

  $('.modal_close, #overlay').click( function(){
    $('#modal_form-enterprise')
      .animate({opacity: 0, top: '45%'}, 200,
        function(){
          $(this).css('display', 'none');
          $('#overlay').fadeOut(400);
        }
      );
  });

  //Code for enterprise business modal


  // Small business modal form handler

    $("#small-plan-form").submit(function(e) {
      e.preventDefault();

      $.ajax({
        type: "POST",
        url: "pricing-action.php",
        data: $("#small-plan-form").serialize(),
        dataType: 'text',
        success: function(response) {
          response = eval(response);
          alert("Information is sent!");
          $('#modal_form-small')
            .animate({opacity: 0, top: '45%'}, 200,
              function(){
                $(this).css('display', 'none');
                $('#overlay').fadeOut(400);
              }
            );
        }
      });
    });


  // Big business modal form handler

  $("#big-plan-form").submit(function(e) {
    e.preventDefault();

    $.ajax({
      type: "POST",
      url: "pricing-action.php",
      data: $("#big-plan-form").serialize(),
      dataType: 'text',
      success: function(response) {
        response = eval(response);
        alert("Information is sent!");
        $('#modal_form-big')
          .animate({opacity: 0, top: '45%'}, 200,
            function(){
              $(this).css('display', 'none');
              $('#overlay').fadeOut(400);
            }
          );
      }
    });
  });



  // Enterprise business modal form handler

  $("#enterprise-plan-form").submit(function(e) {
    e.preventDefault();

    $.ajax({
      type: "POST",
      url: "pricing-action.php",
      data: $("#enterprise-plan-form").serialize(),
      dataType: 'text',
      success: function(response) {
        response = eval(response);
        alert("Information is sent!");
        $('#modal_form-enterprise')
          .animate({opacity: 0, top: '45%'}, 200,
            function(){
              $(this).css('display', 'none');
              $('#overlay').fadeOut(400);
            }
          );
      }
    });
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


