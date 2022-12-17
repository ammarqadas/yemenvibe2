<article>
<?php $title=words($entry['title'],18);?>
<?php if (!empty($entry['enclosureUrl'])){?>
<img  alt="<?=words($title,8)?>" class="av" src="<?=param('defImage')?>" data-src="<?=imgUrl2($entry['enclosureUrl'],param('imgOptions_side'),param('imgExt'))?>"/>

<?php }?>
<h3><?php 
//$url=(!empty($entry['slug']))?"news/".$entry['id'].'-'.$entry['slug']: "news".$entry['id'];
//$url= "article/".$entry['id'];
$url=itemUrl($entry['id'],$entry['slug']);

echo \yii\helpers\Html::a($title,$url,['target' => '_blank'])?>
</h3>


<div class="i0">
<div class="inf">
<a title="<?=$entry['feed']['res']['rName']?>" href="<?= Yii::$app->homeUrl."source/".preg_replace('/\s+/', '-', $entry['feed']['res']['rName']);?>"><strong rel="author"><?php echo $entry['feed']['res']['rName'];?></strong></a>

<?if($entry['read']):?>
<span class="i-e"><?=\Yii::t('main','read',$entry['read'])?></span>

<?endif;?>
</div>
<?php $idate=\Yii::$app->formatter->asDatetime($entry['itemDate'], 'php:d-M h:i A');?>
<time class="i-c t" title="<?=$idate?>" datetime="seconds: <?=$entry['itemDate']?>">
 <?= \common\components\TwitterHelper::time_ago($entry['itemDate'])?>
</time>

</div>
</article>
   
