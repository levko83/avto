<h2>Просмотр логов</h2>
<div class="row-fluid">
    <div class="span12">
        {if isset($err)}
            <div class="alert alert-danger">
                {$err}
            </div>
        {else}
            <div class="tabbable tabbable-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#tab_1_1">Error <span class="badge">{$result["error"]->totalItemCount}</span></a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab_1_2">Info <span class="badge">{$result["info"]->totalItemCount}</span></a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab_1_1" class="tab-pane active">
                        <div class="row-fluid">
                            <div class="span12">
                                {widget name = "zii.widgets.CListView"
                                        dataProvider = $result["error"]
                                        itemView = "_logTabItem"
                                        ajaxUpdate = false
                                        summaryText = 'c <b>{start}</b> по <b>{end}</b> из <b>{count}</b>'
                                        template = '{summary} {items} {pager}'
                                        pager = [
                                            'class' => 'CLinkPager',
                                            'header' => false,
                                            'htmlOptions' => ['class'=>'pager']
                                        ]
                                }
                            </div>
                        </div>
                    </div>
                    <div id="tab_1_2" class="tab-pane">
                        <div class="row-fluid">
                            <div class="span12">
                                {widget name = "zii.widgets.CListView"
                                        dataProvider = $result["info"]
                                        itemView = "_logTabItem"
                                        ajaxUpdate = false
                                        summaryText = 'c <b>{start}</b> по <b>{end}</b> из <b>{count}</b>'
                                        template = '{summary} {items} {pager}'
                                        pager = [
                                            'class' => 'CLinkPager',
                                            'header' => false,
                                            'htmlOptions' => ['class'=>'pager']
                                        ]
                                }
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {/if}
    </div>
</div>