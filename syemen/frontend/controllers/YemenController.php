<?php

namespace frontend\controllers;
use common\models\Items;
use common\models\Res;
use common\models\Feeds;
use common\models\Topics;
use common\models\Trends;
use yii\data\SqlDataProvider;
use yii\data\Pagination;
use frontend\components\VibeController;

class YemenController extends VibeController
{
	
	public function actionTodaynews()
	{
		
		$tokens=qstr('token');
		if($tokens)$tok=explode('-',$tokens);
		//\Yii::$app->getRequest()->getQueryParam('token')??0;
		//$opt=\Yii::$app->getRequest()->getQueryParam('ptoken')?'=<':'>';
		$itemq=Items::find()->where(['>=', 'itemDate',strtotime(param('TodayLimit'))]) ;
		if($tokens) $itemq = $itemq->andWhere(['<','itemDate',$tok[0]]);	

		
		//if($tokens && $tok[1])$itemq=$itemq->andWhere(['>=', 'id',$tok[1]]);
		$items= $itemq->select(['id','feedId','title','url','read','itemDate','enclosureUrl','content','slug','thumb'])->with(
							[
								'feed' => function ($query) {
								$query->select(['id','cat','resID'])->with(['res'=>function($q){$q->select(['id','rName']);},'topics',]);
								},
							])->orderBy('read desc ,itemDate desc')->limit(param('ItemsPerPage') + 3)->asArray()->all();
	    //$next=count($items)> param('ItemsPerPage')? end($items):NULL;
		 $next= count($items)> param('ItemsPerPage') ? $items[param('ItemsPerPage')]:NULL;

		return cleanHtml( $this->render('todaynews',array(
			'items'=>$items,
			 'next' => $next
			)));

	}
	public function actionNownews()
	{
		 $tokens=qstr('token');
		 
		if($tokens)$tok=explode('-',$tokens);
		$time=($tokens)? $tok[0]: strtotime('+2 seconds');
			$itemq =Items::find()->where(['>=','itemDate',strtotime(param('NowNewsLimit'))]);
			$itemq = $itemq->andWhere(['<','itemDate',$time]);	
					//	$itemq=Items::find()->where([$tokens?'<=':'>=', 'itemDate',$time]);

		
		$limit = param('ItemsPerPage') + 3;
									
		$items= $itemq->select(['Items.id','Items.feedId','Items.title','Items.url','read','itemDate','enclosureUrl','content','Items.slug','thumb'])
		->innerJoinWith(
					[
					'feed' => function($query){$query->select(['Feeds.resID','Feeds.id','cat'])->with(['res'=> function($q){$q->select(['id','rName']);}])
																							   ->innerJoinWith('topics');
																							   }
					])->andWhere('Topics.id !=8')
		   ->orderBy('itemDate desc ,id desc')->limit($limit)->asArray()->all();
	
	    $next= count($items)> param('ItemsPerPage') ? $items[param('ItemsPerPage')]:NULL;

		return cleanHtml($this->render('nownews',array(
			'items'=>$items,
			 'next' => $next
			)));

	}
	
	public function actionSahafah()
    {
    $limit2=10;
	 $tokens=qstr('token');
	 $limit = param('ItemsPerPage') + 3;
	 $headers=array();
		if($tokens)$tok=explode('-',$tokens);
		$time=($tokens)? $tok[0]: strtotime('+2 seconds');	
	$itemq=Items::find()
	        ->select(['Items.id','Items.feedId','Items.title','Items.url','Items.read','itemDate','enclosureUrl','content','Items.slug','Items.thumb'])
			->innerJoinWith(
					[
					'feed' => function($query){$query->select(['Feeds.resID','Feeds.id','cat'])->with(['res'=> function($q){$q->select(['id','rName']);}])
																							   ->innerJoinWith('topics');
																							   }
					])->where(['Topics.id'=>8]);
							
			
	   if(!$tokens) $headers= $itemq->andWhere('itemDate >= '.strtotime('-6 hours'))->orderBy('read desc ,itemDate desc')->limit($limit2)->asArray()->all();
			$itemq =$itemq->andWhere(['>=','itemDate',strtotime(param('NowNewsLimit'))])
			->andWhere(['<','itemDate',$time]);					
	    $items = $itemq->orderBy('itemDate desc')->limit($limit)->cache(30)->asArray()->all();
		$next= count($items)> param('ItemsPerPage') ? $items[param('ItemsPerPage')]:NULL;
		return cleanHtml($this->render('sahafah',array(
			'items'=>$items ,
		    'headers' =>$headers,
			'next' => $next
		)));
    }
	
	public function actionTopnews()
	{
		 $tokens=qstr('token');
		 
		    if($tokens)$tok=explode('-',$tokens);
			$itemq=Items::find()->where(['>=', 'itemDate',strtotime(param('TopNewsLimit'))]);
			if($tokens) $itemq = $itemq->andWhere(['<','itemDate',$tok[0]]);	
	
		$limit = param('ItemsPerPage') + 3;

	//		$pages = new Pagination(['totalCount' => $itemq->count(),'pageSize'=>param('ItemsPerPage'),]);
		$items= $itemq->select(['Items.id','Items.feedId','Items.title','Items.url','read','itemDate','enclosureUrl','content','Items.slug','Items.thumb'])
		->innerJoinWith(
					[
					'feed' => function($query){$query->select(['Feeds.resID','Feeds.id','cat'])->with(['res'=> function($q){$q->select(['id','rName']);}])
																							   ->innerJoinWith('topics');
																							   }
					])->andWhere('Topics.id !=8')
		 ->orderBy('read desc ,itemDate desc')->limit(	$limit )->asArray()->all();
	
									
    $next= count($items)> param('ItemsPerPage') ? $items[param('ItemsPerPage')]:NULL;

		
		return cleanHtml($this->render('topnews',array(
			'items'=>$items,
			 'next' => $next
			)));
		
	}
	public function actionWebsites()
	{		
		return cleanHtml($this->render('websites'));
		
	}
	
		public function behaviors()
{
    return [
        [
            'class' => 'yii\filters\HttpCache',
         //   'only' => ['todaynews','nownews'],
            'lastModified' => function ($action, $params) {
                $item=Items::find()->select(['itemDate'])
						->where('itemDate >= '.strtotime('-1 hours'))->orderBy('itemDate desc')->limit(1)->asArray()->one();
         						return $item['itemDate']; 

				},
        ],
    ];
}
	


}
