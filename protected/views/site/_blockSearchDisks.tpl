<form action="{Yii::app()->createUrl("drives/index")}" method="post">
<style>
section.tire-drive .tire-drive-form .form-select > span {
color: #000;
font-weight: lighter;
margin: 0 0 10px;
display:block;
</style>
    <div class="drive-diametr form-select select">
        <span>Диаметр:</span>
        {CHtml::dropDownList('Disks[disks_rim_diametr]', "", $drivesVocabs->disks_rim_diametr, ['empty' => '-все-'])}
    </div>
    <div class="drive-type form-select select">
        <span>Тип:</span>
        {CHtml::dropDownList('Disks[disks_type_id]', "", $drivesVocabs->disks_type_id, ['empty' => '-все-'])}
    </div>
    <div class="drive-width form-select select">
        <span>Ширина диска:</span>
        {CHtml::dropDownList('Disks[disks_rim_width]', "", $drivesVocabs->disks_rim_width, ['empty' => '-все-'])}
    </div>
    <div class="drive-psd form-select select">
        <span>PSD:</span>
        {CHtml::dropDownList('Disks[disks_port_position]', "", $drivesVocabs->disks_port_position, ['empty' => '-все-'])}
    </div>
    <div class="drive-kpo form-select select">
        <span>КПО:</span>
        {CHtml::dropDownList('Disks[disks_fixture_port_count]', "", $drivesVocabs->disks_fixture_port_count, ['empty' => '-все-'])}
    </div>
    <div class="drive-et form-select select">
        <span>ET:</span>
        {CHtml::dropDownList('Disks[disks_boom]', "", $drivesVocabs->disks_boom, ['empty' => '-все-'])}
    </div>
    <div class="form-actions">
        <input class="form-submit" type="submit" value="Подобрать диски" name="op">
    </div>
</form>