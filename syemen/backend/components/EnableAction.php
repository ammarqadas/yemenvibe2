<?php
namespace backend\components;
use yii\base\Action;

class EnableAction extends Action
{
    public function run($id)
    {
		$model=$this->controller->findModel($id);
		$model->active=1;
		
       if($model->save())
			\Yii::$app->session->setFlash('success', 'Resource has been enabled Successfully');
		return $this->controller->goBack();
    }
}
?>