<!doctype html>
<html lang="ru">
<head>
    <title>{$this->title}</title>
    <meta name="keywords" content="{$this->meta_keywords}">
    <meta name="description" content="{$this->meta_description}">
    {if $this->noIndex}
        <meta name="robots" content="noindex, follow">
    {/if}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />
    <link rel="shortcut icon" type="image/jpeg" href="/favicon.jpg"/>
    <link type="text/css" rel="stylesheet/less" href="{Yii::app()->request->baseUrl}/css/reset.css">
    <link type="text/css" rel="stylesheet/less" href="{Yii::app()->request->baseUrl}/css/jquery-ui-1.9.2.custom.min.css">
    <link type="text/css" rel="stylesheet/less" href="{Yii::app()->request->baseUrl}/css/lightbox.css">
    <link type="text/css" rel="stylesheet/less" href="{Yii::app()->request->baseUrl}/css/style.css.less">
    <!--[if IE]>
    <script src="{Yii::app()->request->baseUrl}/js/html5.js"></script>
    <![endif]-->
    <script type="text/javascript" src="{Yii::app()->request->baseUrl}/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="{Yii::app()->request->baseUrl}/js/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="{Yii::app()->request->baseUrl}/js/jquery.rating-2.0.js"></script>
    <script type="text/javascript" src="{Yii::app()->request->baseUrl}/js/lightbox-2.6.min.js"></script>
    <script type="text/javascript" src="{Yii::app()->request->baseUrl}/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script type="text/javascript" src="{Yii::app()->request->baseUrl}/js/jquery-ui/jquery.blockUI.js"></script>
    <script type="text/javascript" src="{Yii::app()->request->baseUrl}/js/slides.min.jquery.js"></script>
    <script type="text/javascript" src="{Yii::app()->request->baseUrl}/js/less.js"></script>
    <script type="text/javascript" src="{Yii::app()->request->baseUrl}/js/jquery.jcarousel.min.js"></script>
    <script type="text/javascript" src="{Yii::app()->request->baseUrl}/js/jquery.DOMWindow.js"></script>
    <!--<script type="text/javascript" src="//vk.com/js/api/openapi.js?97"></script>-->
    <script type="text/javascript" src="{Yii::app()->request->baseUrl}/js/cart.js"></script>
    <script type="text/javascript" src="{Yii::app()->request->baseUrl}/js/init.js"></script>
