<?php
Yii::setPathOfAlias('common', DOC_ROOT.'/common');
// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'console',

	// preloading 'log' component
	'preload'=>array('log'),
	
	// autoloading model and component classes
	'import'=>array(
		'common.config.*',
		'common.models.*',
		'common.helpers.*',
		'common.components.*',
		'application.config.*',
		'application.models.*',
		'application.helpers.*',
		'application.components.*',
	),

	// application components
	'components'=>array(
		'db'=>array(
			'connectionString' => DB_CONNECT_STRING,
			'emulatePrepare' => true,
			'username' => DB_USERNAME,
			'password' => DB_PASSWORD,
			'charset' => 'utf8',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				    'logFile'=>'console.log',
				    'categories'=>'application.*'
				),
			),
		),
	),
);