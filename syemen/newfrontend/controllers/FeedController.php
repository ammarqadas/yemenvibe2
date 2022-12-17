<?php

namespace frontend\controllers;
use backend\modules\post\models\Post;
use common\models\Res;
use common\models\Items;
use yii\web\Cookie;
use common\components\FeedsHelper;
use yii\data\Pagination;

class FeedController extends \yii\web\Controller
{
   
	public function actionPosts()
	{
		
		 $feed=\Yii::$app->feed->writer();
		
		$feed->setTitle(\Yii::$app->name);
		$feed->setLink(home());
		$feed->setFeedLink(home().'/feed/posts', 'rss');
		$feed->setDescription(\Yii::t('main','Recent headlines'));
		$feed->setGenerator(home().'/feed/posts');
		$feed->setDateModified(time()); 
		$posts=Post::find()->where(['status'=>1])->andwhere(['>=', 'created_at', strtotime('-3 days')])->orderBy('created_at DESC')->all();
		foreach($posts as $post){
				$entry = $feed->createEntry();
				$entry->setTitle($post->title);
				$url=itemUrl($post['id'],$post['slug'],'/post');

				$entry->setLink(\Yii::$app->urlManager->createAbsoluteUrl($url));
				$entry->setDateModified(intval($post['updated_at']));
				$entry->setDateCreated(intval($post['created_at']));
				$entry->setContent(
				words($post['content'],40)  
				);
				$entry->setEnclosure(
					[
					 'uri'=>url([param('upload_dir').$post['img'],],'https'),
					 'type'=>'image/*',
					 'length'=>filesize(\Yii::getAlias('@webroot').param('upload_dir').$post['img'])
					 ]
				);
				$feed->addEntry($entry);
		}
		/**
		* Render the resulting feed to Atom 1.0 and assign to $out.
		* You can substitute "atom" with "rss" to generate an RSS 2.0 feed.
		*/
		$out = $feed->export('rss');
		header('Content-type: text/xml');
		echo $out;
		die();
	}
	public function actionSitemap()
	{
		$items=Items::find()->select('slug')->distinct()->with(
		'detail')->where(['>=', 'itemDate', strtotime('-6 hours')])->all();
		$content="";
		foreach ($items as $item)
		$content.=$this->writeEntity($item);
		return $this->renderPartial('sitemap',['content'=>$content]);
	}
	protected function writeEntity($entity)
    {
        $str = PHP_EOL . '<url>' . PHP_EOL;

        foreach (['loc','lastmod', 'priority']  as $attribute)
		$str .= sprintf("\t<%s>%s</%1\$s>", $attribute, call_user_func([$entity, 'getSitemap' . $attribute])) . PHP_EOL;
        
        $str .= '</url>';
		return $str;
    }
		
	

}
