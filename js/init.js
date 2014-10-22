(function ($) {
	/*_____________________ Определяем браузер ________________________*/
	if (($.browser.msie) && ($.browser.version <= '8.0')) {
		$('html').addClass('ie');
	}
$(function(){

	/*_______________________________________________________ HEADER _________________________________________________________*/

    /*_________________________ TOP MENU ________________________*/

    /*----- Ширина пунктов меню ------*/
    function resize_menu() {
        /*#top-menu*/
        menu_width = $("#top-menu .menu").width();
        menu_a_length = $("#top-menu .menu>li").length;
        menu_a_width = Math.floor(menu_width/menu_a_length);
        $("#top-menu ul li a").css("width", (menu_a_width-2)+"px");
        /*top-menu-480*/
        menu_width = $("#top-menu-width-480 .menu").width();
        menu_a_length = $("#top-menu-width-480 .menu>li").length;
        menu_a_width = Math.floor(menu_width/menu_a_length);
        $("#top-menu-width-480 .menu li a, #top-menu-width-480 .menu-second li a, #top-menu-width-480 .menu li.last span").css("width", (menu_a_width-2)+"px");
    }
    resize_menu();
    /*----- Вложеное меню------*/
    /*-
    $('#top-menu ul .leaf>a').hover(function (e) {
        var $message1 = $(this).parent().find('.sub-menu-0');
        if ($message1.css('display') != 'block') {
            $message1.fadeIn(300);
        } else {
            $message1.fadeOut(100);
            $("ul.sub-menu-1").css("display",'none');
        }
    });
    -*/

    $('#top-menu ul>.leaf').hover(
        function() {
            $(this).find('.sub-menu-0').stop(true,true);
            $(this).find('.sub-menu-0').fadeIn(300);
        }, function() {
            $(this).find('.sub-menu-0').stop(true,true);
            $(this).find('.sub-menu-0').fadeOut(100);
        }
    );
    /*----- Третий уровень меню------*/
    /*
    $('#top-menu ul>.leaf').click(function (e) {
        $('ul.sub-menu-1').hide();
        var $message2 = $(this).parent().find("ul.sub-menu-1");

        if ($message2.css('display') != 'block') {
            $message2.animate({height: "toggle"}, 300);
        } else {
            $message2.animate({width: "0"}, 100);
        }

    });
    */
    $('#top-menu ul>.leaf ul>.leaf').hover(
        function() {
            $(this).find('.sub-menu-1').stop(true,true);
            $(this).find('.sub-menu-1').fadeIn(300);
        }, function() {
            $(this).find('.sub-menu-1').stop(true,true);
            $(this).find('.sub-menu-1').fadeOut(100);
        }
    );


    /*----- Вложеное меню Телефон------*/
    $('#top-menu-width-480 .menu li .menu-second').hide();
    $('#top-menu-width-480 .menu>li.last a').click(function (e) {
        var $message = $('#top-menu-width-480 .menu li .menu-second');

        if ($message.css('display') != 'block') {
            $message.show(50);

            var yourClick = true;
            $(document).bind('click.myEvent', function (e) {
                if (!yourClick && $(e.target).closest('#top-menu-width-480 .menu li .menu-second').length == 0) {
                    $message.hide();
                    $(document).unbind('click.myEvent');
                }
                yourClick = false;
            });
        }

        e.preventDefault();
    });

    /*----- Вложеное меню Телефон третий уровень------*/
    $('#top-menu-width-480 ul.menu>.leaf>a').click(function (e) {
        var $message3 = $(this).parent().find('.sub-menu-0');
        if ($message3.css('display') != 'block') {
            $message3.fadeIn(200);
        } else {
            $message3.fadeOut(50);
            $("ul.sub-menu-1").css("display",'none');
        }
        return false;
    });


    /*----- Третий уровень меню------*/
    /*$('#top-menu-width-480 ul.sub-menu-0 li a').click(function (e) {
        $('ul.sub-menu-1').hide();
        var $message4 = $(this).parent().find("ul.sub-menu-1");

        if ($message4.css('display') != 'block') {
            $message4.animate({height: "toggle"}, 200);
        } else {
            $message4.animate({width: "0"}, 50);
        }
    });
    */
    $(document).click(function(event) {
        if ($(event.target).closest("#top-menu").length) return;
        if ($(event.target).closest("#top-menu-width-480").length) return;
        $(".sub-menu-0").fadeOut(100);
        $("ul.sub-menu-1").css("display",'none');
        event.stopPropagation();
    });

	/*_______________________________________________________ CONTENT ____________________________________________________*/

		/*------ Подбор по автомобилю ------*/
		function showTab(n) {
			$('.tabs_content>div:visible').slideUp(0);
			$('.tabs_content>div').eq(n).slideDown(500);
			$('.tabs_menu li.active_tab').removeClass('active_tab');			
			$('.tabs_menu li').eq(n).addClass('active_tab');
		};

		$('.tabs_menu').find('li').click(function(){
			var i = $(this).index();
			showTab(i);
			//parameter_block();
		});

		showTab(0);

        /*Ширина li в зависимости от ширины экрана*/
        function jcarouselWidth () {
            if ($('.slider-tire-drive').width() < 300){
                jcarousel_width = ($('.slider-tire-drive').width())-1;
                $(".slider-tire-drive .content .ad").css("width", jcarousel_width+"px");
            } else {
                jcarousel_width = ($('.slider-tire-drive').width()/4)-2;
                $(".slider-tire-drive .content .ad").css("width", jcarousel_width+"px");
            }
        }
        jcarouselWidth ();
		/*------ Jcarucel для шин и дисков ------*/
		$('.jcarousel-clip').jcarousel({
		  start: 1,
	      auto: 0,
		  animation: "slow",
		  wrap: "both",
		  scroll: 1,
	    });

		/*------- всплывающие Веб-формы --------*/
		$('a.request-call').click(function(){ 
	    $.openDOMWindow({ 
			height:325, 
			width:258,
	        loader:1, 
	        loaderImagePath:'img/load.gif', 
	        loaderHeight:16, 
	        loaderWidth:17, 
	        windowSourceID:'#request-a-call' 
	    }); 
	    return false; 
		});

		$('a.form-close').click(function(){ 
		    $.closeDOMWindow();
			return false; 
		});

		$('a.cboxElement').click(function(){
            $.blockUI({ message: '<h2 style="padding: 15px;">Пожалуйста, подождите...</h2>'});
            var block = loadCartBlock();
            if(block != undefined && block.result == "suxx"){
                $("#cart-block").html(block.html);
                $("#phone").mask("(099)999-99-99");
                product_in_cart = $(".products-cart .views-row").length*134;
                $.openDOMWindow({
                    width:700,
                    height: product_in_cart+310,
                    loader:1,
//                    loaderImagePath:'images/load.gif',
                    loaderHeight:16,
                    loaderWidth:17,
                    windowSourceID:'#cart-block'
                });
            }
            $.unblockUI();
            return false;
		});

		$('a.cart-close').live(
            "click",
            function(){
                $.closeDOMWindow();
                return false;
            }
        );
		/*______________________________________ Страница Шины Диски ____________________________*/
		/*___________ изменение размера изображения ____________*/
		var $winwidth = $(window).width();
		var $imgwidth =0;
		if($winwidth>=1024) {
			$imgwidth = 210;
		} else if($winwidth<1024 && $winwidth>= 641) {
			$imgwidth = 180;
		} else if($winwidth<641) {
			$imgwidth = 100;
		}
		$(".products .field-name-product-hed .description-block .product-gallery, .products .field-name-product-hed .description-block .product-gallery .slides_container").css({
																																											'width': $imgwidth + 10,
																																											'height': $imgwidth + 50
																																										});
		$(".source-image").attr({ width: $imgwidth, height: $imgwidth+50 });
		$(window).bind("resize", function(){
			var $winwidth = $(window).width();
			var $imgwidth =0;
			if($winwidth>=1024) {
				$imgwidth = 180;
			} else if($winwidth<1024 && $winwidth>= 641) {
				$imgwidth = 140;
			} else if($winwidth<641) {
				$imgwidth = 100;
			}
			$(".source-image").attr({ width: $imgwidth, height: $imgwidth+50 });
			$(".products .field-name-product-hed .description-block .product-gallery, .products .field-name-product-hed .description-block .product-gallery .slides_container").css({
																																											'width': $imgwidth + 10,
																																											'height': $imgwidth+50
																																										});
		});


		/*----------- Ползунок цен -------------*/
        /*
		$( ".price-slider-filter #slider-range" ).slider({
			range: true,
			min: 0,
			max: 8000,
			values: [ 1000, 4000 ],
				slide: function( event, ui ) {
					$( "#amount" ).val( ui.values[ 0 ]);
					$( "#amount1" ).val( ui.values[ 1 ]);
					$( "#amount2" ).val( ui.values[ 0 ]);
					$( "#amount3" ).val( ui.values[ 1 ]);
				}
		});
		$( "#amount" ).val( $( "#slider-range" ).slider( "values", 0 ));
		$( "#amount1" ).val( $( "#slider-range" ).slider( "values", 1 ));
		$( "#amount2" ).val( $( "#slider-range" ).slider( "values", 0 ));
		$( "#amount3" ).val( $( "#slider-range" ).slider( "values", 1 ));
		*/
		/*------- Checkbox --------*/


//		$('.checkbox label').click(function(){
//            input = $(this).find("input");
//            if(!$(this).hasClass("active")){
//                $(this).addClass("active");
//                input.prop('checked', true);
//            }else{
//                $(this).removeClass("active");
//                input.prop('checked', false);
//            }
//		});
        def=0;
        $('.checkbox label').click(function(){
            def++;
            if(def==2) {
                $(this).toggleClass('active');
                def=0;
            }
        });
        $(".checkbox input:checked").each(function(){
            $(this).parent().addClass("active");
        });
/*
		$('.checkbox label').click(function(){
			def++;
			if(def==2) {
				$(this).toggleClass('active');
				def=0;
			}
		});
*/
		/*------------ Галерейка ---------------*/
		$(function(){
			$('.product-gallery').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				effect: 'slide, fade',
				crossfade: true,
				slideSpeed: 200,
				fadeSpeed: 500,
				generateNextPrev: false,
				generatePagination: false
			});
		});

		/*--------- Таблица продукта -----------*/
		$('.parameter-block table tr:nth-child(2n+2)').css("background","none");
			/* Считаем высоту блока */
			function parameter_block () {
				parameter_tr_length = $('.parameter-block .tabs_content>div:visible tr').length;
				$('.parameter-block .tabs_content').css('height',parameter_tr_length*30+20);
			}
			//parameter_block();

		/*-------- Отзывы -------------*/

		$("#reviews-node-form .rating").rating({
			fx: 'half',
	        image: '/css/images/stars.png',
	        loader: '/css/images/ajax-loader.gif',
            click: function(rating, result){
                if(rating >= 0 && rating <= 5)
                    $("#reviews-node-form #rating_hidden").val(rating);
            }
		});

		$(".views-row .rating, .product-gallery .rating").each(function() {
			$(this).rating({
				fx: 'half',
		        image: '/css/images/stars.png',
		        loader: '/css/images/ajax-loader.gif',
		        readOnly: true,
				url: 'rating_read.php',
		        callback: function(responce){
		            this.vote_success.fadeOut(2000);
		            alert('Общий бал: '+this._data.val);
		        }
			});
		});
		/*----------- отзывы в каталоге -------------*/
		$(".catalog-content .image-row .show-rewievs").hover()
		/*__________ Каталог таблица список __________*/
		$("#btn-5").click(function () {
			$(".catalog-list").css('display', 'block');
			$(".catalog-table").css('display', 'none');
		});
		$("#btn-4").click(function () {
			$(".catalog-list").css('display', 'none');
			$(".catalog-table").css('display', 'block');
		});

		/*---------- pager ----------*/
		//wPager = $('#list1 .catalog-management').width();

		//$('.catalog-product .pager').css('margin-left', wPager+' px');

		/*_____________________________ скрол в фильтре ______________________________*/
		/*var srl = 0;
		$('.checkboxs>span').css ('position','relative');
		var label_length = 0;


		$(".checkbox-pagination.down").click(function(){
			label_length = $(this).parent().find('label').length*24;
			if(srl < label_length) {
				$(this).parent().find('label').animate({
					top: -srl
					}, 500);
			} else {
				$(this).parent().find('label').animate({
					top: -label_length
					}, 500);
				srl = label_length;
			}
		});
        */
        var srl = 0;
        var spanHeight;

        $('.checkbox>span').css ('position','relative');

        $(".checkbox-pagination.up").click(function(){
            srl += 135.54023;
            if(srl >= 0) {
                srl = 0;
            }

            $(this).parent().find('span').animate({
                top: srl
            }, 500);
        });

        $(".checkbox-pagination.down").click(function(){
            srl -= 135.54023;
            spanHeight = $(this).parent().find('span').height();
            if(Math.abs(srl) >= spanHeight) {
                srl = -spanHeight + 127;
            }
            $(this).parent().find('span').animate({
                top: srl
            }, 500);
        });

        /*
		$(".checkbox-pagination.up").click(function(){
			srl -= 140;
			if(srl > 0) {
				$(this).parent().find('label').animate({
					top: -srl,
					}, 500, function() {
					// Animation complete.
				});
			} else {
				$(this).parent().find('label').animate({
					top: 0,
					}, 500, function() {
					// Animation complete.
				});
				srl = 0;
			}
		});
		*/
	/*----------------------------- Изменения при ресайзе окна ------------------------------*/
	window.addEventListener("resize", function() {
			resize_menu();
			jcarouselWidth();
	}, false);

    var li = document.getElementsByTagName("li");
    console.log("Кол-во li: " + li.length);


});
})(jQuery);

