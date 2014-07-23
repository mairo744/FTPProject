<?php

class LoginForm extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe;

	private $_identity;

	public function rules()
	{
		return array(
			array('username, password', 'required'),
			array('rememberMe', 'boolean'),
			array('password', 'authenticate'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'username'=>'Email',
			'rememberMe'=>'Remember me next time',
		);
	}

	public function authenticate($attribute,$params)
	{
		/*if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect username or password.');
		}*/
		
		//if($this->hasErrors()) return;
		
		$this->_identity=new UserIdentity($this->username,$this->password);
		if(!$this->_identity->authenticate())
		{
			switch($this->_identity->errorCode)
			{
				case UserIdentity::ERROR_USERNAME_INVALID: $this->addError('username','Invalid email.'); break;
				case UserIdentity::ERROR_PASSWORD_INVALID: $this->addError('password','Invalid password.'); break;
				case UserIdentity::ERROR_STATUS_BANNED: $this->addError('username','Your account was blocked.'); break;
			}
		}
	}

	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
}
