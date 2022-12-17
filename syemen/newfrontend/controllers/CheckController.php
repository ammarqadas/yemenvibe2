<?php

namespace frontend\controllers;
use PicoFeed\Reader\Reader;
use PicoFeed\PicoFeedException;
use common\models\Feeds;
use common\models\Items;
use common\components\FeedsHelper;
use yii\helpers\ArrayHelper;
class CheckController extends \yii\web\Controller
{
    public function actionDesktop()
	{
		echo "desktop off";exit;
	}
	
	public function actionMobile()
	{
			echo "mobile device on";exit;
	}
	public function actionRedis()
	{
			echo "redis cache device on";
			\Yii::$app->redis->set('mykey', 'redis is working');
             echo \Yii::$app->redis->get('mykey');
			exit;
	}
	public function actionImg()
	{
		$url='https://www.mandabpress.com/user_images/news/16-01-19-668434972.jpg';
		 
		 echo imgUrl2($url,param('imgOptions'),param('imgExt'));
	}
	public function actionUrl()
	{
		$title="وردنا الان جميح يفجر مفاجأة من العيار الثقيل ترعب الجميع عن ماحدث في حجور يوم أمس شاهد";
		//if(preg_match('/^(\d+)-.*$/',$title,$result))print_r($result);
		echo FeedsHelper::generateSeoURL($title,8);
	}
}
