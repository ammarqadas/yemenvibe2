<article>
<?php 
$url=itemUrl($entry['id'],$entry['slug']);
//$url2=url(['/yemen-news/'.$entry['id'],],true);
$url2=home().$url;
$title=words($entry['title'],18);
$turl=url(['news-article/'.$entry['id'],],true);
$img=(isFound($entry['enclosureUrl']))?$entry['enclosureUrl']:url(assets().'/image/large.jpg',true);
$img=imgUrl2($img,param('imgOptions_h'),'jpeg');
?>
<img alt="<?=words($title,8)?>" class="av" src="<?=param('defImage')?>" data-src="<?=$img?>"/>
<h3>
<?php 
echo \yii\helpers\Html::a($title,$url)?>

</h3>
<div class="inf">
<a href="<?= Yii::$app->homeUrl."source/".preg_replace('/\s+/', '-', $entry['feed']['res']['rName']);?>"><strong><?php echo $entry['feed']['res']['rName'];?></strong></a>
<?php if($entry['read']):?>
|<span><?=\Yii::t('main','read',$entry['read'])?></span> 
<?php endif;?>
<?php $idate=\Yii::$app->formatter->asDatetime($entry['itemDate'],'php:d-M h:i A');?>
|<time  title="<?=$idate?>" datetime="seconds: <?=$entry['itemDate']?>">
 <?= \common\components\TwitterHelper::time_ago($entry['itemDate'])?>
</time>
</div>



<p><?=words($entry['content'],20)?></p>
</article>
   
