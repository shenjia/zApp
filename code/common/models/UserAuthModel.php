<?php
class UserAuthModel extends BaseModel
{
    public function relations() 
    {
        return array(
            'user' => array(self::BELONGS_TO, 'UserModel', 'id')
        );
    }
    
    public function init() 
    {
        $this->salt = md5(rand());
    }
}