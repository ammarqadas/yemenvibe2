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

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastDate')->textInput() ?>

    <?= $form->field($model, 'lastModefied')->textInput() ?>

    <?= $form->field($model, 'etag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ttl')->textInput() ?>

    <?= $form->field($model, 'failNo')->textInput() ?>

    <?= $form->field($model, 'lastError')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <?= $form->field($model, 'last_checked')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('feed', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
