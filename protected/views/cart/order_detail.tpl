<section id="center">
    <div id="squeeze">
        <div class="detailed-ordering">
            <h2>Оформление заказа</h2>
            <div class="content clearfix">
                <!--_____________________ Корзина __________________________-->
                <div id="cart-block">
                    <h2>Ваш заказ</h2>
                    <a class="cart-close close" href="#">X</a>
                    <form>
                        <div class="products-cart-page">
                            {foreach from=$cartItems key="i" item="cartItem"}
                            <div class="views-row clearfix">
                                <a class="product-delit close" product-id="{$cartItem->id}" product-type="{$cartItem->class}"href="#"><span>X</span><a>
                                <div class="image-row">
                                    <img src="{$cartItem->image}" alt=" " title=" " />
                                </div>
                                <div class="row-title text-line">{$cartItem->title}</div>
                                <div class="code text-line">код товара: {$cartItem->id}</div>
                                <div class="price-for-one text-line"><span>{$cartItem->price}</span> грн</div>
                                <div class="quantity text-line">Кол-во<input type="text" class="change-amount" product-id="{$cartItem->id}" product-type="{$cartItem->class}" value="{$cartItem->count}">шт.</div>
                                <div class="price-oll text-line"><span>{$cartItem->cost}</span> грн</div>
                            </div>
                            {/foreach}
                        </div>
                        <div class="summarized-data">
                            <div id="price-finali">Итого: <span><span>{$summ}</span>грн</span></div>
                        </div>
                    </form>
                </div>
                <!--_____________________ Форма оформления ______________________-->
                <div class="detailed-ordering-form">
                    <div class="content">
                        <div id="block-web-form-application">
                            <div class="content">
                                {*<form id="web-form-application" class="client-form" accept-charset="UTF-8" method="post" action="/">*}
                                {form name="DetailOrder" id="web-form-application" htmlOptions = ["class" => "client-form"]}
                                    <div class="fio">
                                        <div class="content">
                                            <div class="cart-error" style="font-size: 2em;">
                                                {$DetailOrder->error($order, 'other')}
                                            </div>
                                            <div id="webform-component-vashe-imya" class="form-item webform-component webform-component-textfield">
                                                <label>ФИО:<span>*</span></label>
                                                {*<input id="vashe-imya" class="form-text" type="text" required>*}
                                                {$DetailOrder->textField($order, 'fio', ["class" => "form-text"])}
                                                <div class="cart-error">
                                                    {$DetailOrder->error($order, 'fio')}
                                                </div>
                                            </div>
                                            <div id="webform-component-telefon" class="form-item webform-component webform-component-textfield">
                                                <label>Телефон:<span>*</span></label>
                                                {$DetailOrder->textField($order, 'phone', ["class" => "form-text"])}
                                                <div class="cart-error">
                                                    {$DetailOrder->error($order, 'phone')}
                                                </div>
                                            </div>
                                            {*<div id="webform-component-e-mail" class="form-item webform-component webform-component-textfield">*}
                                                {*<label>E-mail:<span>*</span></label>*}
                                                {*{$DetailOrder->textField($order, 'email', ["class" => "form-text"])}*}
                                                {*<div class="cart-error">*}
                                                    {*{$DetailOrder->error($order, 'email')}*}
                                                {*</div>*}
                                            {*</div>*}
                                        </div>
                                    </div>
                                    <div class="address-select">
                                        <div class="content clearfix">
                                            <div class="delivery-method form-select select">
                                                <label>Способ доставки:<span>*</span></label>
                                                {$DetailOrder->dropDownList($order,
                                                                       "delivary_id",
                                                                        CHtml::listData(OrderDeliverys::model()->findAll(), 'id', 'delivery'),
                                                                        ["empty" => "- способ доставки -"]
                                                                        )}
                                                <div class="cart-error">
                                                    {$DetailOrder->error($order, 'delivary_id')}
                                                </div>
                                            </div>
                                            <div class="region form-select select">
                                                <label>Область:<span>*</span></label>
                                                {$DetailOrder->textField($order, 'region', ["class" => "form-text"])}
                                                <div class="cart-error">
                                                    {$DetailOrder->error($order, 'region')}
                                                </div>
                                            </div>
                                            <div class="city form-select select">
                                                <label>Город:<span>*</span></label>
                                                {$DetailOrder->textField($order, 'city', ["class" => "form-text"])}
                                                <div class="cart-error">
                                                    {$DetailOrder->error($order, 'city')}
                                                </div>
                                            </div>
                                            {*<div class="warehouse form-select select">*}
                                                {*<label>Склад:</label>*}
                                                {*<input id="warehouse" class="form-text" type="text">*}
                                            {*</div>*}
                                        </div>
                                    </div>
                                    <p>Сроки доставки 1-3 дня. Как груз прибудет на склад, Вам обязательно придёт SMS уведомление.</p>
                                    <div class="wishes">
                                        <div class="content">
                                            <div id="webform-component-soobshchenie" class="form-item clearfix webform-component">
                                                <label for="text-wishes">Коментарии к заказу: </label>
                                                <div class="form-textarea-wrapper">
                                                    {$DetailOrder->textArea($order, 'comment', ["class" => "form-textarea"])}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="edit-actions" class="form-actions form-wrapper">
                                        <input id="edit-submit" class="form-submit" type="submit" value="ОФОРМИТЬ ЗАКАЗ" name="op">
                                    </div>
                                {/form}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>