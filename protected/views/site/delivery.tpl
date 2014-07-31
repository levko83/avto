<section id="center">
    <div id="squeeze">
        <article class="node">
            <div class="p-d-wrapp clearfix">
                <h1 class="title">Оплата и доставка</h1>
                <div class="delivery p-d">
                    <div class="delivery-title p-d-title">
                        <h2>Доставка товара</h2>
                        <p>по Украине</p>
                    </div>
                    <div class="delivery-content content">
                        <div class="content-text">
                            <p>
                                <span class="bold">Доставка товара на склад транспортной компании</span>
                                <a target="_blank" href="http://novaposhta.ua/">"Новая почта"</a>
                                или
                                <a target="_blank" href="http://intime.ua/">"Интайм"</a>
                                в крупные города Украины осуществляется БЕСПЛАТНО. (см. список городов ниже)
                            </p>
                            <p>
                                <span class="bold">Адресная доставка</span>
                                товара к вашему подъезду возможна в тех городах, в которых есть склад транспортной компании
                                <a target="_blank" href="http://novaposhta.ua/">"Новая почта"</a>
                                или
                                <a target="_blank" href="http://intime.ua/">"Интайм"</a>
                                и осуществляется курьером транспортной компании.
                            </p>
                            <p> Стоимость услуги: 50 грн/заказ.</p>
                            <p>
                                Подробности уточняйте у
                                <a target="_blank" href="{Yii::app()->createUrl("site/contacts")}">менеджеров</a>
                                по телефонам:
                            </p>
                            <ul class="phones">
                                <li>
                                    <span class="grey_text">+38</span>
                                    <span class="bold">0(800) 30 77 77 </span>
                                    <span class="grey_text it"> - многоканальный</span>
                                </li>
                                <li>
                                    <span class="grey_text">+38</span>
                                    <span class="bold">(044) 492 77 77 </span>
                                    <span class="grey_text it"> - многоканальный</span>
                                </li>
                                <li class="kievstar">
                                    <span class="grey_text">+38</span>
                                    <span class="bold">(067) 160 77 77 </span>
                                </li>
                                <li class="mts">
                                    <span class="grey_text">+38</span>
                                    <span class="bold">(095) 175 77 77 </span>
                                </li>
                                <li class="life">
                                    <span class="grey_text">+38</span>
                                    <span class="bold">(093) 309 77 77 </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="payment p-d">
                    <div class="delivery-title p-d-title">
                        <h2>Оплата товара</h2>
                        <p>Уважаемые клиенты!</p>
                    </div>
                    <div class="delivery-content content">
                        <div class="content-text">
                            <p>
                                <span class="orange">С целью улучшения сервиса интернет-магазин "Rezina.CC"  все расходы по доставке товара и пересылке денег берет на себя!</span>
                            </p>
                            <ul class="advantages">
                                <li class="element-0"> Доставка бесплатно!</li>
                                <li class="element-1"> Без комиссии за пересылку!</li>
                                <li class="element-2"> Оплата только за товар!</li>
                            </ul>
                            <p> Вы оплачиваете товар только при получении заказа на складе транспортной компании в своем городе.</p>
                            <p> Оплата заказа осуществляется в гривнах за наличный расчет.</p>
                            <p>
                                <span class="grey_text it">*при заказе товара на сумму более 8тыс грн., интернет-магазин "Rezina.CC" оставляет за собой право взымать частичную предоплату</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="delivery-map">
                <h2> Карта городов, в которые осуществляется доставка </h2>
                <div id="mapdiv" style="width: 100%; background-color:#fff; height: 500px;"></div>
            </div>
            <div class="delivery-city-list">
                <p class="city-list-title">Список городов, в которые осуществляется доставка товара:</p>
                {foreach $region_groups as $region_group}
                    <ul>
                        {foreach $region_group as $region_translit => $region_name}
                            <li><a href="{Yii::app()->createUrl("site/deliveryRegion", ["region_translit" => $region_translit])}">{$region_name}</a></li>
                        {/foreach}
                    </ul>
                {/foreach}
            </div>
        </article>
    </div>
</section>
