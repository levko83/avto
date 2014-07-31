<script type="text/javascript">
    var nmsp = {ldelim}{rdelim};           
    nmsp.shinsUrl = "{$shinsUrl}";    
</script>
Сезон: {CHtml function="dropDownList" name="season" select=$season data=$shinsSeasonList htmlOptions=["id" => "season"]}      
<ul style="margin-top: 10px; margin-left: 10px; list-style: none;">
{foreach from=$dataProvider->data item=shina}
    <li>
        <h2><a href="{$shina->url}">{$shina->product_name}</a></h2>
        <div class="product_images" style="float: left; width: 160px;">
            {if count($shina->images) > 0}
                <img class="tovar_img" src="{Yii::app()->params["imagePath"]}/{$shina->images[0]}_thm.jpg"/>            
            {else}    
                <img src="{Yii::app()->request->baseUrl}/images/no_photo.jpg"/>            
            {/if}
        </div>
        <div style="float: left;">
            <b>Характеристики:</b>
            <ul>
                <li>{$params.shins_type_of_avto_id} : {$shina->shinsTypeOfAvto->value}</li>
                <li>{$params.shins_season_id} : {$shina->shinsSeason->value}</li>
                <li>{$params.shins_diametr} : {$shina->shins_diametr}</li>
                <li>{$params.shins_profile_height} : {$shina->shins_profile_height}</li>
                <li>{$params.shins_speed_index_id} : {$shina->shinsSpeedIndex->value}</li>
                <li>{$params.shins_load_index} : {$shina->shins_load_index}</li>
                <li>{$params.shins_germetic_mode_id} : {$shina->shinsGermeticMode->value}</li>
                <li>{$params.shins_construction_id} : {$shina->shinsConstruction->value}</li>
            </ul>
        </div>
        <div style="clear: both;"></div>            
        <hr/>
    </li>
{/foreach}
</ul>
{widget name = 'CLinkPager' 
        pages = $dataProvider->pagination
        header = ''
        firstPageLabel = '<<'
        prevPageLabel = '<'
        nextPageLabel = '>'
        lastPageLabel = '>>'
}
