<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);
//$baseUrl = str_replace('/backend/web', '', (new \yii\web\Request)->getBaseUrl());

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
 'modules' => [
			
		'post'=>'backend\modules\post\Module',
		'redactor' => 'yii\redactor\RedactorModule',

	],
    'components' => [
	
        'request' => [
            'csrfParam' => '_csrf-backend',
			// 'baseUrl' => '/',
        ],
    
		'user' => [
		'identityClass' => 'common\models\User',
		    'identityCookie' => [
            'name'     => '_backendIdentity',
          //  'path'     => '/',
            'httpOnly' => true,
        ],
		'enableAutoLogin' => true,
           // 'enableAutoLogin' => true,
    ],
    'session' => [
        'name' => 'BACKENDSESSID',
        'cookieParams' => [
            'httpOnly' => true,
         //   'path'     => '/',
        ],
		 ],
       
		'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
				//	 'baseUrl' => 'https://yemenvibe.com/_tmp/',

				'enableStrictParsing' => false,
            'rules' => [
				'/' => 'site/index',
				'login'=>'site/login',
				'logout'=>'site/logout',
				],
        ],
		
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
     
        
       
    ],
	
    'params' => $params,
];
