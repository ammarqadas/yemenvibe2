<?php
namespace frontend\components;
use yii\base\Widget;
use common\models\Trends;
class TrendsWidget extends Widget
{
	public $ress;
public $limit=5;
    public function init()
    {
        parent::init();
	//	$this->ress = \Yii::$app->db->createCommand($this->Rsql)->queryAll(); 
$this->ress= Trends::find()->where(['active'=>1])->limit($this->limit)->all();		
    }

    public function run()
    {
		return $this->render('trends',['ress'=>$this->ress]);
    }
}