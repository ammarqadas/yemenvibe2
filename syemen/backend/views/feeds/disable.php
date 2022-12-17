<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TwitterUser */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'المصادر', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="twitter-user-view">

    

    <p>
     <h1><?= Html::encode($this->title) ?></h1>  <?=Yii::t('feed', 'account disabled')?>
    </p>
</div>
