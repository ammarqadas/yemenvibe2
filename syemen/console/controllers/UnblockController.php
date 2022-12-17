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
class UnblockController extends Controller
{


	protected $reader ;
	public function init()
	{
		parent::init();
		echo 'init func';
		$this->reader=new ReaderComp;

	}
	protected function download($url,$lastm)
        {
 
                   return Client::getInstance()
                    //    ->setConfig($this->config)
                        ->setLastModified($lastm)
                      //  ->setEtag($etag)
                       // ->setUsername($username)
                        ->setTimeout(30)
//                        ->setPassword($password)
                        ->setProxyPort(8080)
 //                       ->setProxyHostname('50.224.238.78')
                        ->setProxyHostname('62.176.12.111')
                        ->execute($url);

       }

	private function _process($tout=10,$n1=-1,$n2=10)
	{
//		$reader = new ReaderComp;
	
		$this->reader->timeout = $tout;
	//	$this->reader->timeout = '62.176.12.111';
	//	 $this->reader->port = 8080;
		$feeds=Feeds::find()->innerJoin('Res','Res.id=Feeds.resID ')
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
							->where(['Feeds.active' => 1,'Res.active' => 1,'Res.trend'=>4])
							//->andWhere(['like','Feeds.lastError','%allowed to access resource%'])
							->andWhere(['<=', 'failNo', $n2])
								->andWhere(['>', 'failNo', $n1])
							->orderby('lastChecked asc')->limit(\Yii::$app->params['feedsPerTime']/2)->asArray();
		//	$i=0;
		$cmd=\Yii::$app->db->createCommand();
		foreach ($feeds->batch(\Yii::$app->params['feedsPerEach']) as $fds)
		{
			//echo "batch".$i++;
				$items =$udpFeeds =$ids=array();
			
				foreach ($fds as $fd)
				{
			//	print_r($fd);
					$lastDate=count($fd['items'])? $fd['items'][0]['lastDate']:strtotime("-1 hour");
					//	echo "\n lastDate on :".$lastDate;
					//  if($fd['lastDate']==0)$fd['lastDate']= strtotime(date('D, d M Y H:i:s',$fd['created_at']));
					$lastModified= FeedsHelper::gmtDate($lastDate);//(!empty($fd['lastModified']))?$fd['lastModified']:$fd['lastDate'];
				try{ 	
					//Yii::info($fd['feedurl'], __line__);
					$resource = $this->download($fd['feedurl'],$lastModified);
					$stcode=$resource->getStatusCode();	
					echo "\n stocde on :".$stcode;

					//Yii::info("code".$stcode, __line__);
					   if($stcode==200)
				     {
						
					   $parser = $this->reader->getParser(
											$resource->getUrl(),
											$resource->getContent(),
											$resource->getEncoding()
										);
						$feed  = $parser->execute();
						if($fItems=FeedsHelper::getFeedItems($feed,$fd['id'],$lastDate))//strtotime($feed->date->format(DATE_RSS))
						{
							
							$items =ArrayHelper::merge($items,$fItems );
							
						}
						
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
	 }
	
   
   
	public function actionIndex()
	{
		echo "\n slow started on :".date(DATE_RSS);
				$this->_process($tout=30,$n1=-1,$n2=10);	
				echo "\n finished on :".date(DATE_RSS);
				

	}

}
