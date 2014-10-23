/**
 * Created with JetBrains PhpStorm.
 * User: mevis
 * Date: 16.08.14
 * Time: 16:41
 * To change this template use File | Settings | File Templates.
 */
//jQuery(document).ready(function(){
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
        var classList = jQuery('#messageDialog span.icon').attr('class').split(/\s+/);
        jQuery.each( classList, function(index, item){
            if(item !== 'icon') {
                jQuery('#messageDialog span.icon').removeClass(item);
            }
        });
        jQuery('#messageDialog span.icon').addClass(msgIcon);
        jQuery("#messageDialog .message").text(msgText);
        jQuery("#messageDialog").dialog({
            modal: true,
            title: title,
            dialogClass: dialogClass,
            buttons: [
                {
                    text: "Закрыть",
                    click: function(){
                        jQuery(this).dialog("close");
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
//h});