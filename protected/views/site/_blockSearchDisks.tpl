<form action="{Yii::app()->createUrl("drives/index")}" method="post">
    <div class="drive-diametr form-select select">
        <h3>Диаметр:</h3>
        {CHtml::dropDownList('Disks[disks_rim_diametr]', "", $drivesVocabs->disks_rim_diametr, ['empty' => '-все-'])}
    </div>
    <div class="drive-type form-select select">
        <h3>Тип:</h3>
        {CHtml::dropDownList('Disks[disks_type_id]', "", $drivesVocabs->disks_type, ['empty' => '-все-'])}
    </div>
    <div class="drive-width form-select select">
        <h3>Ширина диска:</h3>
        {CHtml::dropDownList('Disks[disks_rim_width]', "", $drivesVocabs->disks_rim_width, ['empty' => '-все-'])}
    </div>
    <div class="drive-psd form-select select">
        <h3>PSD:</h3>
        {CHtml::dropDownList('Disks[disks_port_position]', "", $drivesVocabs->disks_port_position, ['empty' => '-все-'])}
    </div>
    <div class="drive-kpo form-select select">
        <h3>КПО:</h3>
        {CHtml::dropDownList('Disks[disks_fixture_port_count]', "", $drivesVocabs->disks_fixture_port_count, ['empty' => '-все-'])}
    </div>
    <div class="drive-et form-select select">
        <h3>ET:</h3>
        {CHtml::dropDownList('Disks[disks_boom]', "", $drivesVocabs->disks_boom, ['empty' => '-все-'])}
    </div>
    <div class="form-actions">
        <input class="form-submit" type="submit" value="Подобрать диски" name="op">
    </div>
</form>