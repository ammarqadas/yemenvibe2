<?php

namespace frontend\controllers;
use PicoFeed\Reader\Reader;
use PicoFeed\PicoFeedException;
use common\models\Feeds;
use common\models\Items;
use common\components\FeedsHelper;
use yii\helpers\ArrayHelper;
class RssController extends \yii\web\Controller
{
    public function actionIndex()
    {
		//try {
			$reader = new Reader;
			$feeds=Feeds::find()->where(['active'=>1])->orderby('lastChecked asc')->limit(\Yii::$app->params['feedsPerTime'])->asArray()->all();
			$items =$udpFeeds =array();
			
			foreach ($feeds as $fd)
			{
				//  if($fd['lastDate']==0)$fd['lastDate']= strtotime(date('D, d M Y H:i:s',$fd['created_at']));
				$lastModified= FeedsHelper::gmtDate($fd['lastDate']);//(!empty($fd['lastModified']))?$fd['lastModified']:$fd['lastDate'];
				//$lastModified="Tue, 29 May 2018 16:28:22 GMT+0300";
				//echo "lastm ".$lastModified;
			$etag=(!empty($fd['etag']))?$fd['etag']:null;
			try{ 	
			echo $fd['feedurl'];
				$resource = $reader->download($fd['feedurl'],$lastModified,$etag);
				$stcode=$resource->getStatusCode();
			//	echo $resource::trace();
				echo "code".$stcode;
				$udpFeeds[$fd['id']]=['lastChecked' => strtotime(date(DATE_RSS))];
				if($stcode==200)
				{
						
					$parser = $reader->getParser(
											$resource->getUrl(),
											$resource->getContent(),
											$resource->getEncoding()
										);
					$feed  = $parser->execute();
					//echo $feed;
					//exit;
					if($fItems=FeedsHelper::getFeedItems($feed,$fd['id'],$fd['lastDate']))//strtotime($feed->date->format(DATE_RSS))
					{
						$itemdate=ArrayHelper::getColumn($fItems, 'itemDate');
					//print_r($itemdate);
						$fdata =ArrayHelper::merge(FeedsHelper::getFeedStatus($resource),['lastDate' =>max($itemdate),'lastError'=>'']);
						print_r($fdata);
						$items =ArrayHelper::merge($items,$fItems );
						$udpFeeds[$fd['id']]=$fdata;
					}
				}	
				
			 }catch(PicoFeedException $e)
			 {
				 echo "catch".$e->getMessage();
				 $fmodel =Feeds::findOne($fd['id']);
				 $fmodel->failNo +=1;
				 $fmodel->lastError=$e->getMessage();
				 $fmodel->lastChecked = strtotime(date(DATE_RSS));
				 $fmodel->save();
			}
					
			}
		//	$itemsdata=\yii\helpers\ArrayHelper::merge();
		print_r($items);
		print_r($udpFeeds);$cmd=\Yii::$app->db->createCommand();
			if($items)
			$cmd->batchInsert(Items::tableName(),['feedId','title','url','enclosureUrl','enclosureType','content','itemDate','slug'], $items);
		$cmd->rawSql .=	' ON DUPLICATE KEY UPDATE';
			$sql3= $cmd->rawSql;
			echo 'sql333:'. $sql3;
			//->execute()
		/*	if($udpFeeds)	foreach($udpFeeds as $key =>$data)
			//\Yii::$app->db->createCommand()->update(Feeds::tableName(), $data, ['id'=>$key])->execute();
			$cmd->update(Feeds::tableName(), $data, ['id'=>$key])->execute();*/
			
			//return  $this->render('index');
				
	}
		

  
	public function actionDiscover()
	{
		

    $reader = new Reader;
    $resource =  $reader->download('http://eventpress.net/');
	var_dump($$resource->getUrl(),$resource->getEncoding()) ;
	

	}

}
