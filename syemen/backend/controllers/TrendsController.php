<?php

namespace backend\controllers;

use Yii;
use backend\components\BackendController;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Trends;


/**
 * TrendsController implements the CRUD actions for Trends model.
 */
class TrendsController extends BackendController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Trends models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Trends::find(),
        ]);
$this->storeReturnUrl();
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Trends model.
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
     * Creates a new Trends model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$model = new Trends();
		$values=Yii::$app->request->post();
		if($values)
		{
		$values['Trends']['slug']=\common\components\FeedsHelper::generateSeoURL($values['Trends']['title']);
		$values['Trends']['fromDate']= strtotime('-'.$values['Trends']['fromDate'].' days');
 //print_r($values);exit;

		}
        if ($model->load($values) && $model->save()) {
			//print_r(Yii::$app->request->post());
			//print_r($values);exit;
           // return $this->render('view', ['id' => $model->id,'model' => $model,'val'=>$values]);
			//print_r($values);
			 return $this->redirect(['view', 'id' => $model->id]);
        }


        return $this->render('create', [
            'model' => $model,
        ]);
		 }

    /**
     * Updates an existing Trends model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
		
        $model = $this->findModel($id);
	if($values=Yii::$app->request->post())
		{
			$values['Trends']['slug']=\common\components\FeedsHelper::generateSeoURL($values['Trends']['title']);;
		}
		
        if ($model->load( $values) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
	
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Trends model.
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
     * Finds the Trends model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Trends the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = Trends::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('feed', 'The requested page does not exist.'));
    }
}
