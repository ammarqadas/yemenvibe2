<?php

namespace console\controllers;
use common\models\Items;
use common\models\Post;
use common\models\Topics;
use common\models\Res;
use common\models\Trends;

use yii\console\Controller;
use yii;
class SitemapController extends Controller
{
	
	
	public function actionCreateSitemap()
		{
		\Yii::$app->sitemap
		->addModel(Items::className())
		->addModel(Post::className()) // Also you can pass \yii\db\Connection to the database connection that you need to use		
		->create();
		}
	public function actionSourceSitemap()
		{
		\Yii::$app->sourcemap
		->addModel(Topics::className())
		->addModel(Res::className()) // Also you can pass \yii\db\Connection to the database connection that you need to use		
		->addModel(Trends::className()) // Also you can pass \yii\db\Connection to the database connection that you need to use		
		->create();
		}
}
