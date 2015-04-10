<form action="{Yii::app()->createUrl("tires/index")}" method="post">
<style>
section.tire-drive .tire-drive-form .form-select > span {
color: #000;
font-weight: lighter;
margin: 0 0 10px;
display:block;
</style>
    <div class="tire-width form-select select">
        <span>Ширина шины:</span>
        {CHtml::dropDownList('Shins[shins_profile_width]', "", $tiresVocabs->shins_profile_width, ['empty' => '-все-'])}
    </div>
    <div class="tire-profil form-select select">
        <span>Профиль:</span>
        {CHtml::dropDownList('Shins[shins_profile_height]', "", $tiresVocabs->shins_profile_height, ['empty' => '-все-'])}
    </div>
    <div class="tire-diameter form-select select">
        <span>Диаметр:</span>
        {CHtml::dropDownList('Shins[shins_diametr]', "", $tiresVocabs->shins_diametr, ['empty' => '-все-'])}
    </div>
    <div class="tire-season form-select select">
        <span>Сезонность:</span>
        {CHtml::dropDownList('Shins[shins_season_id][]', "", $tiresVocabs->shins_season_id, ['empty' => '-все-'])}
    </div>
    <div class="form-actions">
        <input class="form-submit" type="submit" value="Подобрать шины">
    </div>
</form>