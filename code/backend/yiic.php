<?php
define('APP_ROOT', __DIR__);
define('DOC_ROOT', __DIR__.'/..');
define('ENV', 'development');
//define('ENV', 'production');

require_once DOC_ROOT.'/common/config/define.php';
$yiic=DOC_ROOT.'/common/vendors/yii/framework/yiic.php';
$config=APP_ROOT.'/config/'.ENV.'.php';
require_once($yiic);
