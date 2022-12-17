<?php
namespace common\components;
use yii\base\Behavior;
class StatusModelBehavior extends Behavior
{
	public function Enable()
	{
		//$model=$this->owner::findOne($id);
		$this->active=1;
		$this->save();
	}
	public function Disable()
	{
		//$model=$this->owner::findOne($id);
		$this->active=0;
		$this->save();
		
	}
}
