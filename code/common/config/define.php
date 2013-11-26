<?php
if (!defined('DOC_ROOT')) define('DOC_ROOT', __DIR__.'/../..');
if (!defined('ENV')) define('ENV', 'development');
if (!defined('PAGECOUNT')) define('PAGECOUNT', 15);

/**
 * 环境配置
 */
require_once __DIR__ . '/' . ENV . '/debug.php';
require_once __DIR__ . '/' . ENV . '/database.php';
require_once __DIR__ . '/' . ENV . '/urls.php';