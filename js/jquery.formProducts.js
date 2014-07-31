/**
 * Created by Ifaliuk on 20.02.14.
 */
//jQuery.noConflict();
//(function($){
// ul

//<ul id="filter">
//    <li groupName="ET">
//        ET:
//        <ul>
//            <li elem="xxx">cccc <span>x</span></li>
//            <li elem="xxx">ccc1 <span>x</span></li>
//        </ul>
//    </li>
//    <li groupName="E2">
//    E2:
//        <ul>
//            <li elem="xxx">cccc <span>x</span></li>
//        </ul>
//    </li>
//</ul>

$(document).ready(function(){
    $.fn.formProducts = function(options){
         options = $.extend({
                        init: function(selectedElements){},
                        selectOption: function(elementType, elementId, selectedElements){}
                   }, options);

        return this.each(function(){
            var form = $(this);
            var elements = [];
            var selectedOptions = [];
            var ul = $("#" + options.ulId);
            var groupLi;
            var ol;
            var li;
            // выбираем все селекты
            form.find("select").each(function(i, e){
               var elem = {};
               elem.id = $(e).attr("id");
               elem.value = $(e).val();
               $($(e).parent().attr("class").split(" ")).each(function(i, c){
                    if(c !== "" && i == 0){
                        elem.groupName = c;
                        return false;
                    }
                });
                elem.groupValue = $(e).parent().find("h3").text();
                elem.text = $(e).find("option:selected").text();
                if(elem.value > 0){
                    selectedOptions.push(elem);
                    groupLi = ul.find("li[groupName='" + elem.groupName + "']");
                    if(groupLi.length == 0){
                        groupLi = $("<li groupName='" + elem.groupName + "'></li>");
                        groupLi.append("<span style='font-weight: bold; padding-bottom: 5px;'>" + elem.groupValue + "</span>");
                        ul.append(groupLi);
                        ol = $("<ol></ol>");
                        groupLi.append(ol);
                    }else{
                        ol = groupLi.find("ol");
                    }
                    li = $("<li elem='" + elem.id + "'>" + elem.text + " <span class='close' style='color: red; font-weight: bold; cursor: pointer;'>x</span></li>");
                    ol.append(li);
                }
                // кликаем на селекте
                $(e).change(function(){
                    if($(e).val() > 0){
                        selectedOptions.push(elem);
                        options.selectOption.call(this, "select", elem.id, selectedOptions);
                    }else{
                        var searchIndex = -1;
                        $.grep(selectedOptions, function(curr, i){
                            if(curr.id == elem.id){
                                searchIndex = i;
                            }
                        });
                        if(searchIndex >= 0){
                            selectedOptions.splice(searchIndex, 1);
                            ul.find("ol li[elem='" + $(e).attr("id") + "']").remove();
                            options.selectOption.call(this, "select", elem.id, selectedOptions);
                        }
                    }
                });
            });
            // выбираем все чекбоксы
            form.find("input[type='checkbox']").each(function(i, e){
                var elem = {};
                elem.id = $(e).attr("id");
                $($(e).parent().parent().parent().parent().attr("class").split(" ")).each(function(i, c){
                    if(c !== "" && i == 0){
                        elem.groupName = c;
                        return false;
                    }
                });
                elem.groupValue = $(e).parent().parent().parent().parent().find("h3").text();
                elem.value = $(e).val();
                elem.text = $(e).parent().text();
                if($(e)[0].checked){
                    selectedOptions.push(elem);
                    groupLi = ul.find("li[groupName='" + elem.groupName + "']");
                    if(groupLi.length == 0){
                        groupLi = $("<li groupName='" + elem.groupName + "'></li>");
                        groupLi.append("<span style='font-weight: bold; padding-bottom: 5px;'>" + elem.groupValue + "</span>");
                        ul.append(groupLi);
                        ol = $("<ol></ol>");
                        groupLi.append(ol);
                    }else{
                        ol = groupLi.find("ol");
                    }
                    li = $("<li elem='" + elem.id + "'>" + elem.text + " <span class='close' style='color: red; font-weight: bold; cursor: pointer;'>x</span></li>");
                    ol.append(li);
                }
                // кликаем на чекбоксе
                $(e).change(function(){
                    if($(e)[0].checked){
                        selectedOptions.push(elem);
                    }else{
                        var searchIndex = -1;
                        $.grep(selectedOptions, function(curr, i){
                            if(curr.id == elem.id){
                                searchIndex = i;
                            }
                        });
                        if(searchIndex >= 0){
                            ul.find("ol li[elem='" + $(e).attr("id") + "']").remove();
                            selectedOptions.splice(searchIndex, 1);
                        }
                    }
                });
            });
            options.init.call(this, selectedOptions);
            ul.find("ol li span.close").live("click", function(){
                var elem = $(this).parent();
                var id = elem.attr("elem");
                var type = form.find("#" + id).attr("type");
                if(type == "checkbox"){
                    form.find("#" + id).parent().removeClass("active");
                    form.find("#" + id).attr("checked", false);
                }else{

                }
                elem.remove();
            });
        });
    }
});
//})(jQuery);