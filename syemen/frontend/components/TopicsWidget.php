<?php
namespace frontend\components;
use yii\base\Widget;
use common\models\Topics;
class TopicsWidget extends Widget
{
	public $ress;
	protected $Rsql='SELECT a.id,a.rName,a.domain,count(b.id) as cnt FROM `res` a ,feeds f,items b where a.id=f.resID and f.id=b.feedid and a.active=1 GROUP by id,rName';
public $limit;
    public function init()
    {
        parent::init();
	//	$this->ress = \Yii::$app->db->createCommand($this->Rsql)->queryAll(); 
$this->ress= Topics::find()->limit($this->limit)->all();		
    }

    public function run()
    {
		return $this->render('topics',['ress'=>$this->ress]);
    }
}