<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

    const ERROR_USER_BANNED = 33;

    private $_id;

    private $_name;

    /**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
        $this->username = strtolower(trim($this->username));
        $this->password = md5($this->password);
        $user = Users::model()->find(
                    'LOWER(login)=:login and password=:pass',
                    array(
                        ":login" => $this->username,
                        ":pass" => $this->password,
                    )
                );
        $l = $user->login;
        $p = $user->password;

		if($user === null or $this->username != strtolower(trim($user->login)) or $this->password != $user->password)
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
        elseif($user->banned == 1)
            $this->errorCode = self::ERROR_USER_BANNED;
		else{
			$this->errorCode=self::ERROR_NONE;
            $this->_id = $user->id;
        }
		return !$this->errorCode;
	}

    public function getId(){
        return $this->_id;
    }

}