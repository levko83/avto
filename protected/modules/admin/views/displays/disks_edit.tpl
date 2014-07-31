<h4>Диски {$model->display_name}</h4>
<div class="row-fluid">
<div class="span3">
    {if count($images) > 0}
    <div id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
        {foreach from=$images item=image name=images}
            {if $smarty.foreach.images.first}
            <div class="item active">
            {else}
            <div class="item">
            {/if}
                <img alt="" src="{Yii::app()->baseUrl}/images/products/disks/{$image['imageName']}">
            </div>
        {/foreach}
        </div>
        {if count($images) > 1}
        <a class="carousel-control left" data-slide="prev" href="#myCarousel">
            <i class="m-icon-big-swapleft m-icon-white"></i>
        </a>
        <a class="carousel-control right" data-slide="next" href="#myCarousel">
            <i class="m-icon-big-swapright m-icon-white"></i>
        </a>
        {/if}
    </div>
    {/if}
</div>
<div class="span9"></div>
</div>
<div class="row-fluid">
<div class="span12">
{form name="DisksDisplays" id='formDisksDisplays' htmlOptions = ["class" => "form-horizontal"]}
    <div class="form-wizard">
        <div class="control-group">
            <label class="control-label">
                {$labels["title"]}
            </label>
            <div class="controls">
                {$DisksDisplays->textField($model, 'title')}
                <span for="DisksDisplays[title]" class="help-inline">
                    {$DisksDisplays->error($model, 'title')}
                </span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">
                Минимальная цена, грн
            </label>
            <div class="controls">
                {assign var=minPrice value=DisksDisplays::model()->returnMinPrice($model->id)}
                {if $minPrice > 0}
                    {$minPrice}
                {else}
                    нет в наличии
                {/if}
            </div>
        </div>
        {if $minPrice > 0}
        <div class="control-group">
            <label class="control-label">
                {$labels["actionPrice"]}
            </label>
            <div class="controls">
                {$DisksDisplays->textField($model, 'actionPrice')}
                <span for="DisksDisplays[actionPrice]" class="help-inline">
                    {$DisksDisplays->error($model, 'actionPrice')}
                </span>
            </div>
        </div>
        {/if}
        <div class="control-group">
            <label class="control-label">
                {$labels["display_description"]}
                <span class="required">*</span>
            </label>
            <div class="controls">
                {$DisksDisplays->textArea($model, 'display_description', ["class" => 'tiny'])}
                <span for="DisksDisplays[display_description]" class="help-inline">
                    {$DisksDisplays->error($model, 'display_description')}
                </span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">
                {$labels["meta_keywords"]}
                <span class="required">*</span>
            </label>
            <div class="controls">
                {$DisksDisplays->textArea($model, 'meta_keywords')}
                <span for="DisksDisplays[meta_keywords]" class="help-inline">
                    {$DisksDisplays->error($model, 'meta_keywords')}
                </span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">
                {$labels["meta_description"]}
                <span class="required">*</span>
            </label>
            <div class="controls">
                {$DisksDisplays->textArea($model, 'meta_description')}
                <span for="DisksDisplays[meta_description]" class="help-inline">
                    {$DisksDisplays->error($model, 'meta_description')}
                </span>
            </div>
        </div>
        <div class="form-actions">
            <button class="btn blue" type="submit">Сохранить дисплей</button>
        </div>
    </div>
{/form}
</div>
</div>