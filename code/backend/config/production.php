<?php
/**
 * 静态资源服务器、静态资源版本
 */
define('RESOURCE_SERVER', '/');
define('RESOURCE_VERSION', '1.0');

/**
 * 上传配置
 */
define('UPLOAD_TEMP_PATH', '/tmp');
define('UPLOAD_PATH', DOC_ROOT . '/upload');

Yii::setPathOfAlias('common', DOC_ROOT.'/common');
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'site',
    'language'=>'zh_cn',
    'homeUrl'=>'/',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'common.config.*',
		'common.logics.*',
		'common.models.*',
		'common.helpers.*',
		'common.components.*',
		'application.config.*',
		'application.logics.*',
		'application.models.*',
		'application.forms.*',
		'application.helpers.*',
		'application.components.*',
	),

	'modules'=>array(
	
	),

	// application components
	'components'=>array(
		'user'=>array(
	        'class'=>'WebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'db'=>array(
			'connectionString' => DB_CONNECT_STRING,
			'emulatePrepare' => true,
			'username' => DB_USERNAME,
			'password' => DB_PASSWORD,
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'request'=>array(
		    //'enableCsrfValidation' => true
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				    'logFile'=>'application.log'
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);