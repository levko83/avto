/**
 * Created by Ifaliuk on 14.05.14.
 */
$(document).ready(function(){
    $(document).ready(function(){

        function showMessage(msgText, type){
            var dialogClass, msgIcon, title;
            if(typeof(type) === 'undefined') type = "info";
            if(type === "error"){
               title = "Сообщение об ошибке";
               dialogClass = "ui-dialog-red";
               msgIcon = "icon-warning-sign";
            }else if(type === "info"){
               title = "Информация";
               dialogClass = "ui-dialog-blue";
               msgIcon = "icon-info-sign";
            }else{
                return;
            }
            var classList = $('#messageDialog span.icon').attr('class').split(/\s+/);
            $.each( classList, function(index, item){
                if(item !== 'icon') {
                    $('#messageDialog span.icon').removeClass(item);
                }
            });
            $('#messageDialog span.icon').addClass(msgIcon);
            $("#messageDialog .message").text(msgText);
            $("#messageDialog").dialog({
                modal: true,
                title: title,
                dialogClass: dialogClass,
                buttons: [
                    {
                        text: "Закрыть",
                        click: function(){
                            $(this).dialog("close");
                        }
                    }
                ]
            });
        }

        function showInfo(msgText){
            showMessage(msgText);
        }

        function showError(msgText){
            showMessage(msgText, "error");
        }

        $(".progress").progressbar({
            value: false
        });

        $("#loadXml").click(function(){
            var sec = 0;
            var timer;
            $.ajax({
                url: '/admin/delivery/novaLoadXml',
                type: "POST",
                dataType: 'json',
                beforeSend: function(XMLHttpRequest){
                    timer = setInterval(
                        function(){
                            if(sec != undefined){
                                sec++;
                                var timeText;
                                if(sec >= 60){
                                    var m = Math.floor(sec / 60);
                                    var s = sec - (m * 60);
                                    if(s < 10){
                                        s = "0" + s;
                                    }
                                    timeText = m + " мин. " + s + " сек.";
                                }else{
                                    timeText = sec + " сек.";
                                }
                                $(".wait-sec").text(timeText);
                            }
                        },
                        1000
                    );
                    $.blockUI({ message: '<h2 style="padding: 15px;">Пожалуйста, подождите <span class="wait-sec"></span>...</h2>'});
                },
                success: function (response, textStatus){
                    clearInterval(timer);
                    if(response != undefined && response.code != undefined && response.code == 1){
                        var infoText = "Загрузка файла выполнена успешна";
                        if(sec != undefined && sec > 0){
                            var timeText;
                            if(sec >= 60){
                                var m = Math.floor(sec / 60);
                                var s = sec - (m * 60);
                                if(s < 10){
                                    s = "0" + s;
                                }
                                timeText = m + " мин. " + s + " сек.";
                            }else{
                                timeText = sec + " сек.";
                            }
                            infoText += " за " + timeText;
                        }
                        showInfo(infoText);
                    }
                    else{
                        showError("Ошибка загрузки xml c сайта Новой Почты")
                    }
                    $.unblockUI();
                },
                error: function (XMLHttpRequest, textStatus, errorThrown){
                    clearInterval(timer);
                    showError(XMLHttpRequest.responseText);
                    $.unblockUI();
                }
            });
            return false;
        });

        $("#updateTable").click(function(){
            var sec = 0;
            var timer;
            $.ajax({
                url: '/admin/delivery/novaUpdateTable',
                type: "POST",
                dataType: 'json',
                beforeSend: function(XMLHttpRequest){
                    timer = setInterval(
                        function(){
                            if(sec != undefined){
                                sec++;
                                var timeText;
                                if(sec >= 60){
                                    var m = Math.floor(sec / 60);
                                    var s = sec - (m * 60);
                                    if(s < 10){
                                        s = "0" + s;
                                    }
                                    timeText = m + " мин. " + s + " сек.";
                                }else{
                                    timeText = sec + " сек.";
                                }
                                $(".wait-sec").text(timeText);
                            }
                        },
                        1000
                    );
                    $.blockUI({ message: '<h2 style="padding: 15px;">Пожалуйста, подождите - идет обновление таблицы <span class="wait-sec"></span>...</h2>'});
                },
                success: function (response, textStatus){
                    clearInterval(timer);
                    if(response != undefined && response.code != undefined && response.code == 1){
                        var infoText = "Обновление таблицы выполнено успешно";
                        if(sec != undefined && sec > 0){
                            var timeText;
                            if(sec >= 60){
                                var m = Math.floor(sec / 60);
                                var s = sec - (m * 60);
                                if(s < 10){
                                    s = "0" + s;
                                }
                                timeText = m + " мин. " + s + " сек.";
                            }else{
                                timeText = sec + " сек.";
                            }
                            infoText += " за " + timeText;
                        }
                        showInfo(infoText);
                    }
                    else if(response != undefined && response.code != undefined && response.code == 0){
                        showError(response.message);
                    }else{
                        showError("Неизвестная ошибка");
                    }
                    $.unblockUI();
                },
                error: function (XMLHttpRequest, textStatus, errorThrown){
                    clearInterval(timer);
                    showError(XMLHttpRequest.responseText);
                    $.unblockUI();
                }
            });
            return false;
        });

    });
});