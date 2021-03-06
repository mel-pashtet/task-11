<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	        

	'sourceLanguage' => 'uk',
  	'language' => 'en',

	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'TEXT NOTES',
	'defaultController' => 'notes',//контролер по умолчанию 

	// preloading 'log' component
	'preload'=>array('log', 'bootstrap'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.widgets.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'some',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
		'sass' => array(
	        'class' => 'ext.Sass',
	        
	        // All parameters below are optional, change them to your needs
	        'cache' => false,
	        'debug' => false,
	        'extensions' => array(
	          //'Compass' //not included by default
	        ),
	        'functions' => array(
	          'alias' => 'callable'
	        ),
	        'includePaths' => array(
	            'webroot.css'
	        ),
	        'syntax' => 'scss',
    	),
		'viewRenderer' => array(
			'class' => 'ext.yii-haml.HamlViewRenderer',
		),
		// 'assetManager' => array(
		//     'class' => 'ext.phamlp.PBMAssetManager',
		//     'parsers' => array(
		//       'sass' => array( // key == the type of file to parse
		//         'class' => 'ext.phamlp.Sass', // path alias to the parser
		//         'output' => 'css', // the file type it is parsed to
		//         'options' => array()
		//       ),
		//       'scss' => array( // key == the type of file to parse
		//         'class' => 'ext.phamlp.Sass', // path alias to the parser
		//         'output' => 'css', // the file type it is parsed to
		//         'options' => array()
		//       ),
		//     )
		//   ),
		'viewRenderer'=>array(
			'class'=>'ext.phamlp.Haml',
			  // delete options below in production
			'ugly' => false,
			'style' => 'nested',
			'debug' => 0,
	    	'cache' => false,
		),
		'bootstrap' => array(
  			'class' => 'application.extensions.yiibooster.components.Bootstrap',
		),
		'cache'=>array(
    	   'class'=>'system.caching.CFileCache',
     	),
    
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'urlManager'=>array(
			'urlFormat'=>'path',// вибараем формат path 
			'showScriptName'=>true,//скриваем імя вхідного скрипта
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/read',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		// uncomment the following to enable URLs in path-format
		
		
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'pgsql:host=localhost;port=5433;dbname=text_notes',//підключення до б.д.
			
			'username' => 'mel',
			'password' => '1111',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, info',
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
