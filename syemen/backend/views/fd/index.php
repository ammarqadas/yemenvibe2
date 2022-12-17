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

            'id',
            'feedurl',
            'cat',
            'interval',
            'title',
            //'description',
            //'logo',
            //'lastDate',
            //'lastModefied',
            //'etag',
            //'ttl',
            //'failNo',
            //'lastError',
            //'active',
            //'last_checked',
            //'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
