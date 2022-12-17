<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Topics */

$this->title = Yii::t('feed', 'Update Topics: {nameAttribute}', [
    'nameAttribute' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('feed', 'Topics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('feed', 'Update');
?>
<div class="topics-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
