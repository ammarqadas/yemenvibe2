<?php
namespace frontend\components;
use yii\base\Widget;
use common\models\Items;
use yii;


class YemenWidget extends Widget
{
	//public $limit = 6;
	protected $items;
	public $fromDate;
    public $toDate;
    public $limit =0;
	public $type="aside";
    public function init()
    {
		parent::init();
		if($this->type=='aside')
 $itemq= Items::find()->select(['id','title','slug']);
		else
$itemq= Items::find()->innerJoin('Feeds','Items.feedId=Feeds.id')->select(['id','feedId','title','url','read','itemDate','enclosureUrl','content','slug'])->with(
							[
								'feed' => function ($query) {
								$query->select(['id','cat','resID'])->with(['res'=>function($q){$q->select(['id','rName','scrap'])->innerJoin('Res','Res.id=Feeds.resID ')->where(['scrap' => 1]);}
,'topics',]);
								}
,
							]);//->where('itemDate >= '.strtotime('-1 days'))->orderBy('read desc ,itemDate desc')->limit(6)->asArray()->all();

if($this->limit)$itemq->limit($this->limit);
$this->items =$itemq->where('ItemDate > '.strtotime($this->fromDate).' and ItemDate <= '.strtotime($this->toDate))
//->andWhere(['Res.scrap' => 1])
->orderBy('read desc')->asArray()->all();
			
    }


    public function run()
    {
		if($this->type=='aside')
		return $this->render('yemen',['items'=>$this->items]);
	return $this->render('yemen2',['items'=>$this->items]);
		;
	}

}

