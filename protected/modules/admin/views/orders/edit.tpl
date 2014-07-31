<div class="row-fluid">
    <div class="span5">
        {include file="application.modules.admin.views.orders._filter"}
    </div>
    <div class="span7">
        {if !$order->id}
            <h2>Новый заказ</h2>
            <input type="hidden" id="order_id" value="-1">
        {else}
            <h2>Заказ № {$order->id} ({OrderStatuses::model()->findByPk($order->currStatus)->status})</h2>
            <input type="hidden" id="order_id" value="{$order->id}">
        {/if}
        {form name="Orders" id= "orderForm" htmlOptions = ["class" => "form-horizontal"]}
        <div class="form-wizard">
            <div class="control-group">
                <label class="control-label">
                    ФИО <span class="required">*</span>
                </label>
                <div class="controls">
                    {$Orders->textField($order, 'fio')}
                    <span for="Orders[fio]" class="help-inline">
                        {$Orders->error($order, 'fio')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Телефон <span class="required">*</span>
                </label>
                <div class="controls">
                    {if $order->id}
                        {$order->phone}
                    {else}
                        {$Orders->textField($order, 'phone')}
                        <span for="Orders[phone]" class="help-inline">
                            {$Orders->error($order, 'phone')}
                        </span>
                    {/if}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Область
                </label>
                <div class="controls">
                    {$Orders->textField($order, 'region')}
                    <span for="Orders[region]" class="help-inline">
                        {$Orders->error($order, 'region')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Город <span class="required">*</span>
                </label>
                <div class="controls">
                    {$Orders->textField($order, 'city')}
                    <span for="Orders[city]" class="help-inline">
                        {$Orders->error($order, 'city')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Район
                </label>
                <div class="controls">
                    {$Orders->textField($order, 'district')}
                    <span for="Orders[district]" class="help-inline">
                        {$Orders->error($order, 'district')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Улица <span class="required">*</span>
                </label>
                <div class="controls">
                    {$Orders->textField($order, 'street')}
                    <span for="Orders[street]" class="help-inline">
                        {$Orders->error($order, 'street')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Дом/кв. <span class="required">*</span>
                </label>
                <div class="controls">
                    {$Orders->textField($order, 'house_flat')}
                    <span for="Orders[house_flat]" class="help-inline">
                        {$Orders->error($order, 'house_flat')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Способ доставки <span class="required">*</span>
                </label>
                <div class="controls">
                    {$Orders->dropDownList($order,
                                           "delivary_id",
                                           CHtml::listData(OrderDeliverys::model()->findAll(), 'id', 'delivery'),
                                           ["empty" => "Выберите способ доставки"]
                                           )}
                    <span for="Orders[delivary_id]" class="help-inline">
                        {$Orders->error($order, 'delivary_id')}
                    </span>
                </div>
            </div>
            <span class="help-inline">
                {$Orders->error($order, 'detailsCount')}
            </span>
            {widget name='zii.widgets.grid.CGridView'
                    id = "orderDetailsGrid"
                    dataProvider = $detailsProvider
                    columns = [
                        [
                            'name' => 'product_type',
                            'value' => '$data["product_type"] == "disk" ? "диск" : "шина"',
                            'header' => 'Тип'
                        ],
                        [
                            'name' => 'product_id',
                            'value' => '$data["product_type"] == "disk" ? Disks::model()->findByPk($data["product_id"])->product_name : Shins::model()->findByPk($data["product_id"])->product_name',
                            'header' => 'Название'
                        ],
                        [
                            'name' => 'provider',
                            'header' => 'Поставщик'
                        ],
                        [
                            'name' => 'storeAmount',
                            'header' => 'Склад'
                        ],
                        [
                            'name' => 'price',
                            'value' => 'round($data["price"])',
                            'header' => 'Цена, грн'
                        ],
                        [
                            'name' => 'amount',
                            'type' => 'raw',
                            'value' => '"<input class=\"changeAmount\" product=\"{$data[\'product_type\']{0}}{$data[\'product_id\']}\" value=\"{$data[\'amount\']}\" />"',
                            'header' => 'Кол-во, шт.'
                        ],
                        [
                            'class' => 'CButtonColumn',
                            'template' => '{del}',
                            'header' => 'Действия',
                            'buttons' => [
                                'del' => [
                                    'label' => 'Удалить из заказа',
                                    'url' => '"{$data[\'product_type\']{0}}{$data[\'product_id\']}"',
                                    'imageUrl' => '/images/del.png',
                                    'options'=>[
                                        'class'=>'del_from_order'
                                    ]
                                ]
                            ]
                        ]
                    ]
                    enableSorting = false
            }
            <div class="row-fluid" style="padding-bottom: 20px;">
                <div class="span6">
                    <a class="btn blue" id="clearProducts" href="#"><i class="icon-repeat"></i> Очистить список товаров</a>
                </div>
                <div class="span6" style="font-size: 1.5em; text-align: right;">
                    Итого: <span id="total">{$total}</span> грн.
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Статус <span class="required">*</span>
                </label>
                <div class="controls">
                    {$Orders->dropDownList($order,
                    "status_id",
                    OrderStatuses::model()->listData($order->statusIds),
                    ["empty" => "Выберите статус заказа"]
                    )}
                    <span for="Orders[status_id]" class="help-inline">
                        {$Orders->error($order, 'status_id')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Номер декларации <span class="required">*</span>
                </label>
                <div class="controls">
                    {$Orders->textField($order, 'declaration')}
                    <span for="Orders[declaration]" class="help-inline">
                        {$Orders->error($order, 'declaration')}
                    </span>
                </div>
            </div>
            {if $comments}
            <div class="row-fluid">
                <div class="span12">
                    <div style="font-size: 1.3em; padding: 10px;"><i class="icon-comments"></i> Комментарии</div>
                    <ul class="chats">
                        {foreach from=$comments item=comment name=comments}
                            {if $smarty.foreach.comments.iteration is not even}
                                {assign var="comment_class" value="in"}
                            {else}
                                {assign var="comment_class" value="out"}
                            {/if}
                            <li class="{$comment_class}">
                                <img class="avatar" src="/bootstrap/img/avatar1_small.jpg" alt="">
                                <div class="message">
                                    <span class="arrow"></span>
                                    <span class="name">{$comment->user->fio} ({$comment->user->roles->role_description})</span>
                                    <span class="datetime"> в {date("d.m.Y H:i", $comment->addtime)}</span>
                                    <span class="body" style="padding: 10px;">{$comment->comment}</span>
                                </div>
                            </li>
                        {/foreach}
                    </ul>
                <div>
            </div>
            {/if}
            <div class="control-group">
                <label class="control-label">
                    Ваш комментарий к заказу
                </label>
                <div class="controls">
                    {$Orders->textArea($order, 'comment')}
                    <span for="Orders[comment]" class="help-inline">
                        {$Orders->error($order, 'comment')}
                    </span>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn blue" type="submit">Сохранить</button>
            </div>
        </div>
        {/form}
    </div>
</div>