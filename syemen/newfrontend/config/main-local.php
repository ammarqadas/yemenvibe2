<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'NvISxPFc-QwAuQtPQsENSxyX0Lle2_BL',
        ],
	    'redis' => [
                    'class' => 'yii\redis\Connection',
                    'hostname' => 'redis-vibe-cache.ojqcjs.ng.0001.euw3.cache.amazonaws.com',
                    'port' => 6379,
                   // 'database' => 0,
                    ],
	/*	'cache' => [
            'class' => 'yii\redis\Cache',
            'enableReplicas' => true,
            'replicas' => [
                 'redis',//id of Redis [[Connection]] Component
                ['hostname' => 'redis-vibe-cache-002.ojqcjs.0001.euw3.cache.amazonaws.com'],
                ['hostname' => 'redis-vibe-cache-003.ojqcjs.0001.euw3.cache.amazonaws.com'],
             ],
			],*/
    ],
	'modules' => [
			'user' => [
        'class' => 'dektrium\user\Module',
        'enableUnconfirmedLogin' => true,
        'confirmWithin' => 21600,
        'cost' => 12,
        'admins' => ['admin']
		],
		//	'rbac' => 'dektrium\rbac\RbacConsoleModule',	
				],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
