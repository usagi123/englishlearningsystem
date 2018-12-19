//Scrolling navbar
function checkScroll(){
    var startY = $('.navbar').height() * 2; //The point where the navbar changes in px
  
    if($(window).scrollTop() > startY){
        $('.navbar').addClass("scrolled");
    }else{
        $('.navbar').removeClass("scrolled");
    }
}
  
if($('.navbar').length > 0){
    $(window).on("scroll load resize", function(){
        checkScroll();
    });
}
  
(function($) {
    var navbarCollapse = function() {
        if ($(".navbar").offset().top > 100) {
            $(".navbar").css("background","rgba(255,0,0,1)");
        } else {
            $(".navbar").css("background","rgba(1,1,1,1)");
        }
    };
    // Collapse now if page is not at top
    navbarCollapse();
    // Collapse the navbar when page is scrolled
    $(window).scroll(navbarCollapse);
})(jQuery);

