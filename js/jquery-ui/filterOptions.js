var dataInit = function(elem){  
        var russian_language = {
                closeText: 'Закрыть',
                prevText: '&#x3c;Пред',
                nextText: 'След&#x3e;',
                currentText: 'Сегодня',
                monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
                'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
                'Июл','Авг','Сен','Окт','Ноя','Дек'],
                dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
                dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
                dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
                weekHeader: 'Не',
                dateFormat: 'dd.mm.yy',
                firstDay: 1,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''
        };
        $.datepicker.setDefaults(russian_language); 
        $(elem).datepicker({
            dateFormat: 'dd.mm.yy',
            changeMonth: true,
            changeYear: true
        });
    };
    
    
function searchOptionsText(){
    return {
        sopt: ['cn']
    };
}    

function searchOptionsFloat(){
    return {
        sopt: ['eq', 'ge', 'le']
    };
}

function searchOptionsList(listOptions){
    return {
        value: listOptions,
        sopt: ['eq']
    }
}

function searchOptionsChecked(){
    return {
        value: "1:Да;0:Нет",
        sopt: ['eq']
    }
}

function searchOptionsDate(){
    return {
        dataInit: dataInit, 
        //attr: {title:'Укажите дату'},
        sopt: ['eq', 'ge', 'le']
    };
}


