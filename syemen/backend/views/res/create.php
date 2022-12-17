<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Res */

$this->title = Yii::t('feed', 'Create Res');
$this->params['breadcrumbs'][] = ['label' => Yii::t('feed', 'Res'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="res-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
