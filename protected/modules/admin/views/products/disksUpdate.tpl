{form name="Disks" id='disksEdit' htmlOptions = ["class" => "form-horizontal", 'enctype' => 'multipart/form-data']}
    {if is_null($id)}
        <h3>Создание нового диска</h3>
    {else}
        <h3>Редактирование диска {$model->product_name}</h3>
    {/if}
    <div class="row-fluid">
        <div class="span4">
            <div class="control-group">
                <label class="control-label">
                    Название:
                </label>
                <div class="controls">
                    {$Disks->textField($model, 'product_name')}
                    <span for="Disks[product_name]" class="help-inline">
                        {$Disks->error($model, 'product_name')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Производитель:
                </label>
                <div class="controls">
                    {$Disks->dropDownList(
                        $model, 'vendor_id',
                        CHtml::listData(DisksVendors::model()->findAll(["order" => "vendor_name"]), "id", "vendor_name"),
                        ["empty" => "--- Выберите значение ---"]
                    )}
                    <span for="Disks[vendor_id]" class="help-inline">
                        {$Disks->error($model, 'vendor_id')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Количество крепежных отверстий:
                </label>
                <div class="controls">
                    {$Disks->textField($model, 'disks_fixture_port_count')}
                    <span for="Disks[disks_fixture_port_count]" class="help-inline">
                        {$Disks->error($model, 'disks_fixture_port_count')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Диаметр центрального отверстия, мм:
                </label>
                <div class="controls">
                    {$Disks->textField($model, 'disks_fixture_port_diametr')}
                    <span for="Disks[disks_fixture_port_diametr]" class="help-inline">
                        {$Disks->error($model, 'disks_fixture_port_diametr')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Вылет (ET),мм:
                </label>
                <div class="controls">
                    {$Disks->textField($model, 'disks_boom')}
                    <span for="Disks[disks_boom]" class="help-inline">
                        {$Disks->error($model, 'disks_boom')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Диаметр расположения отверстий (PCD), мм:
                </label>
                <div class="controls">
                    {$Disks->textField($model, 'disks_port_position')}
                    <span for="Disks[disks_port_position]" class="help-inline">
                        {$Disks->error($model, 'disks_port_position')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Вес, кг:
                </label>
                <div class="controls">
                    {$Disks->textField($model, 'disks_weight')}
                    <span for="Disks[disks_weight]" class="help-inline">
                        {$Disks->error($model, 'disks_weight')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Ширина обода, ":
                </label>
                <div class="controls">
                    {$Disks->textField($model, 'disks_rim_width')}
                    <span for="Disks[disks_rim_width]" class="help-inline">
                        {$Disks->error($model, 'disks_rim_width')}
                    </span>
                </div>
            </div>
        </div>
        <div class="span4">
            <div class="control-group">
                <label class="control-label">
                    Диаметр обода, ":
                </label>
                <div class="controls">
                    {$Disks->textField($model, 'disks_rim_diametr')}
                    <span for="Disks[disks_rim_diametr]" class="help-inline">
                        {$Disks->error($model, 'disks_rim_diametr')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Тип:
                </label>
                <div class="controls">
                    {$Disks->dropDownList(
                        $model, 'disks_type_id',
                        CHtml::listData(DisksType::model()->findAll(["order" => "id"]), "id", "value"),
                        ["empty" => "--- Выберите значение ---"]
                    )}
                    <span for="Disks[disks_type_id]" class="help-inline">
                        {$Disks->error($model, 'disks_type_id')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Материал:
                </label>
                <div class="controls">
                    {$Disks->dropDownList(
                        $model, 'disks_material_id',
                        CHtml::listData(DisksMaterial::model()->findAll(["order" => "id"]), "id", "value"),
                        ["empty" => "--- Выберите значение ---"]
                    )}
                    <span for="Disks[disks_material_id]" class="help-inline">
                        {$Disks->error($model, 'disks_material_id')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Цвет:
                </label>
                <div class="controls">
                    {$Disks->textField($model, 'disks_color')}
                    <span for="Disks[disks_color]" class="help-inline">
                        {$Disks->error($model, 'disks_color')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Доп. информация:
                </label>
                <div class="controls">
                    {$Disks->textArea($model, 'description')}
                    <span for="Disks[description]" class="help-inline">
                        {$Disks->error($model, 'description')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Цена, грн.:
                </label>
                <div class="controls">
                    {$Disks->textField($model, 'price')}
                    <span for="Disks[price]" class="help-inline">
                        {$Disks->error($model, 'price')}
                    </span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Остаток:
                </label>
                <div class="controls">
                    {$Disks->textField($model, 'amount')}
                    <span for="Disks[amount]" class="help-inline">
                        {$Disks->error($model, 'amount')}
                    </span>
                </div>
            </div>
        </div>
        <div class="span4"></div>
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
                            <div class="img" img-id="{$image->id}" prefix="Disks" style="float: left; border: 1px solid; margin-right: 10px; padding: 5px;">
                                <div class="img_block">
                                    <img src="{imageResizer product_type="drive" imageName=$image->imageName width=100 height=60}" alt="">
                                    <a href="#">x</a>
                                </div>
                                {$image->imageName}
                            </div>
                            <input type="hidden" name="Disks[delImage][{$image->id}]" id="Disks_delImage_{$image->id}" value="0">
                        {/foreach}
                    </div>
                    {widget name = 'CMultiFileUpload'
                            model = $model
                            attribute = 'disksImages'
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
                    <span for="Disks[disksImages]" class="help-inline">
                        {$Disks->error($model, 'disksImages')}
                    </span>
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