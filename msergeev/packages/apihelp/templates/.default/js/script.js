$(document).ready(function(){
    var class_height = $(window).height() - 65;
    var class_width = $(window).width() - 255;
    $(".tree").css({"height": class_height});
    $(".info").css({"height": class_height,"width": class_width});
});