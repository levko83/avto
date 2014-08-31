<form action="{Yii::app()->createUrl("tires/index")}" method="post">
    <div class="tire-width form-select select">
        <h3>Ширина шины:</h3>
        {CHtml::dropDownList('Shins[shins_profile_width]', "", $tiresVocabs->shins_profile_width, ['empty' => '-все-'])}
    </div>
    <div class="tire-profil form-select select">
        <h3>Профиль:</h3>
        {CHtml::dropDownList('Shins[shins_profile_height]', "", $tiresVocabs->shins_profile_height, ['empty' => '-все-'])}
    </div>
    <div class="tire-diameter form-select select">
        <h3>Диаметр:</h3>
        {CHtml::dropDownList('Shins[shins_diametr]', "", $tiresVocabs->shins_diametr, ['empty' => '-все-'])}
    </div>
    <div class="tire-season form-select select">
        <h3>Сезонность:</h3>
        {CHtml::dropDownList('Shins[shins_season_id][]', "", $tiresVocabs->shins_season_id, ['empty' => '-все-'])}
    </div>
    <div class="form-actions">
        <input class="form-submit" type="submit" value="Подобрать шины">
    </div>
</form>