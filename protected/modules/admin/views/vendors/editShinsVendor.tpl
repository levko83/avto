<div class="row-fluid">
    <div class="span12">
        {form name="ShinsVendors" id='formVendorEdit' htmlOptions = ["class" => "form-horizontal", 'enctype' => 'multipart/form-data']}
            <div class="tabbable tabbable-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#tab_1">Основное</a>
                    </li>
                    <li class="">
                        <a data-toggle="tab" href="#tab_2">SEO</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab_1" class="tab-pane active">
                        <div class="control-group">
                            <label class="control-label">
                                Производитель:
                            </label>
                            <div class="controls">
                                {$model->vendor_name}
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">
                                Логотип:
                            </label>
                            <div class="controls">
                                {$ShinsVendors->hiddenField($model, 'delImg')}
                                <div id="imgView" class="{if empty($model->image)}hide{/if}">
                                    <img class="source-image" src="{imageResizer product_type="shins_vendor" imageName=$model->image width=75 height=75}" alt="">
                                    <a id="delImg" href="#">Удалить</a>
                                </div>
                                <div id="imgInput" class="{if !empty($model->image)}hide{/if}">
                                    {$ShinsVendors->fileField($model, 'image')}
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">
                                Описание:
                            </label>
                            <div class="controls">
                                {$ShinsVendors->textArea($model, 'description', ["class" => 'tiny'])}
                            </div>
                        </div>
                    </div>
                    <div id="tab_2" class="tab-pane">
                        <div class="control-group">
                            <label class="control-label">
                                Title:
                            </label>
                            <div class="controls">
                                {$ShinsVendors->textField($model, 'title')}
                                <span for="ShinsVendors[title]" class="help-inline">
                                    {$ShinsVendors->error($model, 'title')}
                                </span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">
                                Meta (keywords):
                            </label>
                            <div class="controls">
                                {$ShinsVendors->textArea($model, 'meta_keywords')}
                                <span for="ShinsVendors[meta_keywords]" class="help-inline">
                                    {$ShinsVendors->error($model, 'meta_keywords')}
                                </span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">
                                Meta (description):
                            </label>
                            <div class="controls">
                                {$ShinsVendors->textArea($model, 'meta_description')}
                                <span for="ShinsVendors[meta_keywords]" class="help-inline">
                                    {$ShinsVendors->error($model, 'meta_description')}
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn blue" type="submit">Сохранить</button>
            </div>
        {/form}
    </div>
</div>