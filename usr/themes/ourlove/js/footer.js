$(function(){
    $(window).scroll(function(){if ($(window).scrollTop()>100){$("#totop").fadeIn('slow');}else{$("#totop").fadeOut('slow');}});
    $("#totop").click(function(){$('body,html').animate({scrollTop:0},500);return false;});
});