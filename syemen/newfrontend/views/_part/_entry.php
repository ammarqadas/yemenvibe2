<article>
<h3><?php 
$url=itemUrl($entry['id'],$entry['slug']);
$url2=home().$url;
$turl=url(['/news-article/'.$entry['id'],],true);
$title=words($entry['title'],18);
echo \yii\helpers\Html::a($title,$url)?>
</h3>
<div class="i0">
<div class="inf">
<a href="<?= Yii::$app->homeUrl."section/".$entry['feed']['topics']['slug'];?>"><strong><?=$entry['feed']['topics']['title']?></strong></a>
<a href="<?= Yii::$app->homeUrl."source/".preg_replace('/\s+/', '-', $entry['feed']['res']['rName']);?>"><strong><?php echo $entry['feed']['res']['rName'];?></strong></a>
<?php if($entry['read']):?>
<span class="i-e"><?=\Yii::t('main','read',$entry['read'])?></span> 
<?php endif;?>
</div>
<?php $idate=\Yii::$app->formatter->asDatetime($entry['itemDate'], 'php:d-M h:i A');?>
<time class="i-c t " title="<?=$idate?>" datetime="seconds: <?=$entry['itemDate']?>">
 <?= \common\components\TwitterHelper::time_ago($entry['itemDate'])?>
</time>
</div>
<?php if (isFound($entry['enclosureUrl'])){?>
<div class ="rN2">
<img alt="<?=words($title,8)?>" class="av" src="<?=param('defImage')?>" data-src="<?=imgUrl2($entry['enclosureUrl'],param('imgOptions'),'jpeg')?>"/>
<p>
<?=words($entry['content'],30)?> 
</p>
</div>
<?php }else{?>
<p><?=words($entry['content'],25)?></p>
<?php } ;?>
<div class="i0">
<span></span>
 <?=$this->render('../_part/_share',['url'=>$url2,'title'=>$title,'turl'=>$turl])?>
 </div>
</article>
