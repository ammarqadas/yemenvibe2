<?php

namespace frontend\controllers;
use common\models\Items;
use common\models\Res;
use yii\web\Cookie;
use common\components\FeedsHelper;
use common\components\Scrap;
use PicoFeed\Config\Config;
use PicoFeed\Scraper\Scraper;

class NewsController extends \yii\web\Controller
{
	 public $layout='inside';
    public function actionIndex($id)
    {
		\Yii::$app->assetManager->bundles['yii\web\JqueryAsset'] = false;
         \Yii::$app->assetManager->bundles['yii\web\YiiAsset'] = false;
		 
		 if(!isset($_COOKIE["news".$id]))
		{
			Items::findOne($id)->updateCounters(['read' => 1]);
			$cookie = new Cookie(['name' => 'news'.$id,'value' => $id,'expire' => time() + 1750,]);
			 \Yii::$app->getResponse()->getCookies()->add($cookie);
		}
		//	$entry->updateCounters([$type => 1]);
		$News=Items::find()->select(['id','feedId','title','url','read','itemDate','enclosureUrl','content','body','slug'])->where(['id'=>$id])->with(
							[
								'feed' => function ($query) {
								$query->select(['id','cat','resID'])->with(['res'=>function($q){$q->select(['id','rName','domain','scrap']);}]); 
								},
							])->asArray()->cache(60)->one();
		
	
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
				
					//echo "filterd".$grabber->getFilteredContent();
			//var_dump($grabber->hasRelevantContent());
			//echo "scrap";
			return $this->render('test',['news'=>$News]);
		}
	
			if(!preg_match('/https/i',$News['url']))
			{
			  //  echo "redirect33".$News['url'];
				 $this->redirect('/shownews/'.$id.'.html');
			}
	
//	 echo "no_redirect33".$News['url'];
		return $this->render('index',['news'=>$News]);

	   // $this->redirect('http://yemenvibe.com/news'.$id.".html");
	
	
    }
	public function actionTest($id)
	{
		
		\Yii::$app->assetManager->bundles['yii\web\JqueryAsset'] = false;
         \Yii::$app->assetManager->bundles['yii\web\YiiAsset'] = false;
		 
			 if(!isset($_COOKIE["news".$id]))
			{
				Items::findOne($id)->updateCounters(['read' => 1]);
				$cookie = new Cookie(['name' => 'news'.$id,'value' => $id,'expire' => time() + 1750,]);
				 \Yii::$app->getResponse()->getCookies()->add($cookie);
			}
			$News=Items::find()->select(['id','feedId','title','url','read','itemDate','enclosureUrl','content','body'])->where(['id'=>$id])->with(
							[
								'feed' => function ($query) {
								$query->select(['id','cat','resID'])->with(['res'=>function($q){$q->select(['id','rName','domain','scrap']);}]); 
								},
							])->asArray()->cache(60)->one();
				$this->layout="main";
			if($News['feed']['res']['scrap'] )
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
					//return $this->render('test',['news'=>$News]);
				echo "filterd".$grabber->getFilteredContent();
				var_dump($grabber->hasRelevantContent());
				echo "scrap";
				echo "raw".$grabber->getRawContent();
			}
			print_r($News);
			echo "dddd";
			//exit;

					
	}
	 public function actionView($id)
	 {
	    	$News=Items::find()->select(['id','feedId','title','url','read','itemDate','enclosureUrl','content','body','slug'])->where(['id'=>$id])->with(
							[
								'feed' => function ($query) {
								$query->select(['id','cat','resID'])->with(['res'=>function($q){$q->select(['id','rName','domain','scrap']);}]); 
								},
							])->asArray()->cache(120)->one();
			return $this->render('index',['news'=>$News]);

	 }

}
