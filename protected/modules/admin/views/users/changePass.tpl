<h4>Изменение пароля</h4>
<div class="row-fluid">
    <div class="span12">
        {form name="Users" id='formChangePass' htmlOptions = ["class" => "form-horizontal"]}
            <div class="form-wizard">
                <div class="control-group">
                    <label class="control-label">
                        Существующий пароль
                        <span class="required">*</span>
                    </label>
                    <div class="controls">
                        {$Users->passwordField($model, 'old_password')}
                        <span for="Users[old_password]" class="help-inline">
                            {$Users->error($model, 'old_password')}
                        </span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">
                        Новый пароль
                        <span class="required">*</span>
                    </label>
                    <div class="controls">
                        {$Users->passwordField($model, 'password')}
                        <span for="Users[password]" class="help-inline">
                            {$Users->error($model, 'password')}
                        </span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">
                        Подтверждение пароля
                        <span class="required">*</span>
                    </label>
                    <div class="controls">
                        {$Users->passwordField($model, 'password_confirm')}
                        <span for="Users[password_confirm]" class="help-inline">
                            {$Users->error($model, 'password_confirm')}
                        </span>
                    </div>
                </div>
                <div class="form-actions">
                    <button class="btn blue" type="submit">Изменить пароль</button>
                </div>
            </div>
        {/form}
    </div>
</div>