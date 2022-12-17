<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Trends */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trends-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>


    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

   

    <?= $form->field($model, 'mustContain')->textarea(['rows'=>5,'cols'=>40,'maxlength' => true]) ?>

    <?= $form->field($model, 'contain')->textarea(['rows'=>5,'cols'=>40,'maxlength' => true]) ?>

    <?= $form->field($model, 'notContain')->textarea(['rows'=>5,'cols'=>40,'maxlength' => true])?>

   
    <?= $form->field($model, 'description')->textarea(['rows'=>5,'cols'=>40,'maxlength' => true]) ?>

	  <?=
		  $form->field($model, 'fromDate')->dropDownList(at(param('trendBeforeDate'))) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('feed', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
