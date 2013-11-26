<?php
class UserIdentity extends CUserIdentity
{
    const ERROR_NOT_MANAGER = 3;
    
	public function authenticate()
	{
	    $auth = UserAuth::findByName( $this->username );
		
		if ($auth === null) {
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		} else {
			if ($auth['password'] !== md5($this->password . $auth['salt'])) {
				$this->errorCode = self::ERROR_PASSWORD_INVALID;
			} else if (!UserAuth::isManager($auth->role)) {
			    $this->errorCode = self::ERROR_NOT_MANAGER;
			} else {
				$this->setState('id', $auth->id); 
				$this->setState('role', $auth->role);  
				$this->errorCode = self::ERROR_NONE;
			}
		}
		
		return !$this->errorCode;
	}
	
	public function getId()
	{
	    return $this->getState('id');
	}
}