/**
 * Created by Ifaliuk on 11.12.13.
 */
$(document).ready(function(){

    // изменение кол-ва товаров в заказе
    $(".changeAmount").live("change", function(){
        var e = $(this);
        $.ajax({
            url: '/admin/orders/changeAmount',
            type: "POST",
            dataType: 'json',
            async: false,
            data: {
                product: e.attr("product"),
                order_id: $("#order_id").val(),
                amount: e.val()
            },
            beforeSend: function (XMLHttpRequest){
                $.blockUI({ message: '<h2 style="padding: 15px;">Изменение кол-ва товаров...</h2>' });
            },
            success: function (response, textStatus) {
                if(response.code == 1){
                   e.val(response.value);
                }else{
                    e.val(1);
                }
                $.unblockUI();
            },
            error: function (XMLHttpRequest, textStatus, errorThrown){
                e.val(1);
                $.unblockUI();
            },
            complete: function (XMLHttpRequest, textStatus) {
                recalcTatalOrder();
            }
        });
    });

    // добавление товара в заказ
    $(".add_to_order").live("click", function(){
        var e = $(this);
        $.ajax({
            url: '/admin/orders/addProduct',
            type: "POST",
            dataType: 'json',
            data: {
                product: e.attr("href"),
                order_id: $("#order_id").val()
            },
            beforeSend: function (XMLHttpRequest){
                $.blockUI({ message: '<h2 style="padding: 15px;">Добавление товара в заказ...</h2>' });
            },
            success: function (response, textStatus) {
                if(response.code == 1){
                    $.fn.yiiGridView.update('orderDetailsGrid',{
                        complete: function(){
                            recalcTatalOrder();
                            $.unblockUI();
                        }
                    });
                }else
                    $.unblockUI();
            },
            error: function (XMLHttpRequest, textStatus, errorThrown){
                $.unblockUI();
            }
        });
        return false;
    });

    // удаление товара из заказа
    $(".del_from_order").live("click", function(){
        var e = $(this);
        $.ajax({
            url: '/admin/orders/delProduct',
            type: "POST",
            dataType: 'json',
            data: {
                product: e.attr("href"),
                order_id: $("#order_id").val()
            },
            beforeSend: function (XMLHttpRequest){
                $.blockUI({ message: '<h2 style="padding: 15px;">Удаление товара из заказа...</h2>' });
            },
            success: function (response, textStatus) {
                if(response.code == 1){
                    $.fn.yiiGridView.update('orderDetailsGrid',{
                        complete: function(jqXHR, status){
                            recalcTatalOrder();
                            $.unblockUI();
                        }
                    });
                }else
                    $.unblockUI();
            },
            error: function (XMLHttpRequest, textStatus, errorThrown){
                $.unblockUI();
            }
        });
        return false;
    });

    $("#clearProducts").click(function(){
        if($("#orderDetailsGrid table").get(0).rows.length > 1 && $("#orderDetailsGrid table").get(0).rows[1].cells.length ==7){
            $.ajax({
                url: '/admin/orders/clearProducts',
                type: "POST",
                dataType: 'json',
                data: {
                    order_id: $("#order_id").val()
                },
                beforeSend: function (XMLHttpRequest){
                    $.blockUI({ message: '<h2 style="padding: 15px;">Очистка списка товоров в заказе...</h2>' });
                },
                success: function (response, textStatus) {
                    if(response.code == 1){
                        $.fn.yiiGridView.update('orderDetailsGrid',{
                            complete: function(jqXHR, status){
                                recalcTatalOrder();
                                $.unblockUI();
                            }
                        });
                    }else
                        $.unblockUI();
                },
                error: function (XMLHttpRequest, textStatus, errorThrown){
                    $.unblockUI();
                }
            });
        }
        return false;
    });

    function recalcTatalOrder(){
        var table = $("#orderDetailsGrid table").get(0);
        var sum = 0;
        for(var i = 0; i < table.rows.length; i++){
            if(i == 0) continue;
            var row = table.rows[i];
            if(row.cells.length != 7){
                sum = 0;
                break;
            }
            var price = parseFloat(row.cells[4].innerHTML);
            if(isNaN(price)) price = 0;
            var amount = parseInt(jQuery(row.cells[5]).find("input").val());
            if(isNaN(amount)) amount = 0;
            sum += price*amount;
        }
        $("#total").html(Math.round(sum));
    }


});

