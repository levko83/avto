/**
 * Created by Ifaliuk on 19.02.14.
 */
$(document).ready(function(){

    /*
    $("#formSearchDrives").formProducts({
        ulId: "filterValues",
        init: function(selectedElements){
            console.log(selectedElements);
        },
        selectOption: function(elementType, elementId, selectedElements){
            console.log(selectedElements);
        }
    });
    */

    /*
    function FormFilter(formId){
        this.form = $(formId);;
        this.elements = [];
        this.selectedOptions = [];
        // получаем все select's формы
        $(formId + " select").each(function(i, e){
            $(e).change(function(){
                var elem = {};
                elem.id = $(e).attr("id");
                elem.value = $(e).val();
                if($(e).val() > 0){
                    elem.group = $(e).parent().find("h3").text();
                    elem.text = $(e).find("option:selected").text();
                    this.selectedOptions.push(elem);
                }else{
                    var searchIndex = -1;
                    $.grep(this.selectedOptions, function(curr, i){
                        if(curr.id == elem.id){
                            searchIndex = i;
                        }
                    });
                    if(searchIndex >= 0){
                        this.selectedOptions.slice(searchIndex, 1);
                    }
                }
            });
        });
        // получаем все select's формы
        $(formId + " input[type='checkbox']").each(function(i, e1){
            $(e1).change(function(){
                var elem = {};
                elem.id = $(e1).attr("id");
                if($(e1)[0].checked){
                    elem.group = $(e1).parent().parent().parent().parent().find("h3").text();
                    elem.value = $(e1).val();
                    var tmp = $(e1).parent().text();
                    elem.text = tmp;
                    this.selectedOptions.push(elem);
                }else{
                    var searchIndex = -1;
                    $.grep(this.selectedOptions, function(curr, i){
                        if(curr.id == elem.id){
                            searchIndex = i;
                        }
                    });
                    if(searchIndex >= 0){
                        this.selectedOptions.slice(searchIndex, 1);
                    }
                }
            });
        });
        //this.selectedOptions = selectedOptions;
    }

    var form = new FormFilter("#formSearchDrives");

    $(".read-all a").click(function(){
        console.clear();
        console.log(form.selectedOptions);
        return false;
    });
    */

});
