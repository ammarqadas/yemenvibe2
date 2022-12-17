<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Feeds */

$this->title = $model->title;
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
            'feedurl',
            'cat',
            'interval',
            'title',
            'description',
            'logo',
            'lastDate',
            'lastModefied',
            'etag',
            'ttl',
            'failNo',
            'lastError',
            'active',
            'last_checked',
            'created_at',
        ],
    ]) ?>

</div>
