$(document).ready(function(){

    var minPrice, maxPrice;

    var queryParameters = {}, queryString = location.search.substring(1),
        re = /([^&=]+)=([^&]*)/g, m;
    while (m = re.exec(queryString)) {
        queryParameters[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
    }

    switch(queryParameters["sort"]){
        case "price":
            $("#selSort").val("price");
            break;
        case "title":
            $("#selSort").val("title");
            break;
    }

    var v = queryParameters["v"];

//    $.ajax({
//        url: '/tires/priceRange',
//        type: "POST",
//        dataType: 'json',
//        async: false,
//        data: {
//            v: v
//        },
//        success: function (response, textStatus) {
//            minPrice = parseInt(response.min);
//            maxPrice = parseInt(response.max);
//        },
//        error: function (XMLHttpRequest, textStatus, errorThrown){
//            minPrice = 0;
//            maxPrice = 8000;
//        }
//    });
//
//    if($("#Shins_priceMin").val() == "" &&  $("#Shins_priceMax").val() == ""){
//        $("#Shins_priceMin").val(minPrice);
//        $("#Shins_priceMax").val(maxPrice);
//    }

    $(".filter-page select").change().change(function(){
        $("#formSearchTires").submit();
    });

    $(".filter-page input[type!=text]").change(function(){
        $("#formSearchTires").submit();
    });

    var min_price = $("span[item=price_min]").text();
    var max_price = $("span[item=price_max]").text();
    if(min_price != max_price){
        //.price-slider-filter
        $("#slider-range").slider({
            range: true,
            min: parseInt(min_price),
            max: parseInt(max_price),
            values: [parseInt(min_price), parseInt(max_price)],
            slide: function(event, ui) {
                $("#Shins_priceMin").val(ui.values[0]);
                $("#Shins_priceMax").val(ui.values[1]);
            }
        });
    }



    $("#selSort").change(function(){
//        var queryParameters = {}, queryString = location.search.substring(1),
//            re = /([^&=]+)=([^&]*)/g, m;
//        while (m = re.exec(queryString)) {
//            queryParameters[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
//        }
        queryParameters['sort'] = $(this).val();
        location.search = $.param(queryParameters);
    });

    $("#avto_modification").change(function(){
        v = parseInt($(this).val());
        if(v != undefined && v != -1){
            $.ajax({
                url: '/drives/getAvtoModification',
                type: "POST",
                dataType: 'json',
                async: false,
                data: {
                    v: v
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
    });

});
