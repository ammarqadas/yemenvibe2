<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Topics */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="topics-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

   
    <div class="form-group">
        <?= Html::submitButton(Yii::t('feed', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
