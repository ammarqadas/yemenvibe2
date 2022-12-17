<article>

<h2><?php 
$url=itemUrl($entry['id'],$entry['slug']);
$url2=home().$url;
$turl=url(['news-article/'.$entry['id'],],true);
$title=words($entry['title'],18);
echo \yii\helpers\Html::a($title,$url)?>
</h2>
<div class="rN2">

<?php if (isFound($entry['enclosureUrl'])){?>
<img style="width:fill" alt="<?=words($title,8)?>" class="av" src="<?=param('defImage')?>" data-src="<?=imgUrl2($entry['enclosureUrl'],param('imgOptions'),'jpeg')?>"/>
<?php } ;?>




<div class="inf">
<a href="<?= Yii::$app->homeUrl."source/".preg_replace('/\s+/', '-', $entry['feed']['res']['rName']);?>"><strong><?php echo $entry['feed']['res']['rName'];?></strong></a>
<?php if($entry['read']):?>
<span class="i-e"><?=\Yii::t('main','read',$entry['read'])?></span> 
<?php endif;?>
<?php $idate=\Yii::$app->formatter->asDatetime($entry['itemDate'], 'php:d-M h:i A');?>
<time class="i-c t " title="<?=$idate?>" datetime="seconds: <?=$entry['itemDate']?>">
 <?= \common\components\TwitterHelper::time_ago($entry['itemDate'])?>
</time>
</div>
</div>
<div class="i0">

 <?=$this->render('../_part/_share',['url'=>$url2,'title'=>$title,'turl'=>$turl])?>
 </div>
	  
    </article>
   
