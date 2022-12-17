<?php

namespace backend\modules\post\controllers;

use Yii;
use backend\modules\post\models\Post;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * PostController implements the CRUD actions for Post model.
 */
class DefaultController extends Controller
{
    /**
     * Lists all Post models.
     * @return mixed
     */
	 
	 
	 public function behaviors()
    {
        return [
				'access' => [
                'class' => AccessControl::className(),

                'rules' => [
								[
									'actions' => ['login', 'error'],
									'allow' => true,
								],
								[
									'actions' => ['logout', 'index'],
									'allow' => false,
									'roles' => ['?'],
								],
								[
									'actions' => ['logout', 'index','create','status','view','update','delete'],
									'allow' => true,
									'roles' => ['@'],
									'matchCallback' => function ($rule, $action) {
										return \Yii::$app->user->identity->isUserEditor;
										}
								
								],
							],
					],
					'verbs' => [
									'class' => VerbFilter::className(),
									'actions' => [
									'delete' => ['POST'],
									],
								],
				];
	}
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find(),
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC
                ]
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();
        $model->setScenario('insert');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->setScenario('update');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    /**
     * @brief 修改文章状态1显示：0不显示
     * @param $id
     * @param $status
     * @return
     */
    public function actionStatus($id, $status)
    {
        $model = $this->findModel($id);
        $model->status = $status;
        $model->save();
        if ($model !== false) {
            $message = ['status' => 1, 'message' => "تم التنشيط بنجاح"];
        } else {
            $message = ['status' => 0, 'message' => "تم التعطيل بنجاح"];
        }
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $message;
    }
}
