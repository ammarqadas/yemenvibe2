<?php

namespace frontend\controllers;
use common\models\Items;
use common\models\Res;
use common\models\Feeds;
use common\models\Topics;
use common\models\Trends;
use yii\data\SqlDataProvider;
use yii\data\Pagination;

class SourceController extends \yii\web\Controller
{
	
	private function _index($res)
	{
		
		 $tokens=qstr('token');
		
       $tok=explode('-',$tokens);
		if($tokens)
		if($tok[0] < strtotime(param('SourceWhere')))
		{
			//$tok=explode('-',$tokens);
			$itemq = Items::find()->where(['<','itemDate',$tok[0]])
			->andWhere(['>','itemDate',strtotime(param('SourceWhere'), $tok[0])])->orderBy(['itemDate'=> SORT_DESC,'Items.id'=>SORT_DESC])//'read desc ,itemDate desc'
			->andWhere(['<','Items.id',$tok[1]])
			;
		}
		else
		{
		$itemq = Items::find()->where(['<','itemDate',$tok[0]])
		->andWhere(['>','itemDate',strtotime(param('SourceWhere'))])
		->andWhere(['<','Items.id',$tok[1]])
		->orderBy(['Items.id'=>SORT_DESC])
		;
		}
        else 
		$itemq = Items::find()->where(['>=','itemDate',strtotime(param('SourceWhere'))])->orderBy(['itemDate'=> SORT_DESC,'Items.id'=>SORT_DESC]);
						
		$resItems=$itemq ->select(['Items.id','Items.feedId','url','read','title','itemDate','enclosureUrl','content','slug','thumb'])->innerJoinWith(
					[
					'feed' => function($query){$query->select(['Feeds.resID','Feeds.id','cat'])->innerJoinWith(//'res',//false//'items'
																							[
																							'res'=>function($q){$q->select(['Res.id','rName']);}
																							]
																						  )
																						  ->with('topics')
																						 
																						  ;
																						  }
					])->andWhere(['Res.id'=>$res->id]);
		
     $resItems=$resItems->limit(param('ItemsPerPage') + 2)->asArray()->all();	
if(!$resItems)
{
	$resItems=Items::find()
	 ->select(['Items.id','Items.feedId','url','read','title','itemDate','enclosureUrl','content','slug','thumb'])->innerJoinWith(
					[
					'feed' => function($query){$query->select(['Feeds.resID','Feeds.id','cat'])->innerJoinWith(//'res',//false//'items'
																							[
																							'res'=>function($q){$q->select(['Res.id','rName']);}
																							]
																						  )
																						  ->with('topics')
																						 
																						  ;
																						  }
					])->andWhere(['Res.id'=>$res->id])->limit(param('ItemsPerPage') + 20)->asArray()->all();
		
}	
$next= count($resItems)> param('ItemsPerPage')? $resItems[param('ItemsPerPage')]:NULL;

			return cleanHtml($this->render('index',array(
			'rName'=>$res->rName,
			'next'=>$next ,
			'res'=>$resItems 
			)));
	}
	public function actionIndex($slug)
	{
		//echo "slug".$slug;
		   $resName=preg_replace('/\-/',' ',$slug);
		    $res=Res::find()->where(['rName'=>$resName])->one();
			if(!$res)
			 $this->redirect(\Yii::$app->homeUrl);
			return $this->_index($res);
			
			
	}
	public function actionDomain($domain)
	{
		$res=Res::find()->where(['domain'=>$domain])->one();
		return $this->_index($res);
			
	}
	
	
	
	


}
