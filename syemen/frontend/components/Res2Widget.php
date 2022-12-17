<?php
namespace frontend\components;
use yii\base\Widget;
class Res2Widget extends Widget
{
	public $ress;//SELECT r.id,r.rName,r.domain ,sum(i.read) as cnt FROM `Res` r ,feeds f,items i   where r.active=1 and f.active=1 and r.id=f.resID and f.id=i.feedId
	protected $Rsql;
public $fromDate ='-7 days';
public $limit = 0;
    public function init()
    {
        parent::init();
	//	$this->Rsql .=' order by '.$this->order;
	     $this->Rsql='SELECT r.id,r.rName,r.domain ,sum(i.read) as cnt FROM `Res` r ,Feeds f,Items i where r.active=1 and f.active=1 and i.ItemDate > '.strtotime($this->fromDate).' and r.id=f.resID and f.id=i.feedId group by r.id,r.rName,r.domain order by cnt desc ';
//	if($this->limit)$this->Rsql .=' limit '.$this->limit;
	$this->Rsql .=' limit '.($this->limit?$this->limit:50);
//	\Yii::error('res sql:'.$this->Rsql);
//	 \Yii::error('res limit:'.$this->limit);

		$this->ress = \Yii::$app->db->createCommand($this->Rsql)->queryAll();    
    }

    public function run()
    {
		
		return $this->render('res2',['ress'=>$this->ress]);
    }
}
