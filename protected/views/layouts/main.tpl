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
                <p>+38(095)678 44 55,  +38(567) 345 31 33<a class="request-call" href="#">Обратный звонок</a></p>
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
                    <p>+38(095)678 44 55,  +38(567) 345 31 33<a class="request-call" href="#">Обратный звонок</a></p>
                </div>
            </div>
            <!--____________Блок поиска_____________-->
            <div id="search-block">
                <div class="search-form clearfix">
                    <form id="search-block-form" method="post" action="/">
                        <input id="edit-search-block-form" class="form-text" type="text" maxlength="128" size="24" value="Введите название желаемого товара" name="search_block_form" onfocus="{literal}if (this.value == 'Введите название желаемого товара') {this.value = '';}{/literal}" onblur={literal}"if (this.value == '') {this.value = 'Введите название желаемого товара';}{/literal}" title="Введите название желаемого товара.">
                        <input class="form-submit" type="submit" value="" name="op">
                    </form>
                    <!--Блок Мы в социальных сетях-->
                    <div id="social-networks" class="block clearfix">
                        <ul>
                            <li><a class="vk" href="#" title=""></a></li>
                            <li><a class="f" href="#" title=""></a></li>
                            <li><a class="t" href="#" title=""></a></li>
                            <li><a class="g" href="#" title=""></a></li>
                        </ul>
                    </div>
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
            <!--_____________________ Карзина __________________________-->
            <div id="cart-block">
                <h2>Ваша корзина</h2>
                <a class="cart-close close" href="#">X</a>
                <form>
                    <div class="products-cart">
                        <div class="views-row clearfix">
                            <a class="product-delit close" href="#">Удалить <span>X</span><a>
                                    <div class="image-row">
                                        <a href="/tires.html"><img src="img/prim3.jpg" width="100" height="100" alt=" " title=" " /></a>
                                    </div>
                                    <div class="row-title text-line"><a href="/tires.html">ZW 610 (BP - Черный внутри полированный)</a></div>
                                    <div class="code text-line">код товара: 758</div>
                                    <div class="price-for-one text-line"><span>1 002</span> грн</div>
                                    <div class="quantity text-line">Кол-во<input type="text" value="4">шт.</div>
                                    <div class="price-oll text-line"><span>4 402</span> грн</div>
                        </div>
                        <div class="views-row clearfix">
                            <a class="product-delit close" href="#">Удалить <span>X</span><a>
                                    <div class="image-row">
                                        <a href="/tires.html"><img src="img/prim3.jpg" width="100" height="100" alt=" " title=" " /></a>
                                    </div>
                                    <div class="row-title text-line"><a href="/tires.html">BFGOODRICH WINTER SLALOM KSI</a></div>
                                    <div class="code text-line">код товара: 758</div>
                                    <div class="price-for-one text-line"><span>1 002</span> грн</div>
                                    <div class="quantity text-line">Кол-во<input type="text" value="4">шт.</div>
                                    <div class="price-oll text-line"><span>4 402</span> грн</div>
                        </div>
                    </div>
                    <div class="summarized-data">
                        <div id="price-finali">Итого: <span>7 402</span> грн</div>
                        <div class="user-data">
                            Ф.И.О.:*
                            <input type="text" value="">
                            Телефон:*
                            <input type="text" value="">
                        </div>
                        <div class="continue-shopping"><a href="#">Продолжить покупки</a></div>
                        <div class="form-action submit">
                            <input type="submit" value="Заказать">
                            <a href="#">Детальное оформление заказа</a>
                        </div>
                    </div>
                </form>
            </div>
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
                <div class="read-all clearfix">
                    <a class"read" href="#">Подробнее о подборе и заказе шин</a>
                </div>
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
                                <li class="leaf"><a href="#" title="">Твитер</a></li>
                                <li class="last leaf"><a href="#" title="">Google+</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <!--Блок Присоеденяйтесь к нам-->
                <div id="social-networks" class="block clearfix">
                    <h3>Присоеденяйтесь к нам:</h3>
                    <ul>
                        <li class="first"><a href="#" title=""><img src="/css/images/social_vk_c.png" alt="" title="ВКонтакте"/></a></li>
                        <li class="leaf"><a href="#" title=""><img src="/css/images/social_odnok_c.png" alt="" title="Одноклассники"/></a></li>
                        <li class="leaf"><a href="#" title=""><img src="/css/images/social_twiter_c.png" alt="" title="Твитер"/></a></li>
                        <li class="last"><a href="#" title=""><img src="/css/images/social_g_c.png" alt="" title="gmail"/></a></li>
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
</body>
</html>