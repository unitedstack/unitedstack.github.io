$(document).ready(function(){
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
  'url(images/bg8.jpg) no-repeat fixed'
  ];
  var index = Math.floor(Math.random() * bgArr.length);
  bg = bgArr[index];
  $('body').css({'background' : bg});
})
