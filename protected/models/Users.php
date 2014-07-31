<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $fio
 * @property string $login
 * @property string $password
 * @property string $password_confirm
 * @property integer $role_id
 * @property string $post
 * @property string $email
 * @property integer $banned
 *
 * The followings are the available model relations:
 * @property Roles $roles
 */
class Users extends CExtendedActiveRecord
{

    public $password_confirm;
    public $old_password;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

    public function behaviors(){
        return array(
            "StatisticaBehavior" => array(
                "class" => "application.components.StatisticaBehavior",
                "tables" => "users"
            ),
        );
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fio, role_id', 'required', 'on' => 'add, edit'),
            array('login', 'required', 'on' => 'add'),
            array('login', 'loginExists', 'on' => 'add'),
            array('password', 'required', 'on' => 'add, change_pass'),
            array('old_password', 'required', 'on' => 'change_pass'),
            array('old_password', 'findUserPassword', 'on' => 'change_pass'),
            array('password_confirm', 'required', 'on' => 'add, change_pass'),
            array('password_confirm', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли не совпадают', 'on' => 'add, change_pass'),
            array('fio, login, old_password, password, password_confirm, post', 'filter', 'filter' => 'strip_tags'),
			array('role_id, banned', 'numerical', 'integerOnly'=>true, 'on' => 'add, edit'),
			array('fio, login, password', 'length', 'max'=>50),
			array('post, email', 'length', 'max'=>100, 'on' => 'add, edit'),
            array('email', 'email', 'on' => 'add, edit'),
            array('role_id', 'exist',
                             //'allowEmpty' => false,
                             'skipOnError' => true,
                             'className' => 'Roles',
                             'attributeName' => 'id',
                             'criteria' => array(
                                 'condition' => 'id > 1',
                             ),
                             'message' => 'Выберите роль',
                             'on' => 'add, edit'
            ),
            array('role_id', 'canChangeRole', 'on' => 'edit'),
            array('banned', 'in', 'range' => array(0, 1), 'on' => 'add, edit'),
            array('banned', 'canBanned', 'on' => 'add, edit'),
			array('id, fio, login, password, role_id, post, email, banned', 'safe', 'on'=>'search, view'),
		);
	}


    public function findUserPassword($attribute,$params){
        $old_pass = Users::model()->findByPk(Yii::app()->user->id)->password;
        if(md5($this->old_password) != $old_pass){
            $this->addError($attribute, "Вы ввели неверный пороль");
        }
    }

    public function loginExists($attribute,$params){
        $cnt = Users::model()->count(
                   "UPPER(TRIM(login)) = UPPER(TRIM(:login))",
                    array(":login" => $this->login)
               );
        if($cnt > 0){
            $this->addError($attribute, "Пользователь с таким логином уже существует");
        }
    }

    public function canChangeRole($attribute, $params){
        $criteria = new CDbCriteria;
        $criteria->select = 'role';
        $criteria->compare('id', $this->role_id);
        $role = Roles::model()->find($criteria)->role;
        if($this->id == Yii::app()->user->id and Yii::app()->user->role != $role){
            $this->addError($attribute, "Вы не можете изменить себе роль");
        }
    }

    public function canBanned($attribute, $params){
        if($this->id == Yii::app()->user->id and $this->banned == 1){
            $this->addError($attribute, "Вы не можете забанить свою учетную запись");
        }
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'roles' => array(self::BELONGS_TO, 'Roles', 'role_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fio' => 'ФИО',
			'login' => 'Логин',
            'old_password' => 'Существующий пароль',
			'password' => 'Пароль',
            'password_confirm' => 'Подтверждение пароля',
			'role_id' => 'Роль',
			'post' => 'Должность',
			'email' => 'E-mail',
			'banned' => 'Статус',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('fio',$this->fio,true);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('post',$this->post,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('banned',$this->banned);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 15,
            ),
		));
	}

    public function view()
    {
        $criteria=new CDbCriteria;
        $criteria->compare('id',$this->id);
        $criteria->compare('fio',$this->fio,true);
        $criteria->compare('login',$this->login,true);
        $criteria->compare('password',$this->password,true);
        $criteria->compare('role_id',$this->role_id);
        $criteria->compare('post',$this->post,true);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('banned',$this->banned);
        $criteria->addCondition("id > 1");
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 15,
            ),
        ));
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
