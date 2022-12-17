<article>

<?php // $url=(!empty($entry['slug']))?"news/".$entry['id'].'-'.$entry['slug']: "news".$entry['id'];
//$url= "article/".$entry['id'];
$url=itemUrl($entry['id'],$entry['slug']);
$title=words($entry['title'],15);
echo \yii\helpers\Html::a($title,$url)?>

<div class="inf">
 <a rel="nofollow" href="<?= Yii::$app->homeUrl."source/".preg_replace('/\s+/', '-', $entry['feed']['res']['rName']);?>"><?php echo $entry['feed']['res']['rName'];?></a>
<?php $idate=\Yii::$app->formatter->asDatetime($entry['itemDate'], 'php:d-M h:i A');?>
<time class="i-c t" title="<?=$idate?>" datetime="seconds: <?=$entry['itemDate']?>">
 <?= \common\components\TwitterHelper::time_ago($entry['itemDate'])?>
</time>
<?php if($entry['read']):?>
  <span class="i-e"><?=\Yii::t('main','read',$entry['read'])?></span>

<?php endif;?>
</div>


</article>
   
