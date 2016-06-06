/*Левый столбец (счета, метки, журнал операций*/
$(document).on("ready",function(){
    $(".tab-menu div").on("click",function(){
        var id = $(this).data("id");
        $(".tab-1").removeClass("active");
        $(".tab-2").removeClass("active");
        $(".tab-3").removeClass("active");
        $(".tab-"+id).addClass("active");
        if (id == 1)
        {
            $(".content-1").show();
            $(".content-2").hide();
            $(".content-3").hide();
        }
        else if (id == 2)
        {
            $(".content-1").hide();
            $(".content-2").show();
            $(".content-3").hide();
        }
        else
        {
            $(".content-1").hide();
            $(".content-2").hide();
            $(".content-3").show();
        }
    });
    $(".item").hover(function(){
        var id = $(this).data("id");
        $(this).find(".description").show();
    },function(){
        var id = $(this).data("id");
        $(this).find(".description").hide();
    });
    $(".description").hover(function(){
        $(this).hide();
    });
    $(".header").on("click",function(){
        var id = $(this).data("id");
        if ($(this).hasClass("open"))
        {
            $(this).removeClass("open");
            $(".list-"+id).hide();
        }
        else
        {
            $(this).addClass("open");
            $(".list-"+id).show();
        }
    });
});