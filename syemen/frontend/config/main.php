<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);
use \yii\web\Request;

//$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl()); // you set override the frontend/web with blank space and it will return the baseUrl.

return [
    'id' => 'yemenvibe',
	 
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','homelinks'],
     'controllerNamespace' => 'frontend\controllers',
    'components' => [
	'homelinks' =>
			[
				'class' => 'frontend\components\HomeLinks',
				'links' => require __DIR__ . '/homeLinks.php',
				'confPath' => dirname(__DIR__) . '/tags/',
				
			],

	'feed' =>['class' => 'yii\feed\FeedDriver',],
        'request' => [
            'csrfParam' => '_csrf-yvibe',
        ],
       'user' => [
	   		'identityClass' => 'common\models\User',

        'identityCookie' => [
            'name'     => '_frontIdentity',
            'path'     => '/',
            'httpOnly' => true,
        ],
    ],
    'session' => [
        'name' => 'FRONTENDSESSID',
        'cookieParams' => [
            'httpOnly' => true,
            'path'     => '/',
        ],
    ],  
        'log' => [
  //          'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
		    'levels' => ['error'],
		    'logVars' => [],
                ],
            ],
    ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
		'urlManager' => [
             'rules' => require __DIR__ . '/url-rules.php',
        ],
       
	/*	
		'assetManager' => [
				'bundles' => [
					'yii\web\JqueryAsset' => [
												'js'=>[]
												],
        'yii\bootstrap\BootstrapPluginAsset' => [
												'js'=>[]
												],
		'yii\bootstrap\BootstrapAsset' => [
											'css' => [],
											],

								],
						], */
    ],
	'controllerMap' => [
         'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
			 'migrationPath' => '@backend/migrations',
           
         ],
	  'news-article'=> 'frontend\controllers\ArticleController',
	 'urgent-news'=> 'frontend\controllers\UrgentController',

     ], 
	 //'defaultRoute' => 'items/const', 
//	 'catchAll' => ['items/const'],
	'params' => $params,

];
