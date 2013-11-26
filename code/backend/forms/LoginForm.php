<?php
class LoginForm extends FormModel
{
	public $username;
	public $password;

	private $_identity;

	public function rules()
	{
		return array(
			array( 'username, password', 'required' ),
			array( 'password', 'authenticate' )
		);
	}

	public function attributeLabels()
	{
		return array(
			'username' => Yii::t( 'login', 'username' ),
			'password' => Yii::t( 'login', 'password' ),
		);
	}

	public function authenticate($attribute,$params)
	{
		if (!UserAuth::checkPassword($this->username, $this->password))
			$this->addError('password', Yii::t('form/login-form','wrong_password'));
	}

	public function login()
	{
		if ($this->_identity===null) {
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if ($this->_identity->errorCode===UserIdentity::ERROR_NONE) {
			Yii::app()->user->login($this->_identity);
			User::increaseLoginTimes($this->_identity->id);
			return true;
		}
		else
			return false;
	}
}
