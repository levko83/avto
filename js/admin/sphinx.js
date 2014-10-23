/**
 * Created with JetBrains PhpStorm.
 * User: mevis
 * Date: 16.08.14
 * Time: 17:20
 * To change this template use File | Settings | File Templates.
 */
$(document).ready(function(){

    $(".reindex").click(function(){
        $.ajax({
            url: '/admin/service/sphinxReindex',
            type: "POST",
            dataType: 'json',
            data: {
                indexName: $(this).attr("indexName")
            },
            beforeSend: function(XMLHttpRequest){
                $.blockUI({ message: '<h2 style="padding: 15px;">Пожалуйста, подождите, идет переиндексация'});
            },
            success: function (response, textStatus){
                if(response != undefined && response.code != undefined && response.code == 1){
                    $("#indexingResult").html(response.message);
                }else if(response != undefined && response.code != undefined && response.code == 0){
                    showError(response.message);
                }else{
                    showError("Неизвестная ошибка");
                }
                $.unblockUI();
            },
            error: function (XMLHttpRequest, textStatus, errorThrown){
                showError(XMLHttpRequest.responseText);
                $.unblockUI();
            }
        });
        return false;
    });

    $(".restart").click(function(){
        $.ajax({
            url: '/admin/service/sphinxRestart',
            type: "POST",
            dataType: 'json',
            beforeSend: function(XMLHttpRequest){
                $.blockUI({ message: '<h2 style="padding: 15px;">Пожалуйста, подождите, идет перезапуск Sphinx...'});
            },
            success: function (response, textStatus){
                if(response != undefined && response.code != undefined && response.code == 1){
                    $("#indexingResult").html(response.message);
                }else if(response != undefined && response.code != undefined && response.code == 0){
                    showError(response.message);
                }else{
                    showError("Неизвестная ошибка");
                }
                $.unblockUI();
            },
            error: function (XMLHttpRequest, textStatus, errorThrown){
                showError(XMLHttpRequest.responseText);
                $.unblockUI();
            }
        });
        return false;
    });

});