</head>
<body class="html front">
    <div id="wrapper">
        <header>
            <!--_______Блок обратный звонок______-->
            <div class="top-header">
                <p><strong style="font-weight: bold;">(099)175-56-14</strong>, <strong style="font-weight: bold;">(061)220-16-92</strong>, (067)837-54-34<a class="request-call" href="#">Обратный звонок</a></p>
                <div class="cart-480">
                    <div class="roundblock">
                        <a href="#"> В корзине товаров:<span>5</span></a>
                    </div>
                </div>
            </div>
            <!--__________Блок логотипа__________-->
            <div class="main-center">
                <div id="logo-floater">
                    <a href="/">
                        <img src="{Yii::app()->request->baseUrl}/css/images/logo.png" alt=" " title="Главная" id="logo" />
                    </a>
                </div>
                <div id="logo-floater-480">
                    <a href="/">
                        <img src="{Yii::app()->request->baseUrl}/css/images/logo2.png" alt=" " title="Главная" id="logo" />
                    </a>
                </div>
                <!--___________Блок Корзина____________-->
                <div class="cart">
                    <div class="roundblock">
                        {if Yii::app()->shoppingCart->getItemsCount() == 0}
                            <h3>Ваша корзина пуста</h3>
                            <div class="cart-items hide">
                                <p>
                                    Товаров:
                                    <span id="cart-count">{Yii::app()->shoppingCart->getItemsCount()}</span>
                                </p>
                                <p>
                                    Cумма:
                                    <span id="cart-cost">{Yii::app()->shoppingCart->getCost()} грн</span>
                                </p>
                                <a class="cboxElement" href="/cart.html" name="lb_add2cart">Перейти к оплате</a>
                            </div>
                        {else}
                            <h3>Ваша корзина</h3>
                            <div class="cart-items">
                                <p>
                                    Товаров:
                                    <span id="cart-count">{Yii::app()->shoppingCart->getItemsCount()}</span>
                                </p>
                                <p>
                                    Cумма:
                                    <span id="cart-cost">{Yii::app()->shoppingCart->getCost()} грн</span>
                                </p>
                                <a class="cboxElement" href="/cart.html" name="lb_add2cart">Перейти к оплате</a>
                            </div>
                        {/if}
                    </div>
                </div>
                <!--_______Блок обратный звонок телефонный вид______-->
                <div class="top-header-480">
                    <p>+38(099)175-56-14, +38(067)837-54-34, +38(061)220-16-92<a class="request-call" href="#">Обратный звонок</a></p>
                </div>
            </div>
            <!--____________Блок поиска_____________-->
            <div id="search-block">
                <div class="search-form clearfix">
                    <form id="search-block-form" method="post" action="/">
                        <input id="edit-search-block-form" class="form-text" type="text" maxlength="128" size="24" value="Введите название желаемого товара" name="search_block_form" onfocus="{literal}if (this.value == 'Введите название желаемого товара') {this.value = '';}{/literal}" onblur={literal}"if (this.value == '') {this.value = 'Введите название желаемого товара';}{/literal}" title="Введите название желаемого товара.">
                        <input class="form-submit" type="submit" value="" name="op">
                        <ul id="search_result" style="display: none;">
                            <li class="searched-product">
                                <a href="#">
                                    <img src="/images/no_photo_35_35.jpg" width="35px" height="35px"/>
                                    <div class="product-name">
                                        Алтайский шинный комбинат Forward Professional А-12 185/75 R16C 104/102Q
                                    </div>
                                    <div class="price">775 грн.</div>
                                </a>
                            </li>
                            <li class="searched-product-not-avail">
                                <a href="#">
                                    <img src="/images/no_photo_35_35.jpg" width="35px" height="35px"/>
                                    <div class="product-name">
                                        Алтайский шинный комбинат Forward Professional А-12 185/75 R16C 104/102Q
                                    </div>
                                    <div class="price">нет в наличии</div>
                                </a>
                            </li>
                            <li class="search_show_all_results">
                                <a href="#">
                                    Все результаты поиска
                                </a>
                            </li>
                        </ul>
                    </form>
                    <!--Блок Мы в социальных сетях-->
                    <div id="social-networks" class="block clearfix">
                        <ul>
                            <li><a class="vk" href="#" title=""></a></li>
                            <li><a class="f" href="https://www.facebook.com/pages/Extraloadcomua/564208600302244" title=""></a></li>
                            <li><a class="t" href="https://twitter.com/extraloadcomua" title=""></a></li>
                            <li><a class="g" href="https://plus.google.com/+ExtraloadUa" title=""></a></li>
                        </ul>
                    </div>
					

<!-- start search suggest result -->									
				
				<style>
.header-search-suggest-container {
z-index: 10;
position: relative; 
width: 75%;
color: #cecece;
float: left;
padding: 0px 35px 0px 0px;
}
@media only screen and (max-width: 1024px) and (min-width: 641px), only screen and (max-device-width: 1024px) and (min-device-width: 641px){
.header-search-suggest-container {
width: 65%;
padding: 0px 34px 0px 1px;
} 
}
@media only screen and (max-width: 640px) and (min-width: 1px), only screen and (max-device-width: 640px) and (min-device-width: 1px){
.header-search-suggest-container {
width: 89%;
padding: 0px 34px 0px 1px;
}
}

.header-search-suggest {
border: 1px solid #e9e9ea;
position: relative;
z-index: 2;
background-color: #fff;
border-radius: 3px;
border-bottom: 3px solid #ccc;
}
.header-search-suggest-i {
overflow: hidden;
border-bottom: 1px solid #eaeaea;
padding-left: 0.5em;
cursor: pointer;
padding-top: 0.7em;
padding-bottom: 0.7em;
}
.sprite, .sprite-side, .sprite-both {
position: relative;
}
.header-search-suggest-i-img {
float: left;
width: 50px;
text-align: center;
vertical-align: middle;
}
.header-search-suggest-i-detail {
margin-left: 4.5em;
margin-right: 2em;
}
.header-search-suggest-i-title {
padding-bottom: 0.5em;
}
.header-search-suggest-i-title-link {
word-break: break-word;
}
.header-search-suggest-price {
color: #bf1010;
font-size: 1em;
font-weight: 500;
}
.header-search-suggest-i.active {
cursor: pointer;
}
.header-search-suggest-i.active, .header-search-suggest-i:active {
background-color: #f8f8f8;
}
.header-search-suggest-more-link {
font-size: 1.15385em;
display: inline-block;
padding-left: 4em;
padding-bottom: 0.7em;
padding-top: 0.7em;
}
.header-search-suggest-i:hover{
background-color: #f8f8f8;
}
</style>

