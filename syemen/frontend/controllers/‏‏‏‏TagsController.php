<?php
namespace frontend\controllers;
use common\models\Items;
use common\models\Topics;
use frontend\components\VibeController;
class TagsController extends VibeController
{
	private function _index($limit1=35,$limit2=15)
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
    }
	
	public function actionIndex()
	{
		return $this->_index();
	}
	
	public function actionTest()
	{
		echo 'tags';exit;
		
	/*
	اخبار-محافظه-البيضاء
	WHERE MATCH (title,content,author) AGAINST ('traveling -Seattle' IN BOOLEAN MODE)
	*/
	$conf=Yii::$app->homelinks->conf('اخبار-محافظه-البيضاء');
	print_r($conf);
	
	exit;
	if(\Yii::$app->homelinks->search($link))
	
			$itemq=Items::find();	
			
	    	$items = $itemq->select(['id','feedId','title','url','read','itemDate','slug'])->with(
							[
								'feed' => function ($query) {
								$query->select(['id','cat','resID'])->with(['res'=>function($q){$q->select(['id','domain','rName']);},
																			'topics',
																			]);
								},
							])->where('itemDate >= '.strtotime($conf['from']))
							->andWhere("MATCH (Items.title,Items.content) AGAINST (':search' IN BOOLEAN MODE)",['search'=>Yii::$app->homelinks->search($link)])
							->orderBy('itemDate desc')->limit($limit1)->cache(30)->asArray()->all();
	        $headers= Items::find()->select(['id','feedId','title','url','read','itemDate','enclosureUrl','content','slug'])->with(
							[
								'feed' => function ($query) {
								$query->select(['id','cat','resID'])->with(['res'=>function($q){$q->select(['id','domain','rName']);},'topics',]);
								},
							])->where('itemDate >= '.strtotime($conf['topwhere']))
							 ->andWhere("MATCH (Items.title,Items.content) AGAINST (':search' IN BOOLEAN MODE)",['search'=>Yii::$app->homelinks->search($link)])
							->orderBy('read desc ,itemDate desc')->limit($limit2)->asArray()->all();

							return cleanHtml($this->render('index',array(
			'items'=>$items,
			'link'=>$link,
		    'headers' =>$headers,
		)));
	
	
		
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
