<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Res */

$this->title = Yii::t('feed', 'Update Res: {nameAttribute}', [
    'nameAttribute' => $model->rName,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('feed', 'Res'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rName, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('feed', 'Update');
?>
<div class="res-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
