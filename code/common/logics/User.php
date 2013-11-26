<?php
class User
{
    public static function findById($userId) 
    {
        return UserModel::model()->findByPk($userId);
    }
    
    public static function isExists($userId) 
    {
        return (boolean) UserModel::model()->findByPk($userId,array(
            'select' => 'id'
        ));
    }
    
    public static function count($condition = '') 
    {
        return UserModel::model()->count($condition);
    }
    
    
    public static function isLogin() 
    {
        return !Yii::app()->user->isGuest;
    }
    
    public static function getCurrentId() 
    {
        return Yii::app()->user->id;
    }
    
    public static function getCurrentUser() 
    {
        return self::getFullInfo(self::getCurrentId());
    }
    
    public static function getListInfo($ids) 
    {
        return empty($ids) ? array() : UserModel::model()->with('stat')->findAllByPk($ids, array(
            'order' => Value::orderByIds($ids)
        )); 
    }
    
    public static function getFullInfo($id) 
    {
        return UserModel::model()->with('info', 'auth', 'stat')->findByPk($id); 
    }
    
    public static function increaseLoginTimes($id) 
    {
        return UserStatModel::model()->updateCounters(
            array('login_times' => 1 ), 'id=:id', array(':id' => $id)
        );
    }
    
    public static function register($data) 
    {
        $transaction = Yii::app()->db->beginTransaction();
        try {
            if (!User::init($data))         throw new Exception('init user failed');
            if (!UserAuth::init($data))     throw new Exception('init user auth failed');
            if (!UserInfo::init($data))     throw new Exception('init user info failed');
            if (!UserStat::init($data))     throw new Exception('init user stat failed');
            $transaction->commit();
            return true;
        } catch (Exception $e) {
            $transaction->rollback();
            Yii::log('register failed:' . $e->getMessage(), 'error', 'application');
            return false;
        }   
    }
    
    public static function init(&$data) 
    {
        $user = new UserModel();
        foreach (UserConfig::$user_init_fields as $field) {
            $user->$field = $data[$field];
        }
        $user->create_time = time();
        if ($result = $user->save()) {
            $data['id'] = $user->id;
            $date['create_time'] = $user->create_time;
        }
        return $result;
    }
}