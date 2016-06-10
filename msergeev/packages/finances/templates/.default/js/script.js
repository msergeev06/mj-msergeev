/**Левый столбец (счета, метки, журнал операций)*/
$(document).on("ready",function(){
    /**Переключение табов (счета, метки, журнал)*/
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
    /**При наведении на счет, показываем описание и кнопки*/
    $(".item").hover(function(){
        var id = $(this).data("id");
        $(this).find(".description").show();
        $(this).find(".buttons").show();
    },function(){
        var id = $(this).data("id");
        $(this).find(".description").hide();
        $(this).find(".buttons").hide();
    });
    /**При наведении на описание счета, скрываем его*/
    $(".description").hover(function(){
        $(this).hide();
    });
    /**При клике на категории разворачиваем/сворачиваем ее*/
    $(".header").on("click",function(){
        var id = $(this).data("id");
        var cat = $(this).data("cat");
        var stat;
        if ($(this).hasClass("open"))
        {
            $(this).removeClass("open");
            $(".list-"+id).hide();
            stat = 0;
        }
        else
        {
            $(this).addClass("open");
            $(".list-"+id).show();
            stat = 1;
        }
        $.ajax({
            type: "POST",
            url: "/msergeev/packages/finances/tools/accounts_category_deploy.php",
            data: {
                category: cat,
                status: stat
            },
            success:function(data){},
            dataType: "json"
        });
    });
    /**Кнопка добавления операции по счету*/
    $(".item .button.add").on("click",function(){
        var id = $(this).parent().parent().data("id");
        //alert("Click add #"+id);
    });
    /**Кнопка редактирования счета*/
    $(".item .button.edit").on("click",function(){
        var id = $(this).parent().parent().data("id");
        //alert("Click edit #"+id);
    });
    /**Кнопка добавления/убирания счета в/из избранного*/
    $(".item .button.like").on("click",function(){
        var id = $(this).parent().parent().data("id");
        if ($(this).hasClass("checked"))
        {
            //alert("Click unlike #"+id);
        }
        else
        {
            //alert("Click like #"+id);
        }
    });
    /**Кнопка удаления счета*/
    $(".item .button.delete").on("click",function(){
        var id = $(this).parent().parent().data("id");
        //alert("Click delete #"+id);
    });
    /**При наведении на метку, показываем кнопки*/
    $(".label").hover(function(){
        var id = $(this).data("id");
        $(this).find(".buttons").show();
    },function(){
        var id = $(this).data("id");
        $(this).find(".buttons").hide();
    });
    /**Кнопка редактирования метки*/
    $(".label .button.edit").on("click",function(){
        var id = $(this).parent().parent().data("id");
        //alert("Click edit #"+id);
    });
    /**Кнопка удаления метки*/
    $(".label .button.delete").on("click",function(){
        var id = $(this).parent().parent().data("id");
        //alert("Click delete #"+id);
    });
    /**При наведении на запланированную операцию, показываем кнопки*/
    $(".plan").hover(function(){
        var id = $(this).data("id");
        $(this).find(".buttons").show();
    },function(){
        var id = $(this).data("id");
        $(this).find(".buttons").hide();
    });
    /**Кнопка подтверждения запланированной операции*/
    $(".plan .button.confirm").on("click",function(){
        var id = $(this).parent().parent().data("id");
        //alert("Click confirm #"+id);
    });
    /**Кнопка редактирования запланированной операции*/
    $(".plan .button.edit").on("click",function(){
        var id = $(this).parent().parent().data("id");
        //alert("Click edit #"+id);
    });
    /**Кнопка удаления запланированной операции*/
    $(".plan .button.delete").on("click",function(){
        var id = $(this).parent().parent().data("id");
        //alert("Click delete #"+id);
    });
});