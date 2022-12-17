<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Res */
/* @var $form yii\widgets\ActiveForm begin(['layout' => 'horizontal']);?>*/
?>

<div class="res-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
<h2><?=$model->rName?></h2>
   
  
	
	
<?= \yii\grid\GridView::widget([
'dataProvider' => new \yii\data\ActiveDataProvider([
'query' => $model->getFeeds(),
'pagination' => false
]),
'columns' => [
				'feedurl:url',
				[
					"attribute" =>"cat",
					"value" => function ($model)
					{
					return \common\models\Topics::getTopicsList()[$model->cat];

					},
				],
				[
						"attribute" =>"active",
						"format" =>"html",
						"value" => function ($model)
						{
							if($model->active==1)
								return Html::a(
							'<span class="btn btn-success  btn-xs">نشط</span>',
							["feeds/disable","id" => $model->id], 
							[
								'title' => 'disable',
								'data-pjax' => '0',
							]
						  );
						 else
							return Html::a(
							'<span class="btn btn-warning  btn-xs">موقف</span>',
							[ "feeds/enable","id" => $model->id], 
							[
								'title' =>Yii::t('feed', 'enable') ,
								'data-pjax' => '0',
							]
						   );
					 }
				],
				[
					'class' => \yii\grid\ActionColumn::className(),
					'controller' => 'feeds',
					'template' => '{update}{delete}',
					'header' => Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;'.Yii::t('feed', 'Add New'), ['feeds/create','resID'=>$model->id]),
				]
			 ]
]);?>
	

    <div class="form-group">
        <?= Html::submitButton(Yii::t('feed', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
