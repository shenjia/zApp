<?php
class UserModel extends BaseModel
{
    public function relations() 
    {
        return array(
            'info' => array(self::HAS_ONE, 'UserInfoModel', 'id'),
            'auth' => array(self::HAS_ONE, 'UserAuthModel', 'id'),
            'stat' => array(self::HAS_ONE, 'UserStatModel', 'id'),
        );
    }
}