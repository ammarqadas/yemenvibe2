<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('feed', 'Res');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="res-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('feed', 'Create Res'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'rName',
            'logo:image',
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
                    'title' =>Yii::t('feed', 'disable'),
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
		 
		  [
			"attribute" =>"scrap",
			"format" =>"html",
			"value" => function ($model)
			{
				if($model->scrap==1)
					return Html::a(
                '<span class="btn btn-success  btn-xs">نشط</span>',
                ["scrap","id" => $model->id,'val'=> 0], 
                [
                    'title' => Yii::t('feed', 'disable'),
                    'data-pjax' => '0',
                ]
              );
			 else
				return Html::a(
                '<span class="btn btn-warning  btn-xs">موقف</span>',
                ["scrap","id" => $model->id,'val'=> 1], 
                [
                    'title' =>Yii::t('feed', 'enable') ,
                    'data-pjax' => '0',
                ]
               );
		 }
         ],
		 [ 'class' => 'yii\grid\ActionColumn',
    'template' => '[{addrss} | {fetch} ] {view} {update} {delete}',
    'buttons' => [
        'fetch' => function ($url,$model) {
			if($model->getFcount())
            return Html::a(
                Yii::t('feed', 'fetch logo'),
                ["fetch","id" => $model->id], 
                [
                    'title' => Yii::t('feed', 'fetch'),
                    'data-pjax' => '0',
                ]
            );
			
			},
		'addrss' => function ($url,$model) {
			
            return Html::a(
                Yii::t('feed', 'add rss'),
                ["addrss","id" => $model->id], 
                [
                    'title' => Yii::t('feed', 'add rss'),
                    'data-pjax' => '0',
                ]
            );
				},			
			],
			],

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
