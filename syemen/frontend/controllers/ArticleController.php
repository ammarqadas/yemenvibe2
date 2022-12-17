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


class ArticleController extends VibeController
{
	 public $layout='inside';
	 private function _index($id)
	 {
		 
		\Yii::$app->assetManager->bundles['yii\web\JqueryAsset'] = false;
         \Yii::$app->assetManager->bundles['yii\web\YiiAsset'] = false;
		 
		 $it=Items::find()->select(['slug','url'])->where(['id'=>$id])->asArray()->one();
		 $slug=(!preg_match('/https/i',$it['url']))?param('urgentSlug'):param('newsSlug');
		 $schema=(!preg_match('/https/i',$it['url']))?'http':'https';
		$url=itemUrl($id,$it['slug'],$slug);
		$url=url([$url,],$schema);
		$this->redirect($url);
		
	 }
    public function actionIndex($id)
    {
		
		$News=Items::find()->select(['id','feedId','title','url','read','itemDate','enclosureUrl','content','body','slug','thumb'])->where(['id'=>$id])->with(
							[
								'feed' => function ($query) {
								$query->select(['id','cat','resID'])->with(['res'=>function($q){$q->select(['id','rName','scrap','trend']);},'topics',]); 
								},
							])->asArray()->cache(60)->one();
		
//if(!$News) return "not found news"; 
if(!$News) return $this->redirect(\Yii::$app->homeUrl);
	//	$id=$News['id'];
	/*if(!isset($_COOKIE["news".$id]))
		{
			

			Items::findOne($id)->updateCounters(['read' => 1]);
			$cookie = new Cookie(['name' => 'news'.$id,'value' => $id,'expire' => time() + 1750,]);
			 \Yii::$app->getResponse()->getCookies()->add($cookie);
		}*/
					Items::findOne($id)->updateCounters(['read' => 1]);
		
		if($News['feed']['res']['scrap'] )
		{
			$this->layout="main";
			if(empty($News['body'] ))
			{
					$config = new Config;
				$config->setGrabberRulesFolder(\Yii::getAlias('@frontend/Rules'));
               // if($News['feed']['res']['trend']==4)
			     // $config->setProxyPort(8080)->setProxyHostname('62.176.12.111');
				
				$grabber = new Scraper($config);
				$grabber->setUrl($News['url']);
				$grabber->execute();
			
				if($grabber->hasRelevantContent())
				{
				$model=Items::findOne($id);
				$fcontent=preg_replace('/&.+?;/', '', $grabber->getFilteredContent());
				
				$model->body = preg_replace_callback('/<img([^>]*)src=["\']([^"\'\\/][^"\']*)["\']/',
			      function ($matches)use ($News) {
					 if(isFound($matches[2]))
                    return '<img alt="اخبار اليمن الان الحدث اليوم  عاجل '.$News['feed']['res']['rName'] .'" title=" '.$News['feed']['res']['rName'].' اخبار اليمن الان '.topWords($News['title'],5).' " '.$matches[1].'src="'.imgUrl2($matches[2],param('imgOptions_large'),param('imgExt')).'"';
				//return $matches[2];
                      }, 
					  $fcontent);
				//$model->body=$grabber->getFilteredContent();
				$News['body']=$model->body;
				$model->save();
				}
			}
	//echo \Yii::$app->request->pathInfo;			
			if(preg_match('/urgent-news/i',\Yii::$app->request->pathInfo))
				
			$this->view->registerMetaTag(['name' => 'robots', 'content' => 'noindex']);

					//echo "filterd".$grabber->getFilteredContent();
			//var_dump($grabber->hasRelevantContent());
			//echo "scrap";
			return cleanHtml( $this->render('scrap',['news'=>$News]));
		}
	

		if(!preg_match('/https/i',$News['url']))
			{
			  //  echo "redirect33".$News['url'];
			  //$url=url(['/shownews/'.$id.'.html',],'http');
			   $url=itemUrl($News['id'],$News['slug'],param('urgentSlug'));
			 
			  $url=url([$url,],'http');
 //echo "redirect33".$url;exit;

				 $this->redirect($url);
			}
			
		return cleanHtml($this->render('index',['news'=>$News]));
    }
	/*public function actionTest($id)
	{
		//	echo "dddd".$id;
		//	exit;

					
	}*/
	public function actionSlug($slug)
	{
		\Yii::$app->assetManager->bundles['yii\web\JqueryAsset'] = false;
         \Yii::$app->assetManager->bundles['yii\web\YiiAsset'] = false;
	    
	
		$News=Items::find()->select(['id','feedId','title','url','read','itemDate','enclosureUrl','content','body','slug','thumb'])->where(['slug'=>$slug])->with(
							[
								'feed' => function ($query) {
								$query->select(['id','cat','resID'])->with(['res'=>function($q){$q->select(['id','rName','scrap','trend']);},'topics',]); 
								},
							])->asArray()->cache(20)->one();
	

if(!$News) {

//\Yii::error('slug:'.$slug.' homeurl: '.mb_detect_encoding($slug));
return $this->redirect(\Yii::$app->homeUrl);

//\Yii::error('post redirect:');
}

//\Yii::error('slug:'.$slug.' news: '.json_encode($News));
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
               // if($News['feed']['res']['trend']==4)
			     // $config->setProxyPort(8080)->setProxyHostname('62.176.12.111');
				
				$grabber = new Scraper($config);
				$grabber->setUrl($News['url']);
				$grabber->execute();
			
				if($grabber->hasRelevantContent())
				{
				$model=Items::findOne($id);
				$fcontent=preg_replace('/&.+?;/', '', $grabber->getFilteredContent());
				
				$model->body = preg_replace_callback('/<img([^>]*)src=["\']([^"\'\\/][^"\']*)["\']/',
                 function ($matches)use ($News) {
					 if(isFound($matches[2]))
                    return '<img alt="اخبار اليمن الان الحدث اليوم  عاجل '.$News['feed']['res']['rName'] .'" title=" '.$News['feed']['res']['rName'].' اخبار اليمن الان '.topWords($News['title'],5).' " '.$matches[1].'src="'.imgUrl2($matches[2],param('imgOptions_large'),param('imgExt')).'"';
				//return $matches[2];
                      }, 
					  $fcontent);
				//$model->body=$grabber->getFilteredContent();
				$News['body']=$model->body;
				$model->save();
				}
			}
	//echo \Yii::$app->request->pathInfo;			
			if(preg_match('/urgent-news/i',\Yii::$app->request->pathInfo))
				
