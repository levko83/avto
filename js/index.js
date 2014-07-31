$(document).ready(function(){

    $(".shins_search_by_avto input").click(function(){
        avto_mod = parseInt($("#shins_avto_modification").val());
        if(avto_mod != -1){
            $.ajax({
                url: '/drives/getAvtoModification',
                type: "POST",
                dataType: 'json',
                async: false,
                data: {
                    v: avto_mod
                },
                success: function (response, textStatus) {
                    if(response != undefined && response.result != undefined && response.result == "suxx"){
                        window.location = "/shini.html/avto="+response.modif;
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown){
                    minPrice = 0;
                    maxPrice = 8000;
                }
            });
        }
        return false;
    });

    $(".disks_search_by_avto input").click(function(){
        avto_mod = parseInt($("#disks_avto_modification").val());
        if(avto_mod != -1){
            $.ajax({
                url: '/drives/getAvtoModification',
                type: "POST",
                dataType: 'json',
                async: false,
                data: {
                    v: avto_mod
                },
                success: function (response, textStatus) {
                    if(response != undefined && response.result != undefined && response.result == "suxx"){
                        window.location = "/diski.html/avto="+response.modif;
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown){
                    minPrice = 0;
                    maxPrice = 8000;
                }
            });
        }
        return false;
    });

});
