<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Feeds */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feeds-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'feedurl')->textInput(['maxlength' => true]) ?>
 
	   <?= $form->field($model, 'cat')->textInput() ?>
	<?= $form->field($model, 'interval')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('feed', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
