<?php

namespace backend\controllers;

use Yii;
use common\models\Topics;
use yii\data\ActiveDataProvider;
use backend\components\BackendController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TopicsController implements the CRUD actions for Topics model.
 */
class TopicsController extends BackendController
{
    /**
     * @inheritdoc
     */
  

    /**
     * Lists all Topics models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Topics::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Topics model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Topics model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Topics();
		$values=array();
       if(Yii::$app->request->post())
		{
     $values=Yii::$app->request->post();
	 
		$values['Topics']['slug']=\common\components\FeedsHelper::generateSeoURL($values['Topics']['title']);
		//print_r($values);
		//return;
		}
        if ($model->load($values) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Topics model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$values=Yii::$app->request->post();
		//print_r($values);return;
		if($values)
		$values['Topics']['slug']=\common\components\FeedsHelper::generateSeoURL($values['Topics']['title']);
		
		
        if ($model->load($values) && $model->save()) {
			//print_r(Yii::$app->request->post());
			//print_r($values);exit;
           // return $this->render('view', ['id' => $model->id,'model' => $model,'val'=>$values]);
			//print_r($values);
			 return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Topics model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Topics model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Topics the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Topics::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('feed', 'The requested page does not exist.'));
    }
}
