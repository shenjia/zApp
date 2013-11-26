<?php
class UserConfig 
{
    const ROLE_UNKNOWN       = -1;
    const ROLE_USER          = 0;
    const ROLE_MANAGER       = 10;
    const ROLE_ADMINISTRATOR = 100;
    
    const STATUS_NORMAL = 0;
    const STATUS_BANNED = 10;
    
    public static $roles = array(
        self::ROLE_ADMINISTRATOR,
        self::ROLE_MANAGER,
        self::ROLE_USER
    );
    
    public static $user_init_fields = array(
        'name', 'sex'
    );
    
    public static $info_init_fields = array(
        'id', 'create_time'
    );
    
    public static $stat_init_fields = array(
        'id', 'create_time'
    );
}