<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use zacksleo\yii2\post\models\Post;
use zacksleo\yii2\post\Module;

/* @var $this yii\web\View */
/* @var $model \zacksleo\yii2\post\models\Post */
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Module::t('post', 'posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">
    <p>
        <?= Html::a(Module::t('post', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Module::t('post', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'هل تريد حذف الخبر?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'content:raw',
            [
                'label' => 'صورة',
                'format' => [
                    "image",
                    [
                        "width" => "84",
                        "height" => "84",
                    ]
                ],
                'value' => function ($model) {
                    return $model->getImgUrl();
                }
            ],
            'views',
          /*  'order',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return Post::getStatusList()[$model->status];
                }
            ],*/
            'created_at:date',
            'updated_at:date'
        ],
    ]) ?>
</div>