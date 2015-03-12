<!--_____________________ Левая колонка _________________________-->
{*{if !BrowserDetector::isMobile()}*}
    <aside id="sidebar-first">
        <div id="filter-tire" class="filter">
            {include file="application.views.tires._blockSearchByTires"}
        </div>
    </aside>
{*{/if}*}
<!--_________________________________________ Основной контента _________________________________________-->
<section id="center">
    <div id="squeeze">
        <a class="filter-button" href="#filter-tire-780">Фильтр</a>
        {if $this->breadcrumbs}
            {include file="application.views.site._breadcrumbs"}
        {/if}
        <div class="products node node-10 clearfix">
            <div class="field field-name-title">
                <h1>Шины {$display->display_name}</h1>
            </div>
            <!--________________________________Блок Шапка продукта________________________________-->
            <div class="field field-name-product-hed">
                <!--___________Блок Галереи___________-->
                <div class="description-block">
                    <div class="product-gallery">
                        <div class="slides_container">
                            {foreach from=$images key="i" item="image"}
                                <a href="/images/products/shins/{$image["imageName"]}" data-lightbox="photo">
                                    <img class="source-image" src="{imageResizer product_type="tire" imageName=$image["imageName"] width=180 height=230}" alt="">
                                </a>
                            {/foreach}
                        </div>
                        <div class="rating">
                            <input type="hidden" name="val" value="{$display->rating->val}"/>
                            <input type="hidden" name="votes" value="{$display->rating->votes}"/>
                            <input type="hidden" name="vote-id" value="d{$display->id}"/>
                            {*<input type="hidden" name="cat_id" value="2"/>*}
                        </div>
                        <ul class="pagination">
                            {foreach from=$images key="i" item="image"}
                                {if $i < 4}
                                    <li><a href="#"><img src="{imageResizer product_type="tire" imageName=$image["imageName"] width=47 height=47}" alt=""></a></li>
                                {/if}
                            {/foreach}
                        </ul>
                    </div>
                    <div class="product-options">
                        {if $display_min_price > 0}
                        <div class="price">от {$display_min_price} грн</div>
                        {else}
                        <div class="price">нет в наличии</div>
                        {/if}
                        {*<div class="car-type">Тип дисков: <span>литые</span></div>*}
                        <div class="product-key">Код товара: <span>{$display->id}</span></div>
                        {if !empty($season)}
                            <div class="sison">Сезон: <span>{$season["value"]}</span></div>
                        {/if}
                    </div>
                </div>
                <!--___________Блок Оплата и Доставка___________-->
                <div class="payment-delivery clearfix">
                    <h2> Оплата и доставка </h2>
                    <ul>
                        <li class="element-0">Бесплатная доставка по всей Украине!</li>
                        <li class="element-1">Без предоплаты и комиссии!</li>
                        <li class="element-2">100% гарантия возврата!</li>
                        <li class="element-3">Работаем 7 дней в неделю!<span>ПН-CБ: с 9:00 до 21:00<br>ВС: с 10:00 до 18:00</span></li>
                    </ul>
                </div>
            </div>
            <!--____________ Блок Мне нравится ______________-->
            <div class="i-like">
                <div class="vk">
                    <img src="/images/vk.jpg">
                    <!--<script type="text/javascript">
                      VK.init({
                        apiId: ВАШ_API_ID,
                        onlyWidgets: true
                      });
                    </script>
                    <div id="vk_like"></div>
                    <script type="text/javascript">
                     VK.Widgets.Like('vk_like');
                    </script>-->
                </div>
                <div class="google">
                    <!-- Place this tag where you want the +1 button to render. -->
                    <div class="g-plusone"></div>
                    <!-- Place this tag after the last +1 button tag. -->
                    <script type="text/javascript">
                        window.___gcfg = {ldelim}lang: 'ru'{rdelim};
                        (function() {ldelim}
                            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                            po.src = 'https://apis.google.com/js/platform.js';
                            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                        {rdelim})();
                    </script>
                </div>
                <div class="tviter">
                    <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
                    <script>
                        !function(d,s,id){ldelim}var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){ldelim}js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);{rdelim}{rdelim}(document, 'script', 'twitter-wjs');
                    </script>
                </div>
                <div class="facebook">
                    <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FExtraloadcomua%2F564208600302244&width&layout=button_count&action=like&show_faces=true&share=false&height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe>
                </div>
            </div>
            <!--___________Блок Параметров товара___________-->
            <div class="parameter-block">
                <div id="tabs">
                    <ul class="tabs_menu">
                        {foreach from=$diametrs item="diametr"}
                            <li class="first"><a>R{$diametr}</a></li>
                        {/foreach}
                    </ul>
                    <div class="tabs_content">
                        {foreach from=$diametrs item="diametr"}
                            <div>
                                <table>
                                    <tr>
                                        <th class="element-0">Типоразмер</th>
                                        <th class="element-1">Индекс нагрузки</th>
                                        <th class="element-1-1">Индекс скорости</th>
                                        <th class="element-1-2">Run Flat</th>
                                        {if $season["id"] == 3}
                                            <th class="element-1-3">Шипы</th>
                                        {/if}
                                        <th class="element-2">Наличие</th>
                                        <th class="element-3">Цена</th>
                                        <th class="element-4"></th>
                                        <th class="element-5"></th>
                                    </tr>
                                    {foreach from=$shins_data[$diametr] item="v"}
                                    <tr>
                                        <td class="element-0">
                                            {$v["type_size"]}
                                        </td>
                                        <td class="element-1">
                                            {$v["shins_load_index"]}
                                        </td>
                                        <td class="element-1-1">
                                            {$v["shins_speed_index"]}
                                        </td>
                                        <td class="element-1-2">
                                            {if $v["shins_run_flat_technology_id"] == 2}
                                                есть
                                            {elseif $v["shins_run_flat_technology_id"] == 3}
                                                нет
                                            {else}
                                                нет данных
                                            {/if}
                                        </td>
                                        {if $season["id"] == 3}
                                            <td class="element-1-3">
                                                {if $v["shins_spike_id"] == 2}
                                                    есть
                                                {elseif $v["shins_spike_id"] == 3}
                                                    нет
                                                {else}
                                                    нет данных
                                                {/if}
                                            </td>
                                        {/if}
                                        <td class="element-2">
                                            {if $v["amount"] >= 4}
                                                на складе
                                            {else}
                                                Нет в наличии
                                            {/if}
                                        </td>
                                        <td class="element-3">
                                            {if $v["price"] > 0 and $v["amount"] >= 4}
                                              {$v["price"]} грн.
                                            {/if}
                                        </td>
                                        <td class="element-4 add-tire">
                                            {if $v["price"] > 0 and $v["amount"] >= 4}
                                                <a href="#" tire-id="{$v["id"]}">Купить</a>
                                            {/if}
                                        </td>
                                        <td class="element-5" >
                                            {if $v["price"] > 0 and $v["amount"] >= 4}
                                                <input type="text" class="tires_count" tire-id="{$v["id"]}" value="4"> шт.
                                            {/if}
                                        </td>
                                    </tr>
                                    {/foreach}
                                </table>
                            </div>
                        {/foreach}
                    </div>
                </div>
            </div>
            {if !$display->display_description|empty_string}
            <!--___________Блок Описание товара___________-->
            <div class="product-desc">
                <h4> <span>Описание</span> </h4>
                <div class="product-desc-body">
                    {$display->display_description}
                </div>
            </div>
            {/if}
            <div class="rewievs">
                <h2> Отзывы о <a href="#">{$display->display_name}</a></h2>
                <div class="rewievs-content">
                    {foreach from=$feedbacks item="feedbackItem"}
                    <div class="rewiev-0 views-row">
                        <div class="rating">
                            <input type="hidden" name="val" value="{$feedbackItem->rating}"/>
                            <input type="hidden" name="votes" value="{$display->rating->votes}"/>
                            <input type="hidden" name="vote-id" value="f{$feedbackItem->id}"/>
                            {*<input type="hidden" name="cat_id" value="2"/>*}
                        </div>
                        <div class="rewiev-fild-title">
                            <p>{$feedbackItem->user_name} <span>{DateTimeRussian::getDate($feedbackItem->created)}</span></p>
                        </div>
                        <div class="rewiev-fild-body">
                            <p>{$feedbackItem->feedback_text}</p>
                        </div>
                        <div class="answer">
                            <a href="#">Ответить</a>
                        </div>
                    </div>
                    {/foreach}
                </div>
                <div class="rewiev-footer">
                    <a class="more-link" href="#"> Просмотреть все отзывы </a>
                </div>
            </div>
            <!--__________Блок оставить отзыв__________-->
            <div class="formblock-reviews">
                <h2>Оставить отзыв</h2>
                {*<form id="reviews-node-form" class="node-form node-reviews-form" method="post">*}
                {form name="Feedbacks" id='reviews-node-form' method="post" htmlOptions=["class"=>"node-form node-reviews-form"]}
                    <div>
                        <div class="form-item form-type-textfield form-item-title">
                            <label for="">
                                Ваше имя
                                <span class="form-required" title="Обязательно для заполнения.">*</span>
                            </label>
                            <div class="stars clearfix">
                                {$Feedbacks->textField($feedback, "user_name", ["id" => "edit-title", "class" => "form-text required", "maxlength" => 255, "size" => 60])}
                                <div class="rating">
                                    <input type="hidden" name="val" value="0"/>
                                    <input type="hidden" name="votes" value="{$display->rating->votes}"/>
                                    <input type="hidden" name="vote-id" value="new"/>
                                    {*<input type="hidden" name="cat_id" value="2"/>*}
                                </div>
                            </div>
                            {*{if $feedbackErrors["user_name"]}*}
                                {*<div style="color: red;">*}
                                    {*{$feedbackErrors["user_name"][0]}*}
                                {*</div>*}
                            {*{/if}*}
                        </div>
                        <div id="edit-body" class="field-type-text">
                            <div class="form-item form-item-body">
                                <label for="">
                                    Оставте ваше мнение
                                    <span class="form-required" title="Обязательно для заполнения.">*</span>
                                </label>
                                <div class="form-textarea-wrapper">
                                    {$Feedbacks->textArea($feedback, "feedback_text", ["id" => "edit-body", "class" => "text-full"])}
                                </div>
                                {if $feedbackErrors["feedback_text"]}
                                    <div style="color: red;">
                                        {$feedbackErrors["feedback_text"][0]}
                                    </div>
                                {/if}
                            </div>
                        </div>
                        <div id="edit-actions" class="form-actions form-wrapper">
                            <input id="edit-submit" class="form-submit" type="submit" value="Оставить отзыв">
                        </div>
                    </div>
                    {$Feedbacks->hiddenField($feedback, "rating", ["id" => "rating_hidden"])}
                {/form}
            </div>
        </div>
    </div>
</section>
<!-- фильтр для планшета и телефона -->
{*{if BrowserDetector::isMobile()}*}
    <div id="filter-tire-780" class="filter">
        {*{include file="application.views.tires._blockSearchByTiresMobile"}*}
    </div>
{*{/if}*}
