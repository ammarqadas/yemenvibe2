<?php
namespace frontend\components;
use yii\base\Widget;
use common\models\Trends;
class FbModalWidget extends Widget
{
	//public $ress;
//public $limit;
public $title;
public $url;
public $turl;
    public function init()
    {
        parent::init();
	
	//	$this->ress = \Yii::$app->db->createCommand($this->Rsql)->queryAll(); 
//$this->ress= Trends::find()->where(['active'=>1])->limit($this->limit)->all();		
    }

    public function run()
    {
		return $this->render('fbmodal',['url'=>$this->url,'title'=>$this->title,'turl'=>$this->turl]);
    }
}