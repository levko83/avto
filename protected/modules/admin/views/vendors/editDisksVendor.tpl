<div class="row-fluid">
    <div class="span12">
        {form name="DisksVendors" id='formVendorEdit' htmlOptions = ["class" => "form-horizontal", 'enctype' => 'multipart/form-data']}
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
                                {$DisksVendors->hiddenField($model, 'delImg')}
                                <div id="imgView" class="{if empty($model->image)}hide{/if}">
                                    <img class="source-image" src="{imageResizer product_type="disks_vendor" imageName=$model->image width=75 height=75}" alt="">
                                    <a id="delImg" href="#">Удалить</a>
                                </div>
                                <div id="imgInput" class="{if !empty($model->image)}hide{/if}">
                                    {$DisksVendors->fileField($model, 'image')}
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">
                                Описание:
                            </label>
                            <div class="controls">
                                {$DisksVendors->textArea($model, 'description', ["class" => 'tiny'])}
                            </div>
                        </div>
                    </div>
                    <div id="tab_2" class="tab-pane">
                        <div class="control-group">
                            <label class="control-label">
                                Title:
                            </label>
                            <div class="controls">
                                {$DisksVendors->textField($model, 'title')}
                                <span for="DisksVendors[title]" class="help-inline">
                                    {$DisksVendors->error($model, 'title')}
                                </span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">
                                Meta (keywords):
                            </label>
                            <div class="controls">
                                {$DisksVendors->textArea($model, 'meta_keywords')}
                                <span for="DisksVendors[meta_keywords]" class="help-inline">
                                    {$DisksVendors->error($model, 'meta_keywords')}
                                </span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">
                                Meta (description):
                            </label>
                            <div class="controls">
                                {$DisksVendors->textArea($model, 'meta_description')}
                                <span for="DisksVendors[meta_keywords]" class="help-inline">
                                    {$DisksVendors->error($model, 'meta_description')}
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