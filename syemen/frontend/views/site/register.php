<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sammad */
/* @var $form ActiveForm */
?>
<div class="site-register">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'apArabicName') ?>
        <?= $form->field($model, 'apEnglishName') ?>
        <?= $form->field($model, 'apSienceDept') ?>
        <?= $form->field($model, 'apGeneralSp') ?>
        <?= $form->field($model, 'apExactSp') ?>
        <?= $form->field($model, 'apEmail') ?>
        <?= $form->field($model, 'apMobile') ?>
        <?= $form->field($model, 'cardID') ?>
        <?= $form->field($model, 'resTitle') ?>
        <?= $form->field($model, 'resPlace') ?>
        <?= $form->field($model, 'resYear') ?>
        <?= $form->field($model, 'magFullName') ?>
        <?= $form->field($model, 'magCountry') ?>
        <?= $form->field($model, 'cardType') ?>
        <?= $form->field($model, 'apFaculty') ?>
        <?= $form->field($model, 'resUrl') ?>
        <?= $form->field($model, 'partName') ?>
        <?= $form->field($model, 'magDbName') ?>
        <?= $form->field($model, 'magWebsite') ?>
        <?= $form->field($model, 'partShortName') ?>
        <?= $form->field($model, 'partJob') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-register -->
