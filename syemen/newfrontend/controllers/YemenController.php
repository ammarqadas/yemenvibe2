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
		$items= $itemq->select(['id','feedId','title','url','read','itemDate','enclosureUrl','content','slug'])->with(
							[
								'feed' => function ($query) {
								$query->select(['id','cat','resID'])->with(['res'=>function($q){$q->select(['id','rName']);},'topics',]);
								},
							])->orderBy('read desc ,itemDate desc')->limit(param('ItemsPerPage') + 1)->asArray()->all();
	    $next=count($items)> param('ItemsPerPage')? end($items):NULL;
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

		
		
									
		$items= $itemq->select(['id','feedId','title','url','read','itemDate','slug'])->with(
							[
								'feed' => function ($query) {
								$query->select(['id','cat','resID'])->with(['res'=>function($q){$q->select(['id','rName']);},'topics',]);
								},
								
							])->orderBy('itemDate desc ,id desc')->limit(param('ItemsPerPage') + 1)->asArray()->all();
	
	    $next= count($items)> param('ItemsPerPage')? end($items):NULL;

		return cleanHtml($this->render('nownews',array(
			'items'=>$items,
			 'next' => $next
			)));

	}
	
	public function actionTopnews()
	{
		 $tokens=qstr('token');
		 
		    if($tokens)$tok=explode('-',$tokens);
			$itemq=Items::find()->where(['>=', 'itemDate',strtotime(param('TopNewsLimit'))]);
			if($tokens) $itemq = $itemq->andWhere(['<','itemDate',$tok[0]]);	
	
			
	//		$pages = new Pagination(['totalCount' => $itemq->count(),'pageSize'=>param('ItemsPerPage'),]);
		$items= $itemq->select(['id','feedId','title','url','read','itemDate','enclosureUrl','content','slug'])->with(
							[
								'feed' => function ($query) {
								$query->select(['id','cat','resID'])->with(['res'=>function($q){$q->select(['id','rName']);},'topics',]);
								},
							])->orderBy('read desc ,itemDate desc')->limit(param('ItemsPerPage') + 1)->asArray()->all();
	
									
    $next= count($items)> param('ItemsPerPage')? end($items):NULL;

		
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
