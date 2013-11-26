<?php
class Wind 
{
    public static function link($route) 
    {
        $parts = explode('/', trim($route, '/'));
        $title = Yii::t('menu', implode('_', $parts));
        echo CHtml::link($title, $route, array('class' => 'J_linkframe_trigger')); 
    }
}