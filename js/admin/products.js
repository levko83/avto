/**
 * Created by Ifaliuk on 17.03.14.
 */
$(document).ready(function(){

    $(".img a").click(function(){
        var img_id = $(this).parent().parent().attr("img-id");
        var prefix = $(this).parent().parent().attr("prefix");
        $(this).parent().parent().remove();
        $("#" + prefix + "_delImage_" + img_id).val(1);
        return false;
    });

});


