<div class="row-fluid">
    <div class="span12">
        {form name="Pages" id='formPage' htmlOptions = ["class" => "form-horizontal"]}
            <div class="control-group">
                <label class="control-label">
                    Страница:
                </label>
                <div class="controls">
                    {$model->label}
                </div>
            </div>
            {if $model->hasText == 1}
            <div class="control-group">
                <label class="control-label">
                    Текст страницы: <span class="required">*</span>
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
                    {$Pages->textField($model, 'title')}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Meta (keywords):
                </label>
                <div class="controls">
                    {$Pages->textArea($model, 'meta_keywords')}
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">
                    Meta (description):
                </label>
                <div class="controls">
                    {$Pages->textArea($model, 'meta_description')}
                </div>
            </div>
            <div class="form-actions">
                <button class="btn blue" type="submit">Сохранить</button>
            </div>
        {/form}
    </div>
</div>
