/**
 * Created by Ifaliuk on 20.01.14.
 */

    $(document).ready(function(){

        $("#DetailOrder_phone").mask("(099)999-99-99");

        // добавление шины в карзину
        $(".add-tire a").click(function(){
            var tire_id = $(this).attr("tire-id");
            $.ajax({
                url: '/cart/tire',
                type: "POST",
                dataType: 'json',
                data: {
                    id: tire_id,
                    amount: $("input.tires_count[tire-id=" + tire_id + "]").val()
                },
                async: false,
//                beforeSend: function (XMLHttpRequest){
//                    $.blockUI({ message: '<h2 style="padding: 15px;">Пожалуйста, подождите...</h2>'});
//                },
                success: function (response, textStatus){
                    if(response.result == "suxx"){
                        $.blockUI({message: $('#confirm-buy-continue'), css: {width: '275px', padding: "35px"}});
                        showCart();
                    }
                    //$.unblockUI();
                }
//                error: function (XMLHttpRequest, textStatus, errorThrown){
//                    $.unblockUI();
//                }
            });
            return false;
        });

        $("#confirm-buy-continue input").click(function(){
            $.unblockUI();
            if($(this).attr("id") == "confirmNo"){
                $('a.cboxElement').click();
            }
        });

        var c = 0;
        $(".add-drive a").each(function(){
            c++;
        });
        console.log("Count c: ", c);

        // добавление диска в корзину
        $(".add-drive a").click(function(){
            var drive_id = $(this).attr("drive-id");
            console.log("drive-id: ", drive_id);
            $.ajax({
                url: '/cart/drive',
                type: "POST",
                dataType: 'json',
                data: {
                    id: drive_id,
                    amount: $("input.drives_count[drive-id=" + drive_id + "]").val()
                },
                async: false,
//                beforeSend: function (XMLHttpRequest){
//                    $.blockUI({ message: '<h2 style="padding: 15px;">Пожалуйста, подождите...</h2>'});
//                },
                success: function (response, textStatus){
                    if(response.result == "suxx"){
                        if(response.result == "suxx"){
                            $.blockUI({message: $('#confirm-buy-continue'), css: {width: '275px', padding: "35px"}});
                            showCart();
                        }
//                        console.log("result: " + response.result);
//                        showCart();
                    }
                    $.unblockUI();
                }
//                error: function (XMLHttpRequest, textStatus, errorThrown){
//                    $.unblockUI();
//                }
            });
            return false;
        });



        $(".product-delit").live(
            "click",
            function(){
                elem = $(this);
                $.ajax({
                    url: '/cart/removeCartItem',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        product_id: elem.attr("product-id"),
                        product_type: elem.attr("product-type")
                    },
                    async: false,
                    beforeSend: function (XMLHttpRequest){
                        $.blockUI({ message: '<h2 style="padding: 15px;">Пожалуйста, подождите...</h2>'});
                    },
                    success: function (response, textStatus) {
                        if(response != undefined && response.result == "suxx"){
                            elem = elem.parent().remove();
                            showCart();
                            if(parseInt(response.cost) == 0){
                                if($("body").hasClass("detailed-ordering-page")){
                                    window.location.href = "/order_detail.html";
                                }else{
                                    $.closeDOMWindow();
                                }
                            }else{
                                $("#price-finali span").text(response.cost);
                            }
                        }
                        $.unblockUI();
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown){
                        $.unblockUI();
                    }
                });
            }
        );

        var curr_amount = 4;

        $("input.change-amount, input.tires_count, input.tires_count").live(
            "focusin",
            function(){
               curr_amount = $(this).val();
            }
        );

        $("input.tires_count, input.drives_count").focusout(function(){
            count = parseInt($(this).val());
            if(isNaN(count) || count < 1){
                $(this).val(curr_amount);
            }
        });

        $("input.change-amount").live(
            "focusout",
            function(){
                elem = $(this);
                $.ajax({
                    url: '/cart/changeCartItemAmount',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        product_id: elem.attr("product-id"),
                        product_type: elem.attr("product-type"),
                        amount: elem.val()
                    },
                    async: false,
                    beforeSend: function (XMLHttpRequest){
                        $.blockUI({ message: '<h2 style="padding: 15px;">Пожалуйста, подождите...</h2>'});
                    },
                    success: function (response, textStatus) {
                        if(response.result == "error"){
                            elem.val(curr_amount);
                        }else{
                            elem.parent().parent().find(".price-oll span").text(response.itemPrice);
                            $("#price-finali span").text(response.cost);
                            showCart();
                        }
                        $.unblockUI();
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown){
                        elem.val(curr_amount);
                        $.unblockUI();
                    }
                });
            }
        );


        $("#shortOrder").live("submit", function(){
            if($.trim($("#fio").val()) == ""){
                $(".cart-error").text("Укажите ФИО");
                return false;
            }
            if($.trim($("#phone").val()) == ""){
                $(".cart-error").text("Укажите телефон");
                return false;
            }
            $(".cart-error").text("");
            $.ajax({
                url: '/cart/shortOrder',
                type: "POST",
                dataType: 'json',
                data: {
                    fio: $("#fio").val(),
                    phone: $("#phone").val()
                },
                async: false,
                beforeSend: function (XMLHttpRequest){
                    $.blockUI({ message: '<h2 style="padding: 15px;">Пожалуйста, подождите...</h2>'});
                },
                success: function (response, textStatus) {
                    if(response != undefined){
                        if(response.error_type != undefined){
                            if(response.error_type == 1){
                                $("#fio").val("");
                            }
                            if(response.error_type == 2){
                                $("#phone").val("");
                            }
                            $(".cart-error").text(response.form_error);
                        }
                        $.unblockUI();
                        if(response.result != undefined && response.result == "suxx"){
                            showCart();
                            $.closeDOMWindow();
                            $.blockUI({ message: '<h2 style="padding: 15px;">Ваш заказ принят...</h2>'});
                            setTimeout(
                                function(){
                                    $.unblockUI();
                                },
                                2000
                            );
                        }
                    }

                },
                error: function (XMLHttpRequest, textStatus, errorThrown){
                    elem.val(curr_amount);
                    $.unblockUI();
                }
            });
            return false;
        });

    });

    function showCart(){
        $.ajax({
            url: '/cart/getData',
            type: "POST",
            dataType: 'json',
            async: false,
            success: function (response, textStatus) {
                if(response.result == "suxx"){
                    if(response.count > 0){
                        $(".cart h3").text("Ваша корзина")
                        $(".cart .cart-items").removeClass("hide");
                        $(".cart #cart-count").text(response.count);
                        $(".cart #cart-cost").text(response.cost + " грн.");
                    }else{
                        $(".cart h3").text("Ваша корзина пуста")
                        $(".cart .cart-items").addClass("hide");
                    }
                }else{
                    $(".cart h3").text("Ваша корзина пуста")
                    $(".cart .cart-items").addClass("hide");
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown){
                $(".cart h3").text("Ваша корзина пуста")
                $(".cart .cart-items").addClass("hide");
            }
        });



    }

    function loadCartBlock(){
        var result;
        $.ajax({
            url: '/cart/loadCartBlock',
            type: "POST",
            dataType: 'json',
            async: false,
            success: function(response, textStatus) {
               result = response;
            }
        });
        return result;
    }



