$(".rozwin").click(function(){
    $(".hide").addClass("show");
    $(".zwin").addClass("show_fa");
    $(".rozwin").addClass("hide");
});

$(".zwin").click(function(){
    $(".hide").removeClass("show");
    $(".zwin").removeClass("show_fa");
    $(".rozwin").removeClass("hide");
});