<div class="header-search-suggest-container" style="display:none;"> 
	<div style="position: absolute; width: 100%;">
		<div class="header-search-suggest">
			<div class="header-search-suggest-g">

				<div class="header-search-suggest-i sprite-side">
					<div class="header-search-suggest-i-img">
						<img src="/images/no_photo_35_35.jpg" width="40" height="32" alt="alt" title="title" style="border:none">
					</div>
					<div class="header-search-suggest-i-detail">
						<div class="header-search-suggest-i-title">
							<a class="header-search-suggest-i-title-link" href="#">Алтайский шинный комбинат Forward Professional А-12 185/75 R16C 104/102Q</a>
						</div>
						<div class="header-search-suggest-price">775 грн.</div>
					</div>
				</div>

				<div class="header-search-suggest-i sprite-side">
					<div class="header-search-suggest-i-img">
						<img src="#" width="40" height="32" alt="alt" title="title" style="border:none">
					</div>
					<div class="header-search-suggest-i-detail">
						<div class="header-search-suggest-i-title">
							<a class="header-search-suggest-i-title-link" href="#">name</a>
						</div>
						<div class="header-search-suggest-price">price</div>
					</div>
				</div>

				<a class="header-search-suggest-more-link" href="#show-all">
					<span class="arrow-link-inner">Все результаты поиска</span>&nbsp;→
				</a>

			</div>
		</div>
	</div>
</div>
				
