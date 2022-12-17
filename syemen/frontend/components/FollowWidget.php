<?php
namespace frontend\components;
use yii\base\Widget;
use common\models\Trends;
class FollowWidget extends Widget
{
	
    public function init()
    {
        parent::init();
	   }

    public function run()
    {
		return $this->render('follow');
    }
}