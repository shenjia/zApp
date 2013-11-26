<?php
class LoginForm extends CFormModel
{
	public $username;
	public $password;

	private $_identity;

	public function rules()
	{
		return array(
			array( 'username, password', 'required' ),
			array( 'username', 'shouldExists' ),
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

	/**
	 * Check the user.
	 */
	public function shouldExists($attribute,$params)
	{
		if (!UserAuth::findByName($this->username))
			$this->addError('username', Yii::t('form/login-form','user_not_exists'));
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if (!UserAuth::checkPassword($this->username, $this->password))
			$this->addError('password', Yii::t('form/login-form','wrong_password'));
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
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 dayss
			$user = UserModel::model()->findByPk($this->_identity->id);
			Yii::app()->user->login($this->_identity,$duration);
			User::increaseLoginTimes($this->_identity->id);
			return true;
		}
		else
			return false;
	}
}
