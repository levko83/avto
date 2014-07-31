<h2>Ваша корзина</h2>
<a class="cart-close close" href="#">X</a>

    <div class="products-cart">
        {foreach from=$cartItems key="i" item="cartItem"}
        <div class="views-row clearfix">
            <a class="product-delit close" product-id="{$cartItem->id}" product-type="{$cartItem->class}" href="#">Удалить <span>X</span><a>
            <div class="image-row">
                {*<a href="/tires.html"><img src="img/prim3.jpg" width="100" height="100" alt=" " title=" " /></a>*}
                <img src="{$cartItem->image}" alt=" " title=" " />
            </div>
            {*<div class="row-title text-line"><a href="/tires.html">ZW 610 (BP - Черный внутри полированный)</a></div>*}
            <div class="row-title text-line">{$cartItem->title}</div>
            <div class="code text-line">код товара: {$cartItem->id}</div>
            <div class="price-for-one text-line"><span>{$cartItem->price}</span> грн</div>
            <div class="quantity text-line">Кол-во<input type="text" class="change-amount" product-id="{$cartItem->id}" product-type="{$cartItem->class}" value="{$cartItem->count}">шт.</div>
            <div class="price-oll text-line"><span>{$cartItem->cost}</span> грн</div>
        </div>
        {/foreach}
    </div>
    <div class="summarized-data">
        <div id="price-finali">Итого: <span>{$summ}</span> грн</div>
        <form id="shortOrder" method="post" action="#">
            <div class="user-data">
                Ф.И.О.:*
                <input type="text" id="fio" name="fio" value="">
                Телефон:*
                <input type="text"
                       id="phone"
                       name="phone"
                       value=""
                       value="(0**)***-**-**"
                       onfocus="if ($.trim(this.value) == '(0**)***-**-**') this.value = '';"
                       onblur="if ($.trim(this.value) == '') this.value = '(0**)***-**-**';"
                        >
                <div class="cart-error"></div>
            </div>
            <div class="continue-shopping"><a href="#">Продолжить покупки</a></div>
            <div class="form-action submit">
                <input type="submit" value="Заказать">
                <a href="/order_detail.html">Детальное оформление заказа</a>
            </div>
        </form>
    </div>
</form>