<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Res */

$this->title = Yii::t('feed', 'Add Rss: {nameAttribute}', [
    'nameAttribute' => $model->rName,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('feed', 'Res'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rName, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('feed', 'add rss');
?>
<div class="res-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_addrssform', [
        'model' => $model,
    ]) ?>

</div>
