<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

	// preloading 'log' component
	'preload'=>array('log'),
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	// application components
	'components'=>array(
		'cache'=>array(
    	   'class'=>'system.caching.CFileCache',
     	),
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		
		// 'db'=>array(
		// 	'connectionString' => 'mysql:host=localhost;dbname=text_notes',
		// 	'emulatePrepare' => true,
		// 	'username' => 'root',
		// 	'password' => '',
		// 	'charset' => 'utf8',
		// ),
		'db'=>array(
			'connectionString' => 'pgsql:host=localhost;port=5433;dbname=text_notes',
			'emulatePrepare' => true,
			'username' => 'mel',
			'password' => '1111',
			'charset' => 'utf8',
		),
		
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, info',
				),
			),
		),
	),
	'params' => array(
    'words' => array(
        "100% satisfied",
        "Buy direct",
        "Click to remove",
        "Dear friend",
        "Free membership",
        "1",
         
    )
)
);
