<?php
namespace frontend\components;
use common\components\Mobile_Detect;
use yii\base\Theme;
class VibeController extends \yii\web\Controller
{


	 public function init()
		{
			parent::init();
		//	$detect = new Mobile_Detect();
			//if($detect->isMobile())
		/*if (\Yii::$app->request->get('themed')) 

			{
			   \Yii::$app->getView()->theme = new Theme([
             //  'basePath' => '@app/themes/mobile',
            //   'baseUrl' => '@frontend/themes/mobile',
               'pathMap' => [
                 '@app/views' => '@app/themes/mobile',
                   ],
                ]);
			}
			*/
		}
 }
