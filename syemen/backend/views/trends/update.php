<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Trends */

$this->title = Yii::t('feed', 'Update Trends: {nameAttribute}', [
    'nameAttribute' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('feed', 'Trends'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('feed', 'Update');
?>
<div class="trends-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form2', [
        'model' => $model,
    ]) ?>

</div>
