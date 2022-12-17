<?php 
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
defined('YII_DEBUG') or define('YII_DEBUG', false);defined('YII_ENV') or define('YII_ENV', 'prod');
//setlocale(LC_TIME, "en_US");
setLocale(LC_ALL, [ 'en_US.UTF-8', 'en_US', 'en' ]);

//echo "prod";exit;
//defined('YII_DEBUG') or define('YII_DEBUG', true);defined('YII_ENV') or define('YII_ENV', 'dev');
$root='../';
 require ($root.'syemen/common/_func.inc');

require ($root.'vendor/autoload.php');
require ($root.'vendor/yiisoft/yii2/Yii.php');
require ($root.'syemen/common/config/bootstrap.php');
require ($root.'syemen/frontend/config/bootstrap.php');

//echo 'root'.$root;exit;
$config = yii\helpers\ArrayHelper::merge(
    require ($root.'syemen/common/config/main.php'),
    require ($root.'syemen/common/config/main-local.php'),
    require ($root.'syemen/frontend/config/main.php'),
    require  ($root.'syemen/frontend/config/main-local.php')
);
//echo 'yemenvine';
//print_r($config);exit();
(new yii\web\Application($config))->run();
//$root='/var/www/vhost/yemenvibe.com/';

//echo $root; 