<!-- end search suggest result -->



                </div>
            </div>
            <!--______________________Блок Главное меню____________________-->
            <div class="region-menu">
                {*{if !BrowserDetector::isMobile()}*}
                <nav id="top-menu" class="top-menu block block-menu clearfix">
                    {include file="application.views.site._mainMenu"}
                </nav>
                {*{else}*}
                <nav id="top-menu-width-480" class="top-menu block block-menu clearfix">
                    {include file="application.views.site._mainMenuMobile"}
                </nav>
                {*{/if}*}
            </div>
            <div class="informer">
                Уважаемые клиенты! В связи загруженностью телефонных линий, просьба оставлять заявки на сайте. Мы свяжемся с вами в ближайшее время. Спасибо за понимание!
            </div>
            <!--_____________________ Карзина __________________________-->
            <div id="cart-block"></div>
        </header> <!-- /#header -->
        <!--___________________________________________ CONTEINER__________________________________________-->
        <div id="container" class="clearfix">
            {$content}
            <!--_______________ Текст страници __________________-->
            {if isset($this->body)}
            <article id="node-1" class="node node-page">
                <div class="content clearfix">
                    <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                            {$this->body}
                    </div>
                </div>
                {*<div class="read-all clearfix">*}
                    {*<a class"read" href="#">Подробнее о подборе и заказе шин</a>*}
                {*</div>*}
            </article>
            {/if}
        </div>
        <!--___________________________________________________________FOOTER____________________________________________________________-->
        <footer>
            <div class="footer-content clearfix">
                <div class="region-bottom-menu clearfix">
                    <nav id="bottom-menu" class="bottom-menu block block-menu clearfix">
                        <div class="bottom-pod-menu pod-menu-0 clearfix">
                            <h3>Сайт</h3>
                            <ul class="menu clearfix">
                                <li class="first active leaf"><a href="/" title="" class="active">Главная</a></li>
                                <li class="leaf"><a href="{Yii::app()->createUrl('site/about')}" title="">О Компании</a></li>
                                <li class="leaf"><a href="{Yii::app()->createUrl('site/contacts')}" title="">Контакты</a></li>
                                <li class="leaf"><a href="{Yii::app()->createUrl('site/delivery')}" title="">Оплата и Доставка</a></li>
                                <li class="last leaf"><a href="#" title="">Новости</a></li>
                            </ul>
                        </div>
                        <div class="bottom-pod-menu pod-menu-1 clearfix">
                            <h3>Шины</h3>
                            <ul class="menu clearfix">
                                {foreach $this->shinsSubMenu as $item}
                                    <li class="leaf"><a href="{Yii::app()->createUrl($item["url"][0], ["type" => $item["url"]["type"]])}" title="{$item["label"]}" >{$item["label"]}</a></li>
                                {/foreach}
                            </ul>
                        </div>
                        <div class="bottom-pod-menu pod-menu-2 clearfix">
                            <h3>Диски</h3>
                            <ul class="menu clearfix">
                                {foreach $this->disksSubMenu as $item}
                                    <li class="leaf"><a href="{Yii::app()->createUrl($item["url"][0], ["type" => $item["url"]["type"]])}" title="{$item["label"]}" >{$item["label"]}</a></li>
                                {/foreach}
                            </ul>
                        </div>
                        <div class="bottom-pod-menu pod-menu-3 clearfix">
                            <h3>Соц-сети</h3>
                            <ul class="menu clearfix">
                                <li class="first leaf"><a href="/" title="" class="active">Вконтакте</a></li>
                                <li class="leaf"><a href="#" title="">Однокласники</a></li>
                                <li class="leaf"><a href="https://twitter.com/extraloadcomua" title="">Твитер</a></li>
                                <li class="last leaf"><a href="https://plus.google.com/+ExtraloadUa" title="">Google+</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!--Блок Присоеденяйтесь к нам-->
                <div id="social-networks" class="block clearfix">
                    <h3>Присоеденяйтесь к нам:</h3>
                    <ul>
                        <li class="first"><a href="#" title=""><img src="/css/images/social_vk_c.png" alt="" title="ВКонтакте"/></a></li>
                        <li class="leaf"><a href="https://www.facebook.com/pages/Extraloadcomua/564208600302244" title=""><img src="/css/images/social_odnok_c.png" alt="" title="Одноклассники"/></a></li>
                        <li class="leaf"><a href="https://twitter.com/extraloadcomua" title=""><img src="/css/images/social_twiter_c.png" alt="" title="Твитер"/></a></li>
                        <li class="last"><a href="https://plus.google.com/+ExtraloadUa" title=""><img src="/css/images/social_g_c.png" alt="" title="gmail"/></a></li>
                    </ul>
                </div>
                <!--Блок Задать вопрос-->
                <div class="ask">
                    <h3> Задать вопрос </h3>
                    <a class="request-call" href="#">Заказать звонок</a>
                </div>
                <!--Блок Коперайтов-->
                <div id="copy">
                    <p>Все права защищены &nbsp&nbsp ExtraLoad.com.ua © 2013</p>
                </div>
            </div>
            <!-- Формы обратной связи -->
            <div id="request-a-call">
                <div class="content">
                    <form id="request-a-call-form" class="client-form" accept-charset="UTF-8" method="post" action="/">
                        <div id="webform-component-vashe-imya" class="form-item webform-component webform-component-textfield webform-container-inline">
                            <label for="edit-submitted-vashe-imya">Ваше имя</label>
                            <input id="edit-submitted-vashe-imya" class="form-text required" type="text" maxlength="128" size="60" value="" name="vashe_imya">
                        </div>
                        <div id="webform-component-telefon" class="form-item webform-component webform-component-textfield webform-container-inline">
                            <label for="edit-submitted-telefon">Ваш телефон</label>
                            <input id="edit-submitted-telefon" class="form-text" type="text" maxlength="128" size="60" value="" name="telefon">
                        </div>
                        <div id="webform-component-soobshchenie" class="form-item webform-component webform-component-textarea">
                            <label for="edit-submitted-call-time">Когда Вам перезвонить</label>
                            <div class="form-textarea-wrapper">
                                <textarea id="edit-submitted-call-time" class="form-textarea" rows="5" cols="60" name="call-time"></textarea>
                            </div>
                        </div>
                        <div id="edit-actions" class="form-actions form-wrapper">
                            <input id="edit-submit" class="form-submit" type="submit" value="Отправить" name="op">
                        </div>
                        <a class="form-close" href="#">x</a>
                    </form>
                </div>
            </div>
            <!-- Формы обратной связи -->
            <div id="confirm-buy-continue" style="display:none; cursor: default">
                <input type="button" id="confirmYes" value="Продолжить покупки" />
                <input type="button" id="confirmNo" value="В корзину" />
            </div>
        </footer>
    </div> <!-- /#wrapper -->
    	
    <script type="text/javascript">
	(function(i,s,o,g,r,a,m){ldelim}i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ldelim}
	   (i[r].q=i[r].q||[]).push(arguments){rdelim},i[r].l=1*new Date();a=s.createElement(o),
	   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	{rdelim})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-35311030-1', 'auto');
	ga('send', 'pageview');
    </script>
    <!— Yandex.Metrika counter —>
<script type="text/javascript">
(function (d, w, c) {ldelim}
    (w[c] = w[c] || []).push(function() {ldelim}
        try {ldelim}
            w.yaCounter22490305 = new Ya.Metrika({ldelim}id:22490305,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    trackHash:true});
        {rdelim} catch(e) {ldelim} {rdelim}
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () {ldelim} n.parentNode.insertBefore(s, n); {rdelim};
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {ldelim}
        d.addEventListener("DOMContentLoaded", f, false);
    {rdelim} else {ldelim} f(); {rdelim}
{rdelim})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/22490305" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!— /Yandex.Metrika counter —>
	

	
	
</body>
</html>
