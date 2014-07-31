<img class="page-lock-img" src="{Yii::app()->request->baseUrl}/bootstrap/img/profile/profile.jpg" alt="">
<div class="page-lock-info">
    <h1>{Yii::app()->session["user_fio"]}</h1>
    {*<span>bob@keenthemes.com</span>*}
    <span><em>Заблокирован</em></span>
    {*<form class="form-search" action="index.html">*}
    {form name="LoginForm"
        htmlOptions=["class" => "form-search"]
        action=Yii::app()->createUrl("admin/login/lock")
        method="post"
    }
        {if count($model->errors) > 0}
            <div class="alert alert-error">
                <button class="close" data-dismiss="alert"></button>
                <span style="color: #B94A48;">{$model->errors["password"][0]}</span>
            </div>
        {/if}
        <div class="input-append">
            {*<input type="text" class="m-wrap" placeholder="Password">*}
            {$LoginForm->passwordField(
                $model,
                "password",
                ["class" => "m-wrap", "autocomplete" => "off", "placeholder" => "Пароль"]
            )}
            <button type="submit" class="btn blue icn-only"><i class="m-icon-swapright m-icon-white"></i></button>
        </div>
        <div class="relogin">
            <a href="{Yii::app()->createUrl("admin/login/logout")}">Войти в систему под другим именем ?</a>
        </div>
    {/form}
</div>