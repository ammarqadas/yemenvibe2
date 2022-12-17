<?php

namespace frontend\controllers;
use common\models\Items;
use common\models\Res;
use yii\web\Cookie;
use common\components\FeedsHelper;
use common\components\Scrap;
use PicoFeed\Config\Config;
use PicoFeed\Scraper\Scraper;
use frontend\components\VibeController;

class UrgentController extends VibeController
{
	 public $layout='inside';
	 private function _index($id)
	 {
		 
		\Yii::$app->assetManager->bundles['yii\web\JqueryAsset'] = false;
         \Yii::$app->assetManager->bundles['yii\web\YiiAsset'] = false;
		 
		
		//	$entry->updateCounters([$type => 1]);
		$News=Items::find()->select(['id','feedId','title','url','read','itemDate','enclosureUrl','content','body','slug'])->where(['id'=>$id])->with(
							[
								'feed' => function ($query) {
								$query->select(['id','cat','resID'])->with(['res'=>function($q){$q->select(['id','rName','scrap']);}]); 
								},
							])->asArray()->cache(60)->one();
		
	if(!$News) return $this->redirect(\Yii::$app->homeUrl);
		$id=$News['id'];
					Items::findOne($id)->updateCounters(['read' => 1]);

		if($News['feed']['res']['scrap'] )
		{
			$this->layout="main";
			if(empty($News['body'] ))
			{
					$config = new Config;
				$config->setGrabberRulesFolder(\Yii::getAlias('@frontend/Rules'));

				$grabber = new Scraper($config);
				$grabber->setUrl($News['url']);
				$grabber->execute();
			
				if($grabber->hasRelevantContent())
				{
				$model=Items::findOne($id);
				$model->body=$grabber->getFilteredContent();
				$News['body']=$model->body;
				$model->save();
				}
			}
			return cleanHtml($this->render('scrap',['news'=>$News]));
		}
		return cleanHtml($this->render('index',['news'=>$News]));
		}
    public function actionIndex($id)
    {
	  return $this->_index($id);
    }
	
	
	public function actionSlug($slug)
	{
		\Yii::$app->assetManager->bundles['yii\web\JqueryAsset'] = false;
         \Yii::$app->assetManager->bundles['yii\web\YiiAsset'] = false;
	
		$News=Items::find()->select(['id','feedId','title','url','read','itemDate','enclosureUrl','content','body','slug'])->where(['slug'=>$slug])->with(
							[
								'feed' => function ($query) {
								$query->select(['id','cat','resID'])->with(['res'=>function($q){$q->select(['id','rName','scrap']);}]); 
								},
							])->asArray()->cache(20)->one();
		
		//echo "slug:".$News['slug']; exit;
if(!$News) return $this->redirect(\Yii::$app->homeUrl);
		if(preg_match('/urgent-news/i',\Yii::$app->request->pathInfo) && $News['feed']['res']['scrap'])
		 {
			$url=url(['/news-article/'.$News['slug'].'.html',],'https');
			return $this->redirect($url);

		 }
		$id=$News['id'];
$session = \Yii::$app->session;
if (!$session->has('art'.$id))
{
	Items::findOne($id)->updateCounters(['read' => 1]);
      $session->set('art'.$id, $id);
}
		if($News['feed']['res']['scrap'] )
		{
			$this->layout="main";
			if(empty($News['body'] ))
			{
					$config = new Config;
				$config->setGrabberRulesFolder(\Yii::getAlias('@frontend/Rules'));

				$grabber = new Scraper($config);
				$grabber->setUrl($News['url']);
				$grabber->execute();
			
				if($grabber->hasRelevantContent())
				{
				$model=Items::findOne($id);
				$model->body=$grabber->getFilteredContent();
				$News['body']=$model->body;
				$model->save();
				}
			}
				
			
			return cleanHtml( $this->render('scrap',['news'=>$News]));
		}	
		return cleanHtml($this->render('index',['news'=>$News]));
	}
}
