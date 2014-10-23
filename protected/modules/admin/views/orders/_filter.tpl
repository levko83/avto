<div class="portlet box blue tabbable">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-reorder"></i>
            <span class="hidden-480">Товары</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="tabbable portlet-tabs">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#portlet_shins">Шины</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#portlet_disks">Диски</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="portlet_shins" class="tab-pane active">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-filter"></i>
                                Фильтр
                            </div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;"></a>
                            </div>
                        </div>
                        <div class="portlet-body" style="padding: 10px;">
                            {include file="application.modules.admin.views.orders._filterShins"}
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12" style="padding: 5px;">
                            {widget name='zii.widgets.grid.CGridView'
                                    id = "shinsFilterGrid"
                                    dataProvider = $shins->filter()
                                    beforeAjaxUpdate = 'function(id, options){
                                                                           options.type = "POST";
                                                                           options.data = $("#shinsFormFilter").serialize();
                                                                        }'
                                    columns = [
                                        [
                                            'name' => 'id',
                                            'sortable' => 'false'
                                        ],
                                        [
                                            'name' => 'diller_name',
                                            'header' => 'Поставщик',
                                            'sortable' => 'false'
                                        ],
                                        [
                                            'name' => 'product_name',
                                            'sortable' => 'false'
                                        ],
                                        [
                                            'name' => 'price',
                                            'value' => 'round($data->price)',
                                            'sortable' => 'false'
                                        ],
                                        [
                                            'name' => 'amount',
                                            'sortable' => 'false'
                                        ],
                                        [
                                            'class' => 'CButtonColumn',
                                            'template' => '{add}',
                                            'header' => 'Действия',
                                            'buttons' => [
                                                'add' => [
                                                    'label' => 'Добавить в заказ',
                                                    'url' => '\'s\'.$data->id',
                                                    'imageUrl' => '/images/add.png',
                                                    'options'=>[
                                                        'class'=>'add_to_order'
                                                    ]
                                                ]
                                            ]
                                        ]
                                    ]
                            }
                        </div>
                    </div>
                </div>
                <div id="portlet_disks" class="tab-pane">
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-filter"></i>
                                Фильтр
                            </div>
                            <div class="tools">
                                <a class="collapse" href="javascript:;"></a>
                            </div>
                        </div>
                        <div class="portlet-body" style="padding: 10px;">
                            {include file="application.modules.admin.views.orders._filterDisks"}
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12" style="padding: 5px;">
                            {widget name='zii.widgets.grid.CGridView'
                                    id = "disksFilterGrid"
                                    dataProvider = $disks->filter()
                                    beforeAjaxUpdate = 'function(id, options){
                                                           options.type = "POST";
                                                           options.data = $("#disksFormFilter").serialize();
                                                        }'
                                    columns = [
                                        [
                                            'name' => 'id',
                                            'sortable' => 'false'
                                        ],
                                        [
                                            'name' => 'diller_name',
                                            'header' => 'Поставщик',
                                            'sortable' => 'false'
                                        ],
                                        [
                                            'name' => 'product_name',
                                            'sortable' => 'false'
                                        ],
                                        [
                                            'name' => 'price',
                                            'value' => 'round($data->price)',
                                            'sortable' => 'false'
                                        ],
                                        [
                                            'name' => 'amount',
                                            'sortable' => 'false'
                                        ]
                                    ]
                            }
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>