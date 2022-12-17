<article>
<h3><?php 
$url=itemUrl($entry['id'],$entry['slug']);
$url2=home().$url;
$title=words($entry['title'],18);
$turl=url(['news-article/'.$entry['id'],]);
echo \yii\helpers\Html::a($title,$url,['target' => '_blank'])?>
</h3>
<div class="i0">
<ul class="inf">
<li>
<a href="<?= Yii::$app->homeUrl."section/".$entry['feed']['topics']['slug'];?>"><strong><?=$entry['feed']['topics']['title']?></strong></a>
</li>
<li>
<a href="<?= Yii::$app->homeUrl."source/".preg_replace('/\s+/', '-', $entry['feed']['res']['rName']);?>"><strong rel="author"><?php echo $entry['feed']['res']['rName'];?></strong></a>
</li>
<?php if($entry['read']):?>
<li>
<span class="i-e"></span><span class="cnt"><?=\Yii::t('main','read',$entry['read'])?></span> 
</li>
<?php endif;?>
</ul>
<div class="t">
 <i class="i-c" aria-hidden="true"></i>
<?php $idate=\Yii::$app->formatter->asDatetime($entry['itemDate'], 'php:d-M h:i A');?>
<time title="<?=$idate?>" datetime="seconds: <?=$entry['itemDate']?>">
 <?= \common\components\TwitterHelper::time_ago($entry['itemDate'])?>
</time>
</div>
</div>
<?php if (!empty($entry['enclosureUrl'])){?>
<div class ="rN2">
<img alt="<?=words($title,8)?>" class="av" src="<?=param('defImage')?>" data-src="<?=imgUrl2($entry['enclosureUrl'],param('imgOptions'),'jpeg')?>"/>
<p>
<?=words($entry['content'],30)?> </p>
</div>
<?php }else{?>
<p><?=words($entry['content'],25)?></p>
<?php } ;?>
<div class="i0">
<div class="cnts">
</div>
 <?=$this->render('_share',['url'=>$url2,'title'=>$title,'turl'=>$turl])?>
 </div>
</article>
