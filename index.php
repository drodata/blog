<?php
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',5);
// change the following paths if necessary
$yii=dirname(__FILE__).'/../api/yii/framework-16/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following line when in production mode
 defined('YII_DEBUG') or define('YII_DEBUG',true);

require_once($yii);

Yii::createWebApplication($config)->run();
