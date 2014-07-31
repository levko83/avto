<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $login;
	public $password;
	public $remember;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('login, password', 'required'),
            array('login, password', 'filter', 'filter' => 'strip_tags'),
			// rememberMe needs to be a boolean
			array('remember', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
		);
	}

    public function attributeLabels(){
        return array(
            "login" => "Логин",
            "password" => "Пароль",
        );
    }

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->login,$this->password);
			if(!$this->_identity->authenticate()){
                if($this->_identity->errorCode == UserIdentity::ERROR_USER_BANNED){
                    $this->addError('password', 'Учетная запись заблокирована');
                }else{
                    $this->addError('password','Не верно введены Логин или Пароль');
                }
            }
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->remember ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity, $duration);
            if($duration > 0)
                Yii::app()->user->setState("user_remember", $duration);
			return true;
		}
		else
			return false;
	}
}
