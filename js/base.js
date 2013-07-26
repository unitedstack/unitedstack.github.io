$(document).ready(function(){
  $(window).scroll(function (event) {
    var y = $(this).scrollTop();
    if (y > 50) {
      $('#header h1 a').attr('href', '#header');
      var logoSrc = $('#header h1 a img').attr('src').replace('datavisualization_logo.png', 'datavisualization_up.png');
      $('#header h1 a img').attr('src', logoSrc);
      $('#header').addClass('overlayed');
      $('#nav').addClass('overlayed');
    } else {
      $('#header h1 a').attr('href', '/');
      var logoSrc = $('#header h1 a img').attr('src').replace('datavisualization_up.png', 'datavisualization_logo.png');
      $('#header h1 a img').attr('src', logoSrc);
      $('#header').removeClass('overlayed');
      $('#nav').removeClass('overlayed');
    }
  });
  $('#header h1 a[href*="header"]').live('click', function(){
    $('html, body').animate({scrollTop:0},{duration:500, queue:true, complete:function(){
      $('#header h1 a').attr('href', '/');
      }
    });
    return false;
  });
  $('#nav li a').qtip({
    show: {
      delay: 300,
      effect: "fade"
    },
    hide: {
      effect: "fade"
    },
    style: {
      classes: 'ui-tooltip-datavis'
    },
    position: {
      my: 'top center',
      at: 'bottom center',
      adjust: {
        y: 4
      }
    },
  });
});

// For random Body background
$(function(){
  var bgArr = [
  'url(images/bg6.jpg) no-repeat fixed',
  'url(images/bg7.jpg) no-repeat fixed',
  'url(images/bg8.jpg) no-repeat fixed',
  'url(images/bg9.jpg) no-repeat fixed',
  'url(images/bg10.jpg) no-repeat fixed'
  ];
  var index = Math.floor(Math.random() * bgArr.length);
  bg = bgArr[index];
  $('body').css({'background' : bg});
})
