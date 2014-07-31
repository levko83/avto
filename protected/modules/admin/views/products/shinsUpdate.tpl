{form name="Shins" id='shinsEdit' htmlOptions = ["class" => "form-horizontal", 'enctype' => 'multipart/form-data']}
    {if is_null($id)}
        <h3>Создание новой шины</h3>
    {else}
        <h3>Редактирование шины {$model->product_name}</h3>
    {/if}
    <div class="row-fluid">
        <div class="span4">
            <div class="control-group">
                <label class="control-label">
                    Название:
                </label>
                <div class="controls">
                    {$Shins->textField($model, 'product_name')}
                    <span for="Shins[product_name]" class="help-inline">
                        {$Shins->error($model, 'product_name')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Производитель:
                </label>
                <div class="controls">
                    {$Shins->dropDownList(
                        $model, 'vendor_id',
                        CHtml::listData(ShinsVendors::model()->findAll(["order" => "vendor_name"]), "id", "vendor_name"),
                        ["empty" => "--- Выберите значение ---"]
                    )}
                    <span for="Shins[vendor_id]" class="help-inline">
                        {$Shins->error($model, 'vendor_id')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Тип автомобиля:
                </label>
                <div class="controls">
                    {$Shins->dropDownList(
                        $model, 'shins_type_of_avto_id',
                        CHtml::listData(ShinsTypeOfAvto::model()->findAll(["order" => "id"]), "id", "value"),
                        ["empty" => "--- Выберите значение ---"]
                    )}
                    <span for="Shins[shins_type_of_avto_id]" class="help-inline">
                        {$Shins->error($model, 'shins_type_of_avto_id')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Сезонность:
                </label>
                <div class="controls">
                    {$Shins->dropDownList(
                        $model, 'shins_season_id',
                        CHtml::listData(ShinsSeason::model()->findAll(["order" => "id"]), "id", "value"),
                        ["empty" => "--- Выберите значение ---"]
                    )}
                    <span for="Shins[shins_season_id]" class="help-inline">
                        {$Shins->error($model, 'shins_season_id')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Ширина профиля, мм:
                </label>
                <div class="controls">
                    {$Shins->textField($model, 'shins_profile_width')}
                    <span for="Shins[shins_profile_width]" class="help-inline">
                        {$Shins->error($model, 'shins_profile_width')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Способ герметизации:
                </label>
                <div class="controls">
                    {$Shins->dropDownList(
                        $model, 'shins_germetic_mode_id',
                        CHtml::listData(ShinsGermeticMode::model()->findAll(["order" => "id"]), "id", "value"),
                        ["empty" => "--- Выберите значение ---"]
                    )}
                    <span for="Shins[shins_germetic_mode_id]" class="help-inline">
                        {$Shins->error($model, 'shins_germetic_mode_id')}
                    </span>
                </div>
            </div>
        </div>
        <div class="span4">
            <div class="control-group">
                <label class="control-label">
                    Высота профиля, %:
                </label>
                <div class="controls">
                    {$Shins->textField($model, 'shins_profile_height')}
                    <span for="Shins[shins_profile_height]" class="help-inline">
                        {$Shins->error($model, 'shins_profile_height')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Диаметр, ":
                </label>
                <div class="controls">
                    {$Shins->textField($model, 'shins_diametr')}
                    <span for="Shins[shins_diametr]" class="help-inline">
                        {$Shins->error($model, 'shins_diametr')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Индекс скорости:
                </label>
                <div class="controls">
                    {$Shins->dropDownList(
                        $model, 'shins_speed_index_id',
                        CHtml::listData(ShinsSpeedIndex::model()->findAll(["order" => "id"]), "id", "value"),
                        ["empty" => "--- Выберите значение ---"]
                    )}
                    <span for="Shins[shins_speed_index_id]" class="help-inline">
                        {$Shins->error($model, 'shins_speed_index_id')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Индекс нагрузки:
                </label>
                <div class="controls">
                    {$Shins->textField($model, 'shins_load_index')}
                    <span for="Shins[shins_load_index]" class="help-inline">
                        {$Shins->error($model, 'shins_load_index')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Технология RunFlat:
                </label>
                <div class="controls">
                    {$Shins->dropDownList(
                        $model, 'shins_run_flat_technology_id',
                        CHtml::listData(VocabularyAvailability::model()->findAll(["order" => "id"]), "id", "value"),
                        ["empty" => "--- Выберите значение ---"]
                    )}
                    <span for="Shins[shins_run_flat_technology_id]" class="help-inline">
                        {$Shins->error($model, 'shins_run_flat_technology_id')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Конструкция:
                </label>
                <div class="controls">
                    {$Shins->dropDownList(
                        $model, 'shins_construction_id',
                        CHtml::listData(ShinsConstruction::model()->findAll(["order" => "id"]), "id", "value"),
                        ["empty" => "--- Выберите значение ---"]
                    )}
                    <span for="Shins[shins_construction_id]" class="help-inline">
                        {$Shins->error($model, 'shins_construction_id')}
                    </span>
                </div>
            </div>
        </div>
        <div class="span4">
            <div class="control-group">
                <label class="control-label">
                    Шипы:
                </label>
                <div class="controls">
                    {$Shins->dropDownList(
                        $model, 'shins_spike_id',
                        CHtml::listData(VocabularyAvailability::model()->findAll(["order" => "id"]), "id", "value"),
                        ["empty" => "--- Выберите значение ---"]
                    )}
                    <span for="Shins[shins_spike_id]" class="help-inline">
                        {$Shins->error($model, 'shins_spike_id')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Доп. информация:
                </label>
                <div class="controls">
                    {$Shins->textArea($model, 'description')}
                    <span for="Shins[description]" class="help-inline">
                        {$Shins->error($model, 'description')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Цена, грн.:
                </label>
                <div class="controls">
                    {$Shins->textField($model, 'price')}
                    <span for="Shins[price]" class="help-inline">
                        {$Shins->error($model, 'price')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Остаток:
                </label>
                <div class="controls">
                    {$Shins->textField($model, 'amount')}
                    <span for="Shins[amount]" class="help-inline">
                        {$Shins->error($model, 'amount')}
                    </span>
                </div>
            </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="control-group">
                <label class="control-label">
                    Изображения:
                </label>
                <div class="controls">
                    <div style="overflow: hidden; margin-bottom: 10px;">
                        {foreach $model->images as $image}
                            <div class="img" img-id="{$image->id}" prefix="Shins" style="float: left; border: 1px solid; margin-right: 10px; padding: 5px;">
                                <div class="img_block">
                                    <img src="{imageResizer product_type="tire" imageName=$image->imageName width=100 height=60}" alt="">
                                    <a href="#">x</a>
                                </div>
                                {$image->imageName}
                            </div>
                            <input type="hidden" name="Shins[delImage][{$image->id}]" id="Shins_delImage_{$image->id}" value="0">
                        {/foreach}
                    </div>
                    {widget name = 'CMultiFileUpload'
                            model = $model
                            attribute = 'shinsImages'
                            accept = 'jpeg|jpg|gif|png'
                            max = 25
                            remove = 'x'
                            duplicate = 'Данный файл уже существует'
                            denied = 'Ошибочный формат файла'
                            options = [
                                'afterFileAppend' => 'addFile(e, v, m)'
                            ]
                            htmlOptions = [
                                'multiple' => 'multiple'
                            ]
                    }
                    <span for="Shins[shinsImages]" class="help-inline">
                        {$Shins->error($model, 'shinsImages')}
                    </span>
                </div>
            </div>
        </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="form-actions">
                <button class="btn blue" type="submit">Сохранить</button>
            </div>
        </div>
    </div>
{/form}