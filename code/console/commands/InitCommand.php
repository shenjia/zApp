<?php
class InitCommand extends CConsoleCommand
{
    public function actionUser($args) 
    {
        $this->truncateTables(array(
            'user', 'user_auth', 'user_info', 'user_stat'
        ));
        $roles = array(
        	'admin'   => UserConfig::ROLE_ADMINISTRATOR, 
        	'manager' => UserConfig::ROLE_MANAGER, 
        	'user'    => UserConfig::ROLE_USER
        );
        foreach ($roles as $name => $role) {
            $user = array(
                'name' => $name,
                'username' => $name,
                'password' => $name
            );
            User::register($user);
            $auth = UserAuth::findByName($name);
            $auth->role = $role;
            $auth->save();
        }
        echo 'done.' . PHP_EOL;
    }
    
    private function truncateTables($tables) {
        Value::toArray($tables);
        foreach ($tables as $table) {
            if (Yii::app()->db->createCommand()->truncateTable($table)) {
                echo 'Table [ ' . $table . ' ] was truncated.' . PHP_EOL;   
            }
        }
    }
}