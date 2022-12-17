<?php

namespace console\controllers;
use console\components\ReaderComp;
use PicoFeed\PicoFeedException;
use common\models\Feeds;
use common\models\Items;
use common\components\FeedsHelper;
use yii\helpers\ArrayHelper;
use yii\console\Controller;
use yii\helpers\Console;
use yii;
use PicoFeed\Client\Client;
class FetchTestController extends Controller
{
	public $feedID;

protected function download($url,$lastm)
{

return Client::getInstance()
                    //    ->setConfig($this->config)
                        ->setLastModified($lastm)
                      //  ->setEtag($etag)
                       // ->setUsername($username)
			->setTimeout(50)
//                        ->setPassword($password)
        //                ->setProxyPort(3128)
 //                       ->setProxyHostname('50.224.238.78')
//->setProxyHostname('198.236.196.5')   

->execute($url);

}
	private function _process($id)
	{
		echo 'feedid:'.$id;
		$reader = new ReaderComp;
	//	$reader->setProxyHostname('50.224.238.78');
          //     $reader->setProxyHostname(8080);

	//		$reader->timeout = 30;
			$fd=Feeds::find()->innerJoin('Res','Res.id=Feeds.resID ')
			->with(
							[
								'items' => function ($query) {
								$query->select('feedId,MAX(itemDate) as lastDate')->groupBy(['feedId']);
								},
							])
	/*		->with(
					[
					'res' =>function($query){$query->select(['id','rName']);},
					]
					)*/
			->where(['Feeds.active' => 1,'Res.active' => 1,'Feeds.id'=>$id])
			//->orderby('lastChecked asc')->limit(\Yii::$app->params['feedsPerTime'])
			->asArray()->one();
		//	$i=0;
		$cmd=\Yii::$app->db->createCommand();
		print_r($fd);
			$items =$udpFeeds =$ids=array();
		$lastDate=count($fd['items'])? $fd['items'][0]['lastDate']:strtotime("-15 day");
					//  if($fd['lastDate']==0)$fd['lastDate']= strtotime(date('D, d M Y H:i:s',$fd['created_at']));
					$lastModified= FeedsHelper::gmtDate($lastDate);//(!empty($fd['lastModified']))?$fd['lastModified']:$fd['lastDate'];
				echo "\n lastDate on :".$lastModified;

				try{ 	
					//Yii::info($fd['feedurl'], __line__);
					$resource = $this->download($fd['feedurl'],$lastModified);
					//$resource = $this->download($fd['feedurl']);
					
					$stcode=$resource->getStatusCode();	
					echo "\n stocde on :".$stcode;

					//Yii::info("code".$stcode, __line__);
					   if($stcode==200)
				     {
						
					   $parser = $reader->getParser(
											$resource->getUrl(),
											$resource->getContent(),
											$resource->getEncoding()
										);
						$feed  = $parser->execute();
						print_r($feed );
						//echo 'feed count'.count($feed);
						if($fItems=FeedsHelper::getFeedItems($feed,$fd['id'],$lastDate))//strtotime($feed->date->format(DATE_RSS))
						{
							
							$items =ArrayHelper::merge($items,$fItems );
							
						}
				  print_r($items );

						
					 }	
					 $ids[]=$fd['id'];
				
				}catch(PicoFeedException $e)
				{
			echo "\n"."exception feedid:".$fd['id']." :".$e->getMessage();
			
			try{
				$cmd->update(Feeds::tableName(),['lastChecked' => strtotime(date(DATE_RSS)),'lastError'=>$e->getMessage(),'failNo'=>$fd['failNo'] + 1], ['id'=>$fd['id']])->execute();
			}catch(\yii\db\Exception $e){
				echo "\n"."exception database:".$e->getMessage();

				}
					
				}
		if($items)
			{
			$cmd->batchInsert(Items::tableName(),['feedId','title','url','hashcode','enclosureUrl','enclosureType','content','itemDate','slug'], $items);
		    $cmd->rawSql ='INSERT IGNORE' . mb_substr( $cmd->rawSql, strlen( 'INSERT' ) );
	        $cmd->execute();
			echo "\n".count($items). " records inserted ";
			}
			if($ids)
			$cmd->update(Feeds::tableName(),['lastChecked' => strtotime(date(DATE_RSS)),'lastError'=>'','failNo'=>0], ['id'=>$ids])->execute();

	 }
	
	public function actionSlow($feedID)
	{
		echo "\n slow started on :".date(DATE_RSS);
				$this->_process($feedID);	
				echo "\n finished on :".date(DATE_RSS);
				

	}

}
