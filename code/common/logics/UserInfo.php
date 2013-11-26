<?php
class UserInfo 
{
    public static function findById($userId) 
    {
        return UserInfoModel::model()->findByPk($userId);
    }
    
    public static function init($data) 
    {
        $info = new UserInfoModel();
        foreach (UserConfig::$info_init_fields as $field) {
            $info->$field = $data[$field];
        }
        return $info->save();        
    }   
}