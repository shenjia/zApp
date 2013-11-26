<?php
class Menu 
{
    public static function output($items = MenuConfig::$menu) 
    {
        foreach ($items as $name => $value) {
            var_dump($name, $value);
        }
    }
    
}