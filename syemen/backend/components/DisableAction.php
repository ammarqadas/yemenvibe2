<?php
namespace backend\components;
use yii\base\Action;

class DisableAction extends Action
{
    public function run($id)
    {
		$model=$this->controller->findModel($id);
		$model->active=0;
       if($model->save())
			\Yii::$app->session->setFlash('success', 'Resource has been disabled Successfully');
		return $this->controller->goBack();
		//return $this->controller->redirect(['view', 'id' => $id]);
    }
}
?>