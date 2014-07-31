/**
 * Created by Ifaliuk on 06.12.13.
 */
$(document).ready(function(){
    $(".filter_label").toggle(
        function(){
            if($(this).hasClass("span3")){
               $(this).next().find("select").val("");
            }else if(!$(this).hasClass("ch")){
               $(this).parent().next().find("input[type=checkbox]").attr("checked", "checked");
            }
            $.uniform.update();
        },
        function(){
            if($(this).hasClass("span3")){
                $(this).next().find("select").val("");
            }else if(!$(this).hasClass("ch")){
                $(this).parent().next().find("input[type=checkbox]").removeAttr("checked");
            }
            $.uniform.update();
        }
    );


    $("#shinsSlider").slider({
        range: true,
        min: nmsp.shins_min_price,
        max: nmsp.shins_max_price,
        values: [nmsp.shins_min_price, nmsp.shins_max_price],
        slide: function(event, ui) {
            $("#Shins_priceMin").val(ui.values[0]);
            $("#Shins_priceMax").val(ui.values[1]);
        }
    });


    $("#searchDisks").click(function(){
        $.fn.yiiGridView.update('disksFilterGrid');
        return false;
    });

    $("#searchShins").click(function(){
        $.fn.yiiGridView.update('shinsFilterGrid');
        return false;
    });

    $("#searchShinsClear").click(function(){
        $("#shinsFormFilter").get(0).reset();
        $.uniform.update();
        $.fn.yiiGridView.update('shinsFilterGrid');
        return false;
    });

    $("#searchDisksClear").click(function(){
        $("#disksFormFilter").get(0).reset();
        $.uniform.update();
        $.fn.yiiGridView.update('disksFilterGrid');
        return false;
    });


});
