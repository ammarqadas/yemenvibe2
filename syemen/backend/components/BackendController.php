<?php

namespace backend\components;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;


class BackendController extends \yii\web\Controller
{
	
	
	
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
									'actions' => ['logout', 'index','create','enable','disable','view','update','addrss','scrap'],
									'allow' => true,
									'roles' => ['@'],
									'matchCallback' => function ($rule, $action) {
										return \Yii::$app->user->identity->isUserAdmin;
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
	
	public function actions()
	{
		return [
				'enable' => 'backend\components\EnableAction' ,
				'disable' => 'backend\components\DisableAction' ,
				
			   ];
	}
	
	/*public function behaviors()
    {
    return [
       'access' => [
           'class' => AccessControl::className(),
           'only' => ['index', 'login', 'logout'],
           'rules' => [
               [
                   'actions' => ['signup'],
                   'allow' => true,
                   'roles' => ['?'],
               ],
               [
                   'actions' => ['index'],
                   'allow' => true,
                   'roles' => ['@'],
               ],
               [
                   'actions' => ['about'],
                   'allow' => true,
                   'roles' => ['@'],
                   'matchCallback' => function ($rule, $action) {
                       return User::isUserAdmin(Yii::$app->user->identity->username);
                   }
               ],
           ],
       ],
       'verbs' => [
           'class' => VerbFilter::className(),
           'actions' => [
               'logout' => ['post'],
           ],
       ],
   ];
}


*/

static function storeReturnUrl()
	{
		\Yii::$app->user->returnUrl = \Yii::$app->request->url;
	}
public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

	
	
}


 