<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/../vendor',
	'language' => 'ar-YE',
	'timeZone' => 'Asia/Aden',
	'sourceLanguage' => 'en-US',
	'name' => 'يمن فايب',
    'components' => [
	
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		'sitemap' =>
			[
				'class' => '\common\components\Sitemap',
				'maxUrlsCountInFile' => 30000,
				'sitemapDirectory' => '/var/www/yemenvibe.com/public_html',
				'optionalAttributes' => [],
				'sitemapIndex'=>'sitemap0.xml',
				'sitemapSubDir' => 'sitemap0',
				'maxFileSize' => '10M',
			],
		'sourcemap' =>
			[
				'class' => '\common\components\Sitemap',
				'maxUrlsCountInFile' => 1000,
				'sitemapDirectory' => '/var/www/yemenvibe.com/public_html',
				'optionalAttributes' => [],
				'sitemapIndex'=>'_s.xml',
				'sitemapSubDir' => 'smap',
				'maxFileSize' => '3M',
			],
			
		 'urlManager' => [
        'class' => 'yii\web\UrlManager',
				// 'baseUrl' => 'https://yemenvibe.com/',


        // Hide index.php
        'showScriptName' => false,
        // Use pretty URLs
        'enablePrettyUrl' => true,
		'enableStrictParsing' => true,
		'normalizer' => [
					'class' => 'yii\web\UrlNormalizer',
					// use temporary redirection instead of permanent for debugging
					'action' => yii\web\UrlNormalizer::ACTION_REDIRECT_TEMPORARY,
			],
		 

		
       
		],
	
		'assetManager' => [
			'bundles' => [
						//'yii\web\JqueryAsset' => ['js'=>[]],
					//	'yii\bootstrap\BootstrapPluginAsset' => ['js'=>[]],
						'yii\bootstrap\BootstrapAsset' => ['css' => [],],
					//	'yii\web\YiiAsset' =>['js'=>[]],
						],
						],
		'i18n' => [
        'translations' => [
            'frontend*' => [
                'class' => 'yii\i18n\PhpMessageSource',
				 'sourceLanguage' => 'ar-YE',
                'basePath' => '@common/messages',
            ],
            '*' => [
                'class' => 'yii\i18n\PhpMessageSource',
							
                 'basePath' => '@common/messages',
				//'basePath' => realpath(dirname(__FILE__).'/../../').'messages',

            ],
        ],
    ],
    ],
	
];
