<?php
namespace frontend\components;
use yii\base\Widget;
use common\models\Items;
use yii;


class TopnewsWidget extends Widget
{
	//public $limit = 6;
	public $items;
    public function init()
    {
		parent::init();
		$d1 =(!empty(Yii::$app->params['topnewsTime']))?Yii::$app->params['topnewsTime']:' -2 days';
		$limit =(!empty(Yii::$app->params['topnewsLimit']))?Yii::$app->params['topnewsLimit']:5;
		$this->items = Items::find()->with([
								'feed' => function ($query) {
								$query->select(['id','cat','resID'])->with('res');
								},
					])->where('ItemDate > '.strtotime($d1).' and ItemDate < '.strtotime('-1 hours') )->orderBy('read desc')->limit($limit)->asArray()->all();							
        
    }

    public function run()
    {
		return $this->render('topnews',['items'=>$this->items]);
	}
}