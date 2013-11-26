<?php
class UserStat
{
    public static function findById($userId) 
    {
        return UserStatModel::model()->findByPk($userId);
    }
    
    public static function init($data) 
    {
        $stat = new UserStatModel();
        foreach (UserConfig::$stat_init_fields as $field) {
            $stat->$field = $data[$field];
        }
        return $stat->save();        
    }   
}