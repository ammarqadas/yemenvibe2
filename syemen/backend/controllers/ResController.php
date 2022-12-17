<?php

namespace backend\controllers;

use Yii;
use common\models\Res;
use common\models\Feeds;
use yii\data\ActiveDataProvider;
use backend\components\BackendController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use PicoFeed\Reader\Reader;
use PicoFeed\PicoFeedException;


/**
 * ResController implements the CRUD actions for Res model.
 */
class ResController extends BackendController
{
    /**
     * @inheritdoc
     */
   

    
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Res::find(),
        ]);
		$this->storeReturnUrl();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Res model.
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
	
	
	  public function actionScrap($id,$val)
    {
		$model=$this->findModel($id);
       $model->scrap=$val;
       if($model->save())
			\Yii::$app->session->setFlash('success', 'Resource has been disabled Successfully');
		return $this->goBack();
	  
    }

    /**
     * Creates a new Res model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Res();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Res model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$this->storeReturnUrl();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
	public function actionAddrss($id)
    {
        $model = $this->findModel($id);
		$this->storeReturnUrl();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('addrss', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Res model.
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

	
	public function actionFetch($id)
	 {
		  $fmodel = Feeds::find()->where(['resID'=>$id])->one();
		  if($fmodel):
		  $reader = new Reader;
		  try{
			  
				$resource = $reader->download($fmodel->feedurl);
				if($resource->getStatusCode()==200)
				{
					$parser = $reader->getParser(
												$resource->getUrl(),
												$resource->getContent(),
												$resource->getEncoding()
											);
					$feed = $parser->execute();
					//print_r($feed);
					$model=$this->findModel($id);
					if(empty($feed->icon) && empty($feed->logo))
						\Yii::$app->session->setFlash('error', 'logo not found for this res');
					else
					{
					$model->logo = (!empty($feed->icon))?$feed->icon:$feed->logo;
					//echo "logo:".$model->logo ." sss ".$feed->logo;
					print_r($model->attributes);
					if ( $model->save()) 
						\Yii::$app->session->setFlash('success', 'Resource has been updated  Successfully');
					}
					
					
				}
		  
			} catch (PicoFeedException $e) {
				
				\Yii::$app->session->setFlash('error', $e->getMessage());
			}
			 catch (Exception $e) {
				
				\Yii::$app->session->setFlash('error', $e->getMessage());
			}
			endif;
		
		return $this->redirect(['index']);
		
	 }
    /**
     * Finds the Res model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Res the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id)
    {
        if (($model = Res::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('feed', 'The requested page does not exist.'));
    }
	
}
