<!--_____________________ Левая колонка _________________________-->
{*{if !BrowserDetector::isMobile()}*}
    <aside id="sidebar-first">
        <div id="filter-tire" class="filter">
            {include file="application.views.drives._blockSearchByDrives"}
        </div>
    </aside>
{*{/if}*}
<section id="center">
    <div id="squeeze">
        <div class="products node node-10 clearfix">
            {if $this->breadcrumbs}
                {include file="application.views.site._breadcrumbs"}
            {/if}
            <div class="field field-name-title">
                <h1>Диски {$display->display_name}</h1>
            </div>
            <!--________________________________Блок Шапка продукта________________________________-->
            <div class="field field-name-product-hed">
                <!--___________Блок Галереи___________-->
                <div class="description-block">
                    <div class="product-gallery">
                        <div class="slides_container">
                            {foreach from=$images key="i" item="image"}
                                <a href="/images/products/disks/{$image["imageName"]}" data-lightbox="photo">
                                    <img class="source-image" src="{imageResizer product_type="drive" imageName=$image["imageName"] width=180 height=230}" alt="">
                                </a>
                            {/foreach}
                        </div>
                        <div class="rating">
                            <input type="hidden" name="val" value="{$display->rating->val}"/>
                            <input type="hidden" name="votes" value="{$display->rating->votes}"/>
                            <input type="hidden" name="vote-id" value="d{$display->id}"/>
                        </div>
                        <ul class="pagination">
                            {foreach from=$images key="i" item="image"}
                                {if $i < 4}
                                    <li><a href="#"><img src="{imageResizer product_type="drive" imageName=$image["imageName"] width=47 height=47}" alt=""></a></li>
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
                    </div>
                </div>
                <!--___________Блок Оплата и Доставка___________-->
				<style>
.payment-delivery > span {
font-size: 28px;
margin-bottom: 15px;
  display:block;
}
</style>
                <div class="payment-delivery clearfix">
                    <span> Оплата и доставка </span>
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
                                            <th class="element-0">PSD</th>
                                            <th class="element-1">R</th>
                                            <th class="element-2">ET</th>
                                            <th class="element-3">HUB</th>
                                            <th class="element-4">Цвет</th>
                                            <th class="element-5">Наличие</th>
                                            <th class="element-6">Цена</th>
                                            <th class="element-7"></th>
                                            <th class="element-8"></th>
                                        </tr>
                                        {foreach from=$disks_data[$diametr] item="v"}
                                            <tr>
                                                <td class="element-0">
                                                    {$v["psd"]}
                                                </td>
                                                <td class="element-1">
                                                    {if $v["disks_rim_diametr"] > 0}
                                                        {round($v["disks_rim_diametr"], 1)}
                                                    {/if}
                                                </td>
                                                <td class="element-2">
                                                    {if $v["disks_boom"] > 0}
                                                        {round($v["disks_boom"], 1)}
                                                    {/if}
                                                </td>
                                                <td class="element-3">
                                                    {if $v["disks_fixture_port_diametr"] > 0}
                                                        {round($v["disks_fixture_port_diametr"], 1)}
                                                    {/if}
                                                </td>
                                                <td class="element-4">
                                                    {$v["disks_color"]}
                                                </td>
                                                <td class="element-5">
                                                    {if $v["amount"] > 4}
                                                        {$v["amount"]} шт.
                                                    {else}
                                                        Нет в наличии
                                                    {/if}
                                                </td>
                                                <td class="element-6">
                                                    {if $v["price"] > 0}
                                                        {$v["price"]} грн.
                                                    {/if}
                                                </td>
                                                <td class="element-7 add-drive">
                                                    {if $v["amount"] > 4}
                                                        <a href="#" drive-id="{$v["id"]}">Купить</a>
                                                    {/if}
                                                </td>
                                                <td class="element-8" >
                                                    {if $v["amount"] > 4}
                                                        <input type="text" class="drives_count" drive-id="{$v["id"]}" value="4"> шт.
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
                {*{if trim($display->display_description) != ''}*}
                <!--___________Блок Описание товара___________-->
				
				
				<style>
				.product-desc nav {
  background: url(/css/images/product_option.png) repeat-x left bottom!important;
  padding-bottom: 4px;
  border-left: 1px solid #E4CC00;
  display:block;
}
.product-desc nav span {
  background: -moz-linear-gradient(#eee500, #eedb00);
  background: -webkit-linear-gradient(#eee500, #eedb00);
  background: -o-linear-gradient(#eee500, #eedb00);
  background: -ms-linear-gradient(#eee500, #eedb00);
  background: linear-gradient(#eee500, #eedb00);
  -pie-background: linear-gradient(#eee500, #eedb00)  ;
  behavior: url(pie/PIE.htc);
  display: block;
  font-weight: bold;
  padding: 8px 15px;
  text-align: center;
  width: 100px;
  border-top: 1px solid #fdf650;
  border-right: 1px solid #E4CC00;
  -webkit-box-shadow: -1px -1px 1px #e4cc00;
  box-shadow: -1px -1px 1px #e4cc00;
}
				
				</style>
                {if !$display->display_description|empty_string}
                    <div class="product-desc">
                        <nav> <span>Описание</span> </nav>
						
										<style>
				.product-desc-body > h4, .product-desc-body > h5, .product-desc-body > h6 {
font-weight:bold;
  padding: 10px 15px 5px 0px;
  background:none;
  border:none;
}

				</style>
                        <div class="product-desc-body">
                            {$display->display_description}
                        </div>
                    </div>
                {/if}
			<style>
			.rewievs > span {
			font-weight: bold;
font-size: 14px;
padding: 10px 15px;
background: #F0EEEE;
display:block;
margin-bottom: 15px;
			
			}
			</style>
            <div class="rewievs">
                <span> Отзывы о <a href="#">{$display->display_name}</a></span>
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
				<style>
			.formblock-reviews > span {
			font-weight: bold;
font-size: 14px;
padding: 0 15px 10px 15px;
background: #F0EEEE;
display:block;
margin-bottom: 15px;
			
			}
			</style>
			
			
            <div class="formblock-reviews">
                <span>Оставить отзыв</span>
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
