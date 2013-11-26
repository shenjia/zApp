<?php
define('WWW_ROOT', __DIR__);
define('APP_ROOT', __DIR__.'/..');
define('DOC_ROOT', __DIR__.'/../..');
define('ENV', 'development');
//define('ENV', 'production');

require_once DOC_ROOT.'/common/config/define.php';
require_once DOC_ROOT.'/common/vendors/yii/framework/yii.php';
Yii::createWebApplication(APP_ROOT.'/config/'.ENV.'.php')->run();
