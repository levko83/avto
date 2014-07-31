{*<form class="form-vertical login-form" action='{Yii::app()->createUrl("admin/login/login")}' method="post" novalidate="novalidate">*}
{form name="LoginForm"
      htmlOptions=["class" => "form-vertical login-form", "novalidate" => "novalidate"]
      action=Yii::app()->createUrl("admin/login/login")
      method="post"
}
    <h3 class="form-title">Вход в систему</h3>
    {if count($model->errors) > 0}
        <div class="alert alert-error">
            <button class="close" data-dismiss="alert"></button>
            <span>{$model->errors["password"][0]}</span>
        </div>
    {/if}
    <div class="control-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Логин</label>
        <div class="controls">
            <div class="input-icon left">
                <i class="icon-user"></i>
                {*<input class="m-wrap placeholder-no-fix" type="text" autocomplete="off" placeholder="Логин" name="login"/>*}
                {$LoginForm->textField(
                    $model,
                    "login",
                    ["class" => "m-wrap placeholder-no-fix", "autocomplete" => "off", "placeholder" => "Логин"]
                )}
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label visible-ie8 visible-ie9">Пароль</label>
        <div class="controls">
            <div class="input-icon left">
                <i class="icon-lock"></i>
                {*<input class="m-wrap placeholder-no-fix" type="password" autocomplete="off" placeholder="Пароль" name="password"/>*}
                {$LoginForm->passwordField(
                    $model,
                    "password",
                    ["class" => "m-wrap placeholder-no-fix", "autocomplete" => "off", "placeholder" => "Пароль"]
                )}
            </div>
        </div>
    </div>
    <div class="form-actions">
        <label class="checkbox">
            {*<input type="checkbox" name="remember" value="1"/> Запомнить меня*}
            {$LoginForm->checkBox(
                $model,
                "remember",
                ["value" => 1]
            )} Запомнить меня
        </label>
        <button type="submit" class="btn green pull-right">
            Войти <i class="m-icon-swapright m-icon-white"></i>
        </button>
        {*{CHtml function="htmlButton"*}
               {*label='Войти <i class="m-icon-swapright m-icon-white"></i>'*}
               {*htmlOptions=[*}
                    {*"class" => "btn green pull-right",*}
                    {*"type" => "submit"*}
               {*]*}
        {*}*}
    </div>
{/form}
<!--    <div class="forget-password">-->
<!--        <h4>Forgot your password ?</h4>-->
<!--        <p>-->
<!--            no worries, click <a href="javascript:;" id="forget-password">here</a>-->
<!--            to reset your password.-->
<!--        </p>-->
<!--    </div>    -->
{*</form>*}