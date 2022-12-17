<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('feed', 'Trends');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trends-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('feed', 'Create Trends'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',

            'slug',
            'fromDate',
         
            'contain',
			   'mustContain',
            //'notContain',
            //'keyWords',
            //'description',
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
            //'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
