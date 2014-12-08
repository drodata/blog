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
	'language'=>'zh_cn',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>$password,
			'generatorPaths' => array(
				'bootstrap.gii',
			),
		),
	),

	'defaultController'=>'back',

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
				'jquery-ui.css' => '/blog/css/jqueryui/flick/jquery-ui.min.css',
				'jquery.js' => '/blog/js/jquery-latest.js',
				'jquery-ui.min.js' => '/blog/js/jquery-ui.latest.js',
			),
		),
		'db'=>array(
			'connectionString' => $connectString,
			'username' => $username,
			'password' => $password,
			'emulatePrepare' => true,
			'charset' => 'utf8',
			'tablePrefix' => 'ts_',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'caseSensitive'=>false,
			'rules'=>array(
				'post/<id:\d+>/<title:.*?>'=>'post/view',
				'posts/<tag:.*?>'=>'post/index',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'essay/view/<id:\d+>'=>'essay/view',
				'essay/category/<slug:.*?>'=>'essay/category',
				'essay/label/<name:.*?>'=>'essay/label',

				'page/view/<name:.*?>'=>'page/view',
				/*
				'essay/<category_slug:\d+>/<keyword:.*?>'=>'essay/search',
				*/
			),
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
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
	'params'=>require(dirname(__FILE__).'/params.php'),
);
