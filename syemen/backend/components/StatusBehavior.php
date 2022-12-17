<?php
namespace backend\components;
use yii\base\Behavior;
class StatusBehavior extends Behavior
{
	public function actionEnable($id)
	{
		if($this->owner->findModel($id)->enable())
			\Yii::$app->session->setFlash('success', 'Resource has been enabled Successfully');;
		
	}
	public function actionDisable($id)
	{
		if($this->owner->findModel($id)->disable())
			\Yii::$app->session->setFlash('success', 'Resource has been Disabled Successfully');
		return $this->owner->render('view', [
            'model' => $this->owner->findModel($id),
        ]);
		
	}
}

?>