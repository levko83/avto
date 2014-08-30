<div class="row-fluid">
    <div class="span12">
        {form name="Pages" id='formPage' htmlOptions = ["class" => "form-horizontal"]}
            <div class="control-group">
                <label class="control-label">
                    Страница:
                </label>
                <div class="controls">
                    <strong>{$model->label}</strong>
                </div>
            </div>
            {if $model->hasTemplate == 1}
                <div class="form-actions">
                    В полях ввода доступны шаблоны для подстановки:
                    <ul>
                        {foreach unserialize($model->template_keywords) as $keyword}
                            <li><strong>{ldelim}{$keyword["keyword"]}{rdelim}</strong> - {$keyword["keyword_description"]}</li>
                        {/foreach}
                    </ul>
                </div>
            {/if}
            {if $model->hasHeader == 1}
            <div class="control-group">
                <label class="control-label">
                    Заголовок:
                </label>
                <div class="controls">
                    {$Pages->textField($model, 'header', ['style'=> "width: 750px;"])}
                </div>
            </div>
            {/if}
            {if $model->hasText == 1}
            <div class="control-group">
                <label class="control-label">
                    Текст страницы:
                </label>
                <div class="controls">
                    {$Pages->textArea($model, 'text', ["class" => 'tiny'])}
                    <span for="Pages[text]" class="help-inline">
                        {$Pages->error($model, 'text')}
                    </span>
                </div>
            </div>
            {/if}
            <div class="control-group">
                <label class="control-label">
                    Title:
                </label>
                <div class="controls">
                    {$Pages->textField($model, 'title', ['style'=> "width: 750px;"])}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Meta Keywords:
                </label>
                <div class="controls">
                    {$Pages->textArea($model, 'meta_keywords', ['style'=> "width: 750px; height: 200px;'"])}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Meta Description:
                </label>
                <div class="controls">
                    {$Pages->textArea($model, 'meta_description', ['style'=> "width: 750px; height: 200px;"])}
                </div>
            </div>
            <div class="form-actions">
                <button class="btn blue" type="submit">Сохранить</button>
            </div>
        {/form}
    </div>
</div>
