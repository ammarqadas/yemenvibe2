<?php
namespace frontend\controllers;
use common\models\Items;
use common\models\Res;
use common\models\Topics;
use common\models\Trends;
use frontend\components\VibeController;
use yii\data\SqlDataProvider;
use yii\data\Pagination;
class ItemsController extends VibeController
{
	private function _index($limit1=50,$limit2=5)
    {		$itemq=Items::find();	
			
	    	$items = $itemq->select(['id','feedId','title','url','read','itemDate','slug'])->with(
							[
								'feed' => function ($query) {
								$query->select(['id','cat','resID'])->with(['res'=>function($q){$q->select(['id','domain','rName']);},
																			'topics',
																			]);
								},
							])->where('itemDate >= '.strtotime('-4 hours'))->orderBy('itemDate desc')->limit($limit1)->cache(30)->asArray()->all();
	        $headers= Items::find()->select(['id','feedId','title','url','read','itemDate','enclosureUrl','content','slug'])->with(
							[
								'feed' => function ($query) {
								$query->select(['id','cat','resID'])->with(['res'=>function($q){$q->select(['id','domain','rName']);},'topics',]);
								},
							])->where('itemDate >= '.strtotime('-1 hours'))->orderBy('read desc ,itemDate desc')->limit($limit2)->asArray()->all();
		return cleanHtml($this->render('index',array(
			'items'=>$items ,
		
		    'headers' =>$headers,
		)));
	//	return cleanHtml($content);
    }
	
	public function actionIndex()
	{
		return $this->_index();
	}
	public function actionMindex()
	{
		return $this->_index(40,3);
	}
	public function actionTrend($slug)
	{
		
	}
	public function behaviors()
	{
		return [
					[
					'class' => 'yii\filters\HttpCache',
					'only' => ['index'],
					'lastModified' => function ($action, $params) {
						$item=Items::find()->select(['itemDate'])
						->where('itemDate >= '.strtotime('-20 minutes'))->orderBy('itemDate desc')->limit(1)->asArray()->one();
					//	 $q = new \yii\db\Query();
						return $item['itemDate']; 
						//$q->from('Items')->max('itemDate');          
						},
					],
			   ];
	}

}
