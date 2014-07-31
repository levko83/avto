<h4>Добавление пользователя</h4>
<div class="row-fluid">
    <div class="span12">
        {form name="Users" id='formUsers' htmlOptions = ["class" => "form-horizontal"]}
            <div class="form-wizard">
                <div class="control-group">
                    <label class="control-label">
                        {$labels["login"]}
                        <span class="required">*</span>
                    </label>
                    <div class="controls">
                        {$Users->textField($model, 'login')}
                        <span for="Users[login]" class="help-inline">
                            {$Users->error($model, 'login')}
                        </span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">
                        {$labels["password"]}
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
                        {$labels["password_confirm"]}
                        <span class="required">*</span>
                    </label>
                    <div class="controls">
                        {$Users->passwordField($model, 'password_confirm')}
                        <span for="Users[password_confirm]" class="help-inline">
                            {$Users->error($model, 'password_confirm')}
                        </span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">
                        {$labels["fio"]}
                        <span class="required">*</span>
                    </label>
                    <div class="controls">
                        {$Users->textField($model, 'fio')}
                        <span for="Users[fio]" class="help-inline">
                            {$Users->error($model, 'fio')}
                        </span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">
                        {$labels["role_id"]}
                        <span class="required">*</span>
                    </label>
                    <div class="controls">
                        {$Users->dropDownList($model, 'role_id', Roles::model()->listData())}
                        <span for="Users[role_id]" class="help-inline">
                            {$Users->error($model, 'role_id')}
                        </span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">
                        {$labels["post"]}
                    </label>
                    <div class="controls">
                        {$Users->textField($model, 'post')}
                        <span for="Users[post]" class="help-inline">
                            {$Users->error($model, 'post')}
                        </span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">
                        {$labels["email"]}
                    </label>
                    <div class="controls">
                        {$Users->textField($model, 'email')}
                        <span for="Users[email]" class="help-inline">
                            {$Users->error($model, 'email')}
                        </span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">
                        Забанить
                    </label>
                    <div class="controls">
                        {$Users->checkBox($model, 'banned', ['value' => 1, 'uncheckValue' => 0])}
                        <span for="Users[banned]" class="help-inline">
                            {$Users->error($model, 'banned')}
                        </span>
                    </div>
                </div>
                <div class="form-actions">
                    <button class="btn blue" type="submit">Сохранить</button>
                </div>
            </div>
        {/form}
    </div>
</div>