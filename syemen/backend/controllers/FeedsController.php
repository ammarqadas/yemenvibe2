<?php

namespace backend\controllers;

use Yii;
use common\models\Feeds;
use common\models\Res;
use yii\data\ActiveDataProvider;
use backend\components\BackendController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\FeedsHelper;


/**
 * FeedsController implements the CRUD actions for Feeds model.
 */
class FeedsController extends BackendController
{
      public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Feeds::find(),
			'pagination' => [
								'pageSize' => 40,
							],
			'sort' => [
				'defaultOrder' => [
								'failNo' => SORT_ASC,
									],
						],
		//	'orderBy'=> 'failNo'	,				
			]);
$this->storeReturnUrl();
		
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
 public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
   public function actionCreate()
    {
        $model = new Feeds();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->id]);
			$res= Res::findOne($model->resID);
			if(empty($res->domain))
			{
				$url=parse_url($model->feedurl);
				$res->domain=$url['host'];
				$res->save();
			}
			return $this->goBack();
			return $this->redirect(Yii::$app->request->referrer?Yii::$app->request->referrer:['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
  public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
          			return $this->goBack();

        }
		

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        			return $this->goBack();

    }

    /**
     * Finds the Feeds model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Feeds the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
	 
    public function findModel($id)
    {
        if (($model = Feeds::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('feed', 'The requested page does not exist.'));
    }
	
	
}
