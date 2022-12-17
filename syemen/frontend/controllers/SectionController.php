<?php

namespace frontend\controllers;
use common\models\Items;
use common\models\Res;
use common\models\Feeds;
use common\models\Topics;
use common\models\Trends;
use yii\data\SqlDataProvider;
use yii\data\Pagination;

class SectionController extends \yii\web\Controller
{
	
	public function actionIndex($slug)
	{
		if($slug=='أخبار-اليمن')$slug='اخبار-اليمن';
		$topic=Topics::find()->where(['slug'=>$slug])->one();
		if(!$topic)
			 $this->redirect(\Yii::$app->homeUrl);
		 if($topic->id==8)//sahafah net section
			 $this->redirect('/صحافه-نت-اخبار-اليمن');
			  if($topic->id==1)//yemen news section
		    	return $this->_yemen();
		$tokens=qstr('token');
		$tok=explode('-',$tokens);
		if($tokens)
		if($tok[0] > strtotime(param('TopicWhere')))
		{
			//$tok=explode('-',$tokens);
			$itemq = Items::find()->where(['<','itemDate',$tok[0]])
			->andWhere(['>','itemDate',strtotime(param('TopicWhere'), $tok[0])])->orderBy(['itemDate'=> SORT_DESC])
			->andWhere(['<','Items.id',$tok[1]]);
		}
		else
		{
		$itemq = Items::find()->where(['<','itemDate',$tok[0]])
		->andWhere(['>','itemDate',strtotime(param('TopicWhere'))])
		->andWhere(['<','Items.id',$tok[1]]);
		}
        else 
		$itemq = Items::find()->where(['>=','itemDate',strtotime(param('TopicWhere'))])->orderBy(['itemDate'=> SORT_DESC]);
		
			$resItems=$itemq->select(['Items.id','Items.feedId','url','read','Items.title','itemDate','Items.slug','Items.content','Items.enclosureUrl','Items.thumb'])->innerJoinWith(
					[
					'feed' => function($query){$query->select(['Feeds.resID','Feeds.id','cat'])->with(['res'=> function($q){$q->select(['id','rName']);}])
																							   ->innerJoinWith('topics');
																							   }
					])->andWhere(['Topics.id'=>$topic->id]);
							
  
	$resItems=$resItems->limit(param('ItemsPerPage') +1 )->asArray()->all();		
	$next= count($resItems)> param('ItemsPerPage')+1? end($resItems):NULL;

		
	return cleanHtml($this->render('index',['topic'=>$topic,'res'=>$resItems ,'next'=>$next]));
			
	}
private function _yemen()
    {
    $limit2=8;
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
					])->where(['Topics.id'=>1]);
							
			
	   if(!$tokens) $headers= $itemq->andWhere('itemDate >= '.strtotime('-4 hours'))->orderBy('read desc ,itemDate desc')->limit($limit2)->asArray()->all();
			$itemq =$itemq->andWhere(['>=','itemDate',strtotime(param('NowNewsLimit'))])
			->andWhere(['<','itemDate',$time]);					
	    $items = $itemq->orderBy('itemDate desc')->limit($limit)->cache(30)->asArray()->all();
		$next= count($items)> param('ItemsPerPage') ? $items[param('ItemsPerPage')]:NULL;
		return cleanHtml($this->render('yemnews',array(
			'items'=>$items ,
		    'headers' =>$headers,
			'next' => $next
		)));
    }
	


}
