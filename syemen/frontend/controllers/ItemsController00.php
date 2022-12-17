<?php

namespace frontend\controllers;
use common\models\Items;
use common\models\Res;
use common\models\Topics;
use yii\data\SqlDataProvider;
use yii\data\Pagination;

class ItemsController extends \yii\web\Controller
{
	
	 
    public function actionIndex()
    {
		//\Yii::$app->assetManager->bundles['yii\web\JqueryAsset'] = false;
		//\Yii::$app->assetManager->bundles['yii\web\YiiAsset'] = false;
			
			$itemq=Items::find();	
			// $countQuery = clone $itemq;
		//	echo $itemq->count();
          // $pages = new Pagination(['totalCount' => $itemq->count(),
		//  'maxButtonCount' =>\Yii::$app->params['pageCount'],
			
	//	echo "url ".$pages->createUrl(0); 
		$items = $itemq->select(['id','feedId','title','url','read','itemDate','slug'])->with(
							[
								'feed' => function ($query) {
								$query->select(['id','cat','resID'])->with(['res'=>function($q){$q->select(['id','domain','rName']);},
																			'topics',
																			]);
								},
							])->where('itemDate >= '.strtotime('-4 hours'))->orderBy('itemDate desc')->limit(50)->cache(20)->asArray()->all();
		//$Asql='SELECT a.* , r.rName , r.id FROM `items` a INNER JOIN feeds b on a.feedid=b.id  inner join res r on b.resID = r.id   where b.cat=2';
			
		//$articles=\Yii::$app->db->createCommand($Asql)->queryAll();			
		/*$articles = Items::find()->with([
								'feed' => function ($query) {
								$query->select(['id','cat','resID'])->with('res');
								},
					])->where(['cat'=>2])->orderBy('read desc')->asArray()->all();		*/
		$headers= Items::find()->select(['id','feedId','title','url','read','itemDate','enclosureUrl','content','slug'])->with(
							[
								'feed' => function ($query) {
								$query->select(['id','cat','resID'])->with(['res'=>function($q){$q->select(['id','domain','rName']);},'topics',]);
								},
							])->where('itemDate >= '.strtotime('-1 hours'))->orderBy('read desc ,itemDate desc')->limit(4)->asArray()->all();
		return cleanHtml($this->render('index',array(
			'items'=>$items ,
		//	'ress' =>$ress,
			//'articles'=>$articles,
			   'pages' => $pages,
		    'headers' =>$headers,
		)));
	//	return cleanHtml($content);
    }
	

}
