<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Res */

$this->title = $model->rName;
$this->params['breadcrumbs'][] = ['label' => Yii::t('feed', 'Res'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="res-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('feed', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('feed', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('feed', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
		 <?= Html::a(t('add rss'), ['addrss', 'id' => $model->id], ['class' => 'btn btn-success']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
       
            'rName',
            'logo:image',
			[
			"attribute" =>"trend",
			"value" => function ($model)
			{
				return at(param('resTrend'))[$model->trend];
			},
			],
            [
			"attribute" =>"active",
			"value" => function ($model)
			{
				return \Yii::$app->params['activeWord'][$model->active];
			},
			],
        ],
    ]) ?>
<h3>روابط أر اس اس</h3>

<?= \yii\grid\GridView::widget([
'dataProvider' => new \yii\data\ActiveDataProvider([
'query' => $model->getFeeds(),
'pagination' => false
]),
'columns' => [
	'id',
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
								return '<span class="btn btn-success  btn-xs">نشط</span>';
								else
								'<span class="btn btn-warning  btn-xs">موقف</span>';
						}
				],

				'failNo',
				'lastError',
			'lastChecked:datetime',
			 ]
]);?>
	
</div>