			$this->view->registerMetaTag(['name' => 'robots', 'content' => 'noindex']);

					//echo "filterd".$grabber->getFilteredContent();
			//var_dump($grabber->hasRelevantContent());
			//echo "scrap";
			return cleanHtml( $this->render('scrap',['news'=>$News]));
		}
	

		if(!preg_match('/https/i',$News['url']))
			{
			  //  echo "redirect33".$News['url'];
			  //$url=url(['/shownews/'.$id.'.html',],'http');
			   $url=itemUrl($News['id'],$News['slug'],param('urgentSlug'));
			 
			  $url=url([$url,],'http');
 //echo "redirect33".$url;exit;

				 $this->redirect($url);
			}
			
		return cleanHtml($this->render('index',['news'=>$News]));
	}
	
	
	public function actionTest($slug,$amp)
	{
		echo $slug.' : '.$amp;
		exit;

		\Yii::$app->assetManager->bundles['yii\web\JqueryAsset'] = false;
         \Yii::$app->assetManager->bundles['yii\web\YiiAsset'] = false;
	    
	
		$News=Items::find()->select(['id','feedId','title','url','read','itemDate','enclosureUrl','content','body','slug'])->where(['slug'=>$slug])->with(
							[
								'feed' => function ($query) {
								$query->select(['id','cat','resID'])->with(['res'=>function($q){$q->select(['id','rName','scrap','trend']);},'topics',]); 
								},
							])->asArray()->cache(60)->one();
		ob_start();//print_r ($News);
		echo $News['id'].' : '.$News['slug'];
		\Yii::error('news :'.ob_get_clean());
		 $id=$News['id'];
		// print_r($News);exit;
					//\Yii::trace($News['id']);
if(!$News)		return "not found news"; 
	if(!isset($_COOKIE["news".$id]))
		{
			

			Items::findOne($id)->updateCounters(['read' => 1]);
			$cookie = new Cookie(['name' => 'news'.$id,'value' => $id,'expire' => time() + 1750,]);
			 \Yii::$app->getResponse()->getCookies()->add($cookie);
		}
		
		if($News['feed']['res']['scrap'] )
		{
			$this->layout="main";
				$config = new Config;
				$config->setGrabberRulesFolder(\Yii::getAlias('@frontend/Rules'));
			//	if($News['feed']['res']['trend']==4)
			     //$config->setProxyPort(8080)->setProxyHostname('62.176.12.111');
				echo "scrap block:".$News['url'];
				$grabber = new Scraper($config);
				$grabber->setUrl($News['url']);
				$grabber->execute();
			if($grabber->hasRelevantContent())
				{
				$model=Items::findOne($id);
				$fcontent=preg_replace('/&.+?;/', '', $grabber->getFilteredContent());
				
				$model->body = preg_replace_callback('/<img([^>]*)src=["\']([^"\'\\/][^"\']*)["\']/',
			     function ($matches)use ($News) {
					 if(isFound($matches[2]))
                    return '<img alt="اخبار اليمن الان الحدث اليوم  عاجل '.$News['feed']['res']['rName'] .'" title=" '.$News['feed']['res']['rName'].' اخبار اليمن الان '.topWords($News['title'],5).' " '.$matches[1].'src="'.imgUrl2($matches[2],param('imgOptions_large'),param('imgExt')).'"';
				//return $matches[2];
                      }, 
					  $fcontent);
				//$model->body=$grabber->getFilteredContent();
				echo 'bodyV:'.$model->body;
				$News['body']=$model->body;
				$model->save();
				}
			
	//echo \Yii::$app->request->pathInfo;			
			if(preg_match('/urgent-news/i',\Yii::$app->request->pathInfo))
				
			$this->view->registerMetaTag(['name' => 'robots', 'content' => 'noindex']);
			echo "raw::: ".$grabber->getRawContent();

			echo "filterd".$grabber->getFilteredContent();
			echo ' relevant:';
			echo 'encodeing:-'.mb_detect_encoding($grabber->getFilteredContent());
			var_dump($grabber->hasRelevantContent());
			
						echo ' row content:';

		var_dump($grabber->getRawContent());
			echo "scrap : trend".$News['feed']['res']['trend'];exit;
			return cleanHtml( $this->render('scrap',['news'=>$News]));
		}
	

		if(!preg_match('/https/i',$News['url']))
			{
			  //  echo "redirect33".$News['url'];
			  //$url=url(['/shownews/'.$id.'.html',],'http');
			   $url=itemUrl($News['id'],$News['slug'],param('urgentSlug'));
			 
			  $url=url([$url,],'http');
 //echo "redirect33".$url;exit;

				 $this->redirect($url);
			}
			
		return cleanHtml($this->render('index',['news'=>$News]));
	}
	
	
	 public function actionShownews($id)
	 {
		//  return $this->_index($id);
		//echo "show news".$id;exit;
		  $News=Items::find()->select(['id','feedId','title','url','read','itemDate','enclosureUrl','content','body','slug','thumb'])->where(['id'=>$id])->with(
							[
								'feed' => function ($query) {
								$query->select(['id','cat','resID'])->with(['res'=>function($q){$q->select(['id','rName','domain','scrap']);}]); 
								},
							])->asArray()->cache(120)->one();
			return $this->render('index',['news'=>$News]);
		  
	 }
}
