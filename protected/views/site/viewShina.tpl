{assign var="imgPath" value=Yii::app()->params["imagePath"]}

<div style="float: left; width: 160px;">
    {if count($shina->images) > 0}     
        {foreach from=$shina->images item=image name=images}            
            <a href="{$imgPath}/{$image}.jpg" title="" data-rel="colorbox">                
                {if $smarty.foreach.images.first}
                    <img class="tovar_img" src="{$imgPath}/{$image}_thm.jpg" alt="">                
                {/if}                
            </a>    
        {/foreach}
        <img class="no_photo" src="{Yii::app()->request->baseUrl}/images/no_photo.jpg"/>
    {else}
        <img src="{Yii::app()->request->baseUrl}/images/no_photo.jpg"/>
    {/if}
</div>
<div style="float: left; margin-left: 10px;">
    <b>Характеристики:</b>
    <ul>
    {foreach from=ShinsParams::model()->_toArray() key=propName item=propText}
        <li>{$propText} : {$shina->getSingleData($propName)}</li>
    {/foreach}
    </ul>
</div>