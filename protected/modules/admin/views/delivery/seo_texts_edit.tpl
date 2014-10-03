<h3 class="block">Уникальный текст для {$city} ({$region})</h3>
<div class="default">
    <div class="row-fluid">
        {form name="DelivarySeo" id='DelivarySeo' htmlOptions = ["class" => "form-horizontal"]}
            <div>
                {$DelivarySeo->textArea($model, 'text', ["class" => 'tiny'])}
                <span for="DelivarySeo[text]" class="help-inline">
                    {$DelivarySeo->error($model, 'text')}
                </span>
            </div>
            <div>
                <button class="btn blue" type="submit">Сохранить</button>
            </div>
        {/form}
    </div>
</div>
