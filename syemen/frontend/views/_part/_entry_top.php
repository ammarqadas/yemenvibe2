<article>
<h2><?php 
$url=itemUrl($entry['id'],$entry['slug']);
$url2=home().$url;
$turl=url(['/news-article/'.$entry['id'],],true);
$title=words($entry['title'],18);
$rName=preg_replace('/\s+/', '-', $entry['feed']['res']['rName']);
echo \yii\helpers\Html::a($title,$url)?>
</h2>
<div class="rN2">
<?php 
//$thumb=json_decode($entry['thumb']);\Yii::error('smUrl:'.$thumb->sm);
 //if (isFound($entry['enclosureUrl']))  {
if (!empty($entry['thumb']))  {
$thumb=json_decode($entry['thumb']);
?>
<img alt="اخبار اليمن الان الحدث اليوم  عاجل <?=$entry['feed']['res']['rName']?>" title=" <?=$entry['feed']['res']['rName']?> اخبار اليمن الان <?=topWords($title,5)?>" width="160" height="100" class="av" src="<?=param('defImage')?>" data-src="<?=$thumb->sm?>"/>
<?php } ;?>



<div class="inf">
<a  href="<?= Yii::$app->homeUrl."section/".$entry['feed']['topics']['slug'];?>">
<?=$entry['feed']['topics']['title']?></a>
 <a href="<?= Yii::$app->homeUrl."source/".$rName?>"><?php echo $entry['feed']['res']['rName'];?></a>
<?php if($entry['read']):?>
<span class="i-e"><?=\Yii::t('main','read',$entry['read'])?></span> 
<?php endif;?>
<?php $idate=\Yii::$app->formatter->asDatetime($entry['itemDate'], 'php:d-M h:i A');?>
<time class="i-c t " title="<?=$idate?>" datetime="seconds: <?=$entry['itemDate']?>">
 <?= \common\components\TwitterHelper::time_ago($entry['itemDate'])?>
</time>
</div>

<p>
<?=words($entry['content'],30)?> 
</p>
</div>
<div class="i0">
<span></span>
 <?=$this->render('../_part/_share',['url'=>$url2,'title'=>$title,'turl'=>$turl])?>
 </div>
</article>
