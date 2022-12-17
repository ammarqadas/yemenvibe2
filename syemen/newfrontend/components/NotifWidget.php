<?php
namespace frontend\components;
use yii\base\Widget;
use common\models\Trends;
class NotifWidget extends Widget
{
	//public $ress;
//public $limit;
    public function init()
    {
        parent::init();
	//	$this->ress = \Yii::$app->db->createCommand($this->Rsql)->queryAll(); 
//$this->ress= Trends::find()->where(['active'=>1])->limit($this->limit)->all();		
    }

    public function run()
    {
		return $this->render('notif');
    }
}