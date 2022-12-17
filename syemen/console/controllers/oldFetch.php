<?php

namespace console\controllers;
use PicoFeed\Reader\Reader;
use PicoFeed\PicoFeedException;
use common\models\Feeds;
use common\models\Items;
use common\components\FeedsHelper;
use yii\helpers\ArrayHelper;
use yii\console\Controller;
use yii\helpers\Console;
use yii;
class FetchController extends Controller
{
   
    public function actionIndex()
    {
		//try {
			$reader = new Reader;
			$feeds=Feeds::find()->innerJoin('Res','Res.id=Feeds.resID ')->where(['Feeds.active'=>1,'Res.active'=>1])->andWhere(['<=', 'failNo', 10])->orderby('lastChecked asc')->limit(\Yii::$app->params['feedsPerTime'])->asArray()->all();
			$items =$udpFeeds =array();
			
			foreach ($feeds as $fd)
			{
				//  if($fd['lastDate']==0)$fd['lastDate']= strtotime(date('D, d M Y H:i:s',$fd['created_at']));
				$lastModified= FeedsHelper::gmtDate($fd['lastDate']);//(!empty($fd['lastModified']))?$fd['lastModified']:$fd['lastDate'];
				//$lastModified="Tue, 29 May 2018 16:28:22 GMT+0300";
			//	echo "lastm ".$lastModified;
			$etag=$fd['etag']?:null;
			try{ 	
		//	echo $fd['feedurl'];
			Yii::info($fd['feedurl'], __line__);
				$resource = $reader->download($fd['feedurl'],$lastModified,$etag);
				$stcode=$resource->getStatusCode();
			//	echo $resource::trace();
				//echo "code".$stcode;
				
				Yii::info("code".$stcode, __line__);
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
						$fdata =ArrayHelper::merge(FeedsHelper::getFeedStatus($resource),['lastDate' =>max($itemdate),'lastError'=>'','failNo'=>0]);
						print_r($fdata);
						$items =ArrayHelper::merge($items,$fItems );
						$udpFeeds[$fd['id']]=$fdata;
					}
				}	
				
			 }catch(PicoFeedException $e)
			 {
			
				Yii::info("catch".$e->getMessage(), __line__);
				 $fmodel =Feeds::findOne($fd['id']);
				 $fmodel->failNo +=1;
				 $fmodel->lastError=$e->getMessage();
				 $fmodel->lastChecked = strtotime(date(DATE_RSS));
				 $fmodel->save();
			}
					
			}
		//	 mb_internal_encoding('UTF-8');
		
	//	Yii::info("items".implode(',',$items));
	//	Yii::info("udpFeeds".implode(',',$udpFeeds));
	
		//print_r($udpFeeds);
	//	echo "fetch/index";
		$cmd=\Yii::$app->db->createCommand();
			if($items)
			{
			$cmd->batchInsert(Items::tableName(),['feedId','title','url','enclosureUrl','enclosureType','content','itemDate','slug'], $items);
		//	echo $cmd->rawSql ;
		//	$cmd->rawSql .=preg_replace('/INSERT/', '/INSERT IGNORE /',$cmd->rawSql);
		$cmd->rawSql ='INSERT IGNORE' . mb_substr( $cmd->rawSql, strlen( 'INSERT' ) );
		//	echo "rawsql".	$cmd->rawSql;
			
			//	$cmd->rawSql .=" ON DUPLICATE KEY UPDATE " ;
			$cmd->execute();
			}
			if($udpFeeds)	foreach($udpFeeds as $key =>$data) $cmd->update(Feeds::tableName(), $data, ['id'=>$key])->execute();
			
			//return  $this->render('index');
				
	}

}
