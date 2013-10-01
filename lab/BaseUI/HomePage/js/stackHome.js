var stackHome = {
    animationA: function(){
      var logo = document.getElementById("logo");
      logo.style.opacity = 0;
      var opacity = 0;
      function changeOpacity() {
        opacity = opacity > 1 ? clearInterval(interval) : opacity + 0.01;
        logo.style.opacity = opacity;
      }
      var interval = setInterval(changeOpacity,10);
    },
    animationB: function(){
        var logo = document.getElementById("logo");
        logo.src = "./images/logo.png";
        logo.style.opacity = 0;
        var opacity = 0.5;
        function changeOpacity() {
            opacity = opacity > 1 ? clearInterval(interval) : opacity + 0.01;
            logo.style.opacity = opacity;
        }
        var interval = setInterval(changeOpacity,15);
    },
    init: function(){
      this.animationA();
      setTimeout(this.animationB,500);
      // this.animationB();
    }
};

(function(){
    stackHome.init();
}).call(this);