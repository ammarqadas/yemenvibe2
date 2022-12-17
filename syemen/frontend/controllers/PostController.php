<?php

namespace frontend\controllers;
use backend\modules\post\models\Post;
use common\models\Res;
use yii\web\Cookie;
use common\components\FeedsHelper;
use yii\data\Pagination;

class PostController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
		\Yii::$app->assetManager->bundles['yii\web\JqueryAsset'] = false;
         \Yii::$app->assetManager->bundles['yii\web\YiiAsset'] = false;
		 
		 if(!isset($_COOKIE["post".$id]))
		{
			Post::findOne($id)->updateCounters(['views' => 1]);
			$cookie = new Cookie(['name' => 'post'.$id,'value' => $id,'expire' => time() + 1750,]);
			 \Yii::$app->getResponse()->getCookies()->add($cookie);
		}
	$post = Post::find()->select(['id','title','views','created_at','img','content','slug'])->where(['id'=>$id])->asArray()->one();    
		
		if(empty($post['slug']))
		{
			$model=Post::findOne($id);
			$model->slug=$post['slug']=FeedsHelper::generateSeoURL($post['title'],param('slugLength'));
			$model->save();
			
		}
		return cleanHtml($this->render('index',['post'=>$post]));

    }
	
	 public function actionSlug($slug)
    {
		\Yii::$app->assetManager->bundles['yii\web\JqueryAsset'] = false;
         \Yii::$app->assetManager->bundles['yii\web\YiiAsset'] = false;
		 
		
	$post = Post::find()->select(['id','title','views','created_at','img','content','slug'])->where(['slug'=>$slug])->asArray()->one();    
		$id=$post['id'];
		 if(!isset($_COOKIE["post".$id]))
		{
			Post::findOne($id)->updateCounters(['views' => 1]);
			$cookie = new Cookie(['name' => 'post'.$id,'value' => $id,'expire' => time() + 1750,]);
			 \Yii::$app->getResponse()->getCookies()->add($cookie);
		}
		return cleanHtml($this->render('index',['post'=>$post]));

    }
	
	public function actionPosts()
	{
		
		$itemq=Post::find()->where(['status'=>1]);
			$pages = new Pagination(['totalCount' => $itemq->count(),'pageSize'=>param('ItemsPerPage'),]);
									
		$posts= $itemq->select(['id','title','views','created_at','img','content'])->orderBy('created_at desc,views desc ')->offset($pages->offset)->limit($pages->limit)->asArray()->all();
	
		return cleanHtml( $this->render('posts',array(
			'posts'=>$posts,
			 'pages' => $pages,
			)));
	}
	

}
