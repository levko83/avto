{form name="News" id='formNews' htmlOptions = ["class" => "form-horizontal"]}
<div class="form-wizard">
    <div class="control-group">
        <label class="control-label">
            {$labels["title"]}
            <span class="required">*</span>
        </label>
        <div class="controls">
            {$News->textField($model, 'title', ['style'=> "width: 750px;"])}
            <span for="News[title]" class="help-inline">
                {$News->error($model, 'title')}
            </span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">
            {$labels["short"]}
            <span class="required">*</span>
        </label>
        <div class="controls">
            {$News->textArea($model, 'short', ["class" => 'tiny'])}
            <span for="News[short]" class="help-inline">
                {$News->error($model, 'short')}
            </span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">
            {$labels["body"]}
            <span class="required">*</span>
        </label>
        <div class="controls">
            {$News->textArea($model, 'body', ["class" => 'tiny'])}
            <span for="News[body]" class="help-inline">
                {$News->error($model, 'body')}
            </span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">
            {$labels["search_keywords"]}
        </label>
        <div class="controls">
            {$News->textArea($model, 'search_keywords', ['style'=> "width: 750px; height: 200px;"])}
            <span for="News[search_keywords]" class="help-inline">
                {$News->error($model, 'search_keywords')}
            </span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">
            {$labels["search_description"]}
        </label>
        <div class="controls">
            {$News->textArea($model, 'search_description', ['style'=> "width: 750px; height: 200px;"])}
            <span for="News[search_description]" class="help-inline">
                {$News->error($model, 'search_description')}
            </span>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label">
            {$labels["published"]}
        </label>
        <div class="controls">
            {$News->checkBox($model, 'published', ['value' => 1, 'uncheckValue' => 0])}
            <span for="News[published]" class="help-inline">
                {$News->error($model, 'published')}
            </span>
        </div>
    </div>
    <div class="form-actions">
        <button class="btn blue" type="submit">Сохранить</button>
    </div>
</div>
{/form}
