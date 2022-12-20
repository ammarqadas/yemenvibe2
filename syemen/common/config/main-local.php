<?php
return [
    'components' => [
      
		 'db' => [
		             'class' => 'yii\db\Connection',
          'dsn' => 'mysql:host=localhost;dbname=yemenvibe_rssdb',
            'username' => 'vibeUsr',
            'password' => 'Mv751ue#',
            'charset' => 'utf8',
			'tablePrefix'=>'',
            'charset' => 'utf8',
               'enableSchemaCache' =>true,
			   'enableQueryCache' => true,
            // Duration of schema cache.
            'schemaCacheDuration' => 36000,

            // Name of the cache component used to store schema information
            'schemaCache' => 'cache',
        ], 
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
