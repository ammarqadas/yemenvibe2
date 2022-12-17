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
		$topic=Topics::find()->where(['slug'=>$slug])->one();
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
		
			$resItems=$itemq->select(['Items.id','Items.feedId','url','read','Items.title','itemDate','Items.slug','Items.content'])->innerJoinWith(
					[
					'feed' => function($query){$query->select(['Feeds.resID','Feeds.id','cat'])->with(['res'=> function($q){$q->select(['id','rName']);}])
																							   ->innerJoinWith('topics',false);
																							   }
					])->andWhere(['Topics.id'=>$topic->id]);
							
  
	$resItems=$resItems->limit(param('ItemsPerPage') +1 )->asArray()->all();		
	$next= count($resItems)> param('ItemsPerPage')? end($resItems):NULL;

					
	return cleanHtml($this->render('index',['topic'=>$topic,'res'=>$resItems ,'next'=>$next]));
			
	}
	


}
