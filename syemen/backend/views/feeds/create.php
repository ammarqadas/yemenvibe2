<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Feeds */

$this->title = Yii::t('feed', 'Create Feeds');
$this->params['breadcrumbs'][] = ['label' => Yii::t('feed', 'Feeds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feeds-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
