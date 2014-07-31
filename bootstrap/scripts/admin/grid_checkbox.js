$(document).ready(function(){
    $("table .checkbox-column").each(function(){
        var tmp = $(this).find("span").html();
        $(this).html(tmp);
    });
});


