<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
$this->title = $model->feedurl;
$this->params['breadcrumbs'][] = ['label' => Yii::t('feed', 'Feeds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feeds-view">

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
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'feedurl:url',
          
            [
			"attribute" =>"cat",
			"value" => function ($model)
			{
				return \Yii::$app->params['rssCat'][$model->cat];
			},
			],
			[
			"attribute" =>"type",
			"value" => function ($model)
			{
				return at(param('feedType'))[$model->type];
			},
			],
			
			[
			"attribute" =>"resID",
			"value" => function ($model)
			{
				return \common\models\Res::getResList()[$model->resID];
			},
			],
          
            'lastChecked:datetime',
            'interval',
			[
			"attribute" =>"active",
			"value" => function ($model)
			{
				return \Yii::$app->params['activeWord'][$model->active];
			},
			],
         'lastDate:datetime',
		 'lastModified:datetime',
		 'created_at:datetime',
		 'failNo',
		 'lastError',
		
        ],
    ]) ?>

</div>
