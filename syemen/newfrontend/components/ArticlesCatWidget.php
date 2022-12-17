<?php
namespace frontend\components;
use yii\base\Widget;
use common\models\Items;
use yii;


class ArticlesCatWidget extends Widget
{
	protected $items;
	public $limit;
	public $cat;
    public function init()
    {
		parent::init();
		$this->items = Items::find()->from( Items::tableName().' use index (itemdateindex)')->select(['Items.id','feedId','title','read','itemDate','enclosureUrl','slug'])->with(
							[
								'feed' => function ($query) {
								$query->select(['id','cat','resID'])->with(['res'=>function($q){$q->select(['id','domain','rName']);},'topics',]);
								},
							])->innerJoin('Feeds','Feeds.id=Items.feedId and cat='.$this->cat)->where(['>=', 'itemDate', strtotime('-6 hours')])->limit($this->limit)->asArray()->all();
										
        
    }

    public function run()
    {
		return $this->render('articles',['items'=>$this->items]);
	}
 public function check(){return count($this->items)? true:false;}

}