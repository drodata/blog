<?php
// uncomment the following to define a path alias
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/ibootstrap');

// This file contains username and password of MySQL,
// There is an template file called 'pswd-tp.php' which you can use.
require "pswd.php";

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	//'theme' => 'bootstrap',
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Respect Is Earned',
	//'language'=>'zh_cn',

	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'ext.chosen.Chosen',
	),
	'modules'=>array(
		'pk' => array(
			'nickname' => 'kuixy', // a test
			'defaultController' => 'clip/view',
		),
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>$password,
			'generatorPaths' => array(
				'application.gii',
				'bootstrap.gii',
			),
		),
	),

	'defaultController'=>'back',

	'controllerMap' => array(
		'site' => array(
			'class' => 'ext.controller.site.SiteController',
		),
	),
	// application components
	'components'=>array(
		'bootstrap' => array(
			'class' => 'bootstrap.components.Bootstrap',
		),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'clientScript' => array(
			'scriptMap' => array(
				/*
				'jquery-ui.css' => '/blog/css/jqueryui/flick/jquery-ui.min.css',
				'jquery.js' => '/blog/js/jquery-latest.js',
				'jquery-ui.min.js' => '/blog/js/jquery-ui.latest.js',
				*/
			),
		),
		'db'=>array(
			'connectionString' => $connectString,
			'username' => $username,
			'password' => $password,
			'emulatePrepare' => true,
			'charset' => 'utf8',
			'tablePrefix' => 'ts_',
			'enableProfiling' => true,
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
					// uncomment if you want to log context info
					//'filter' => 'CLogFilter',
				),
				/* append Application Log Message table to the bottom of page 
				array(
					'class'=>'CWebLogRoute',
				),
				*/
				/* append SQL execution table to the bottom of page 
				array(
					'class'=>'CProfileLogRoute',
				),
				*/
				/* Uncomplete
				array(
					'class'=>'CEmailLogRoute',
					'levels'=>'error, warning',
					'emails'=> array('drodata@foxmail.com'),
				),
				*/
			),
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'assetManager'=>array(
			'forceCopy' => false,
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'caseSensitive'=>false,
			'rules'=>array(
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

				'post/<id:\d+>/<title:.*?>'=>'post/view',
				'posts/<tag:.*?>'=>'post/index',
				'essay/view/<id:\d+>'=>'essay/view',
				'essay/category/<slug:.*?>'=>'essay/category',
				'essay/label/<name:.*?>'=>'essay/label',

				'page/view/<name:.*?>'=>'page/view',
				/*
				'essay/<category_slug:\d+>/<keyword:.*?>'=>'essay/search',
				*/
               'pk/<controller:\w+>'=>'pk/<controller>',
               'pk/<controller:\w+>/<action:\w+>'=>'pk/<controller>/<action>',
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);
