<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$model->resID=\Yii::$app->request->get('resID', $model->resID);
$model->type=(!empty($model->type))?$model->type:2;
//\ArrayHelper::getValue(\Yii::$app->request->get, $name, $default)
?>

<div class="feeds-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'feedurl')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'cat')->dropDownList(\common\models\Topics::getTopicsList()) ?>
	  <?= $form->field($model, 'resID')->dropDownList(\common\models\Res::getResList()) ?>
	  <?= $form->field($model, 'type')->dropDownList(at(param('feedType'))) ?>
	    <?= $form->field($model, 'failNo')->textInput() ?>
    <?= $form->field($model, 'lastError')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('feed', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
