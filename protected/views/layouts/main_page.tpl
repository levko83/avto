{$this->beginContent('//layouts/main')}
    <section id="center">
        <div id="squeeze">
            {$content}
        </div>
    </section>
    <!--________________________________ Правая Колонка ________________________________-->
    <aside id="sidebar-second">
<!--        Акции-->
        <div class="action">
            <h3>Акция!</h3>
            <div class="content clearfix">
                <div class="field field-name-body field-type-text-with-summary field-label-hidden">
                    <p>Только в период с 01.12.2013 до 01.01.2014 вы имеете возможность преобрести комплект зимних шин и получить в пару к ним бесплатные диски!
                    </p>
                </div>
            </div>
            <div class="read-all clearfix">
                <a class"read" href="#">Узнать больше об акции</a>
            </div>
        </div>
<!--        Товары со скидкой-->
        {include file="application.views.site._blockActions"}
    </aside>
    <!--_______________ Блок новостей __________________-->
    {if 1 == 0}
    <section class="sections-news news clearfix">
        <div id="block-news clearfix">
            <h2 class=title>Новости</h2>
            <div class="content clearfix">
                <div class="view-row clearfix">
                    <div class="image-row"><a href="#"><img src="/css/images/prim1.jpg" alt=" " title=" " /></a></div>
                    <div class="data text-line">31 Октября 2013</div>
                    <div class=row-title><a href="#">Компактный кроссовер Honda дебютировал официально</a></div>
                    <div class="desc text-line"><span class=label>Премьера серийного паркетника Honda Vezel состоялась сегодня на автосалоне в Токио. Уже известно, что модель станет глобальной, а в качестве базовой...<a class=linc href="/internal.html">Читать дальше</a></div>
                </div>
                <div class="view-row clearfix">
                    <div class="image-row"><a href="#"><img src="/css/images/prim2.jpg" alt=" " title=" " /></a></div>
                    <div class="data text-line">31 Октября 2013</div>
                    <div class=row-title><a href="#">Компактный кроссовер Honda дебютировал официально</a></div>
                    <div class="desc text-line"><span class=label>Премьера серийного паркетника Honda Vezel состоялась сегодня на автосалоне в Токио. Уже известно, что модель станет глобальной, а в качестве базовой...<a class=linc href="/internal.html">Читать дальше</a></div>
                </div>
            </div>
            <div class="read-all clearfix">
                <a class"read" href="#">Просмотреть все новости</a>
            </div>
        </div>
    </section>
    {/if}
{$this->endContent()}
