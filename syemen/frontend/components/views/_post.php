<article>

<?php
$url=Yii::$app->homeUrl."post/".$entry['id'];
$url=itemUrl($entry['id'],$entry['slug'],'post');

$title=words($entry['title'],20);
?>
<?php if (!empty($entry['img'])){?>
<img  alt="<?=words($title,8)?>" class="av" src="<?=param('defImage')?>" data-src="<?=imgUrl2(url(param('upload_dir').$entry['img'],true),param('imgOptions_side'),param('imgExt'))?>"/>
<?php }?>
<h3><?php 
 echo \yii\helpers\Html::a($title,$url,['target' => '_blank'])?></h3>


<div class="i0">
<div class="inf">
<?if($entry['views']):?>

<i class="i-e"></i>
<span class="cnt"><?=\Yii::t('main','read',$entry['views'])?> </span>

<?endif;?>
</div>
<div class="t">
<i class="i-c" aria-hidden="true"></i>
<?php $idate=\Yii::$app->formatter->asDatetime($entry['created_at'], 'php:d-M h:i A');?>
<time title="<?=$idate?>" datetime="seconds: <?=$entry['created_at']?>">
 <?= \common\components\TwitterHelper::time_ago($entry['created_at'])?>

</time>
</div>  

</article>
   
