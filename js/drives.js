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

    $.ajax({
        url: '/drives/priceRange',
        type: "POST",
        dataType: 'json',
        async: false,
        data: {
            v: v
        },
        success: function (response, textStatus) {
            minPrice = parseInt(response.min);
            maxPrice = parseInt(response.max);
        },
        error: function (XMLHttpRequest, textStatus, errorThrown){
            minPrice = 0;
            maxPrice = 8000;
        }
    });

    $(".filter-page select").change().change(function(){
        $("#formSearchDrives").submit();
    });

    $(".filter-page input[type!=text]").change(function(){
        $("#formSearchDrives").submit();
    });

    if($("#Disks_priceMin").val() == "" &&  $("#Disks_priceMax").val() == ""){
        $("#Disks_priceMin").val(minPrice);
        $("#Disks_priceMax").val(maxPrice);
    }


    //.price-slider-filter
    $("#slider-range").slider({
        range: true,
        min: parseInt($("#Disks_priceMin").val()),
        max: parseInt($("#Disks_priceMax").val()),
        values: [parseInt($("#Disks_priceMin").val()), parseInt($("#Disks_priceMax").val())],
        slide: function(event, ui){
            $("#Disks_priceMin").val(ui.values[0]);
            $("#Disks_priceMax").val(ui.values[1]);
        }
    });

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
                        window.location = "/diski.html/avto="+response.modif;
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown){
                    minPrice = 0;
                    maxPrice = 8000;
                }
            });
        }
    });

    $(".rating").rating({
        fx: 'half',
        image: '../css/images/stars.png',
        loader: '../css/images/ajax-loader.gif',
        url: 'rating.php',
        callback: function(responce){
            this.vote_success.fadeOut(2000);
            alert('Общий бал: '+this._data.val);
        }
    });



});
