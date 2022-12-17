<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Res */
/* @var $form yii\widgets\ActiveForm begin(['layout' => 'horizontal']);?>*/
?>

<div class="res-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'rName')->textInput(['maxlength' => true]) ?>
	  <?= $form->field($model, 'trend')->dropDownList(at(param('resTrend'))) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('feed', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
