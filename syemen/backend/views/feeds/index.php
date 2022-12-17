<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('feed', 'Feeds');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feeds-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('feed', 'Create Feeds'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'feedurl:url',
			[
			"attribute" =>"cat",
			"value" => function ($model)
			{
				return \common\models\Topics::getTopicsList()[$model->cat];//\Yii::$app->params['rssCat'][$model->cat];
			},
			],
			 
		//	 'logo:image',
			//	'title',
            //'interval',
			'failNo',
			'lastError',
            //'desc',
           
            //'lastDate',
            //'lastModefied',
            //'etag',
            //'active',
             'lastChecked:datetime',
            //'created_at',
			[
			"attribute" =>"active",
			"format" =>"html",
			"value" => function ($model)
			{
				if($model->active==1)
					return Html::a(
                '<span class="btn btn-success  btn-xs">نشط</span>',
                ["disable","id" => $model->id], 
                [
                    'title' => 'disable',
                    'data-pjax' => '0',
                ]
              );
			 else
				return Html::a(
                '<span class="btn btn-warning  btn-xs">موقف</span>',
                [ "enable","id" => $model->id], 
                [
                    'title' =>Yii::t('feed', 'enable') ,
                    'data-pjax' => '0',
                ]
               );
			}
         ],

           ['class' => 'yii\grid\ActionColumn'],
			
			/* [ 'class' => 'yii\grid\ActionColumn',
    'template' => '{fetch} {view} {update} {delete}',
    'buttons' => [
        'fetch' => function ($url,$model) {
            return Html::a(
                '<span class="glyphicon glyphicon-arrow-down"></span>',
                ["fetch","id" => $model->id], 
                [
                    'title' => Yii::t('feed', 'fetch'),
                    'data-pjax' => '0',
                ]
            );
        },
    ],],*/
			
        ],

    ]); ?>
</div>
