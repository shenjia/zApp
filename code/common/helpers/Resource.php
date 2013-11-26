<?php
class Resource
{
	/**
	 * 加载资源
	 * @param string $file
	 */
	public static function getPath ( $file, $type = null )
	{
		if ( $type ) $file = $type . '/' . $file . '.' . $type;
		return trim( RESOURCE_SERVER, '/' ) . '/' . $file . '?v=' . ( DEBUG ? time() : RESOURCE_VERSION );
	}
    
    /**
     * 加载Js文件
     * @param mixed $scripts
     * @param number $position
     */
    public static function loadJs ( $scripts = array(), $position = CClientScript::POS_END )
    {
		Yii::app()->clientScript->setCoreScriptUrl( trim( RESOURCE_SERVER, '/' ) . '/js' );
        Yii::app()->clientScript->registerCoreScript( DEBUG ? 'jquery' : 'jquery.min' );
        
        Value::toArray( $scripts );
        
        foreach ( $scripts as $file ) {
        	$path = self::getPath( $file, 'js' );
	        Yii::app()->clientScript->registerScriptFile( $path, $position );
        }
    }
    
    /**
     * 加载Css文件
     * @param mixed $css
     */
    public static function loadCss ( $css = array() )
    {
		Value::toArray( $css );
		
		foreach ( $css as $file ) {
			$path = self::getPath( $file, 'css' );
			Yii::app()->clientScript->registerCssFile( $path );
		}
    }
}