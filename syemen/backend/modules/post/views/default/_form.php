<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use backend\modules\post\Module;
use backend\modules\post\models\Post;

/* @var $this yii\web\View */
/* @var $model zacksleo\yii2\post\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="post-form">
    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className(),[
	'clientOptions' => [
	 'lang' => 'ar',
				]
	]) ?>
    <?= $form->field($model, 'img')->widget(FileInput::className(), [
        'options' => [
            'accept' => 'image/*',
            'multiple' => false
        ],
        'pluginOptions' => [
            'initialPreview' => [
                $model->img,
            ],
            'showRemove' => true,
            'showPreview' => true,
            'initialPreviewAsData' => false,
            'initialCaption' => $model->img,
            'overwriteInitial' => false,
        ]
    ])->hint('أضف صورة للخبر'); ?>
    <div class="form-group">
        <?= Html::submitButton(Module::t('post', $model->isNewRecord ? 'Create' : 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>