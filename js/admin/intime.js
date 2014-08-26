/**
 * Created by Ifaliuk on 14.05.14.
 */
$(document).ready(function(){

    $(".progress").progressbar({
        value: false
    });

    $("#loadXml").click(function(){
        var sec = 0;
        var timer;
        $.ajax({
            url: '/admin/delivery/intimeLoadXml',
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
                    showError("Ошибка загрузки xml c сайта Intime")
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
            url: '/admin/delivery/intimeUpdateTable',
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