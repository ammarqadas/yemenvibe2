<?php
namespace frontend\components;
use yii\base\Widget;
class ResWidget extends Widget
{
	public $ress;
	protected $Rsql='SELECT a.id,a.rName,a.domain,count(b.id) as cnt FROM `Res` a ,Feeds f,Items b where a.id=f.resID and f.id=b.feedid and a.active=1 GROUP by id,rName';
public $order =' count(b.id) desc ';
public $limit=0;
    public function init()
    {
        parent::init();
		$this->Rsql .=' order by '.$this->order;
		if($this->limit)$this->Rsql .=' limit '.$this->limit;
			
		$this->ress = \Yii::$app->db->createCommand($this->Rsql)->queryAll();    
    }

    public function run()
    {
		return $this->render('res',['ress'=>$this->ress]);
    }
}