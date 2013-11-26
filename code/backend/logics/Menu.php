<?php
class Menu 
{
    public static function render($parent = null, $menu = null) 
    {
        if (is_null($parent)) {
            return self::render(MenuConfig::ROOT, MenuConfig::$menu);  
        } 
        $output = '';
        foreach ($menu as $id => $value) {
            if (is_numeric($id)) {
                $id = $value;
                $value = '/' . $parent . '/' . $id;
            }
            $prefix = ($parent == MenuConfig::ROOT) ? '' : $parent . '_';
            $name = $prefix . $id;
            $output .= '"' . $name . '" : { "id": "' . $name . '", "parent": "' . $parent . '", ';
            $output .= '"name": "' . Yii::t('menu', $name) . '", ';
            if (is_array($value)) {
                $output .= '"items": ' . self::render($id, $value);
            } else {
                $output .= '"url": "' . CHtml::encode($value) . '"';
            }
            $output .= '},';
        }
        return '{' . trim($output, ',') . '}';
    }

    public static function encode($param) 
    {
        
    }
    
}