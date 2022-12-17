<article>


<h3><?php // $url=(!empty($entry['slug']))?"news/".$entry['id'].'-'.$entry['slug']: "news".$entry['id'];
//$url= "article/".$entry['id'];
$url=itemUrl($entry['id'],$entry['slug']);

$title=words($entry['title'],18);
echo \yii\helpers\Html::a($title,$url)?>
</h3>
<div class="i0">

<div class="inf">
<a href="<?= Yii::$app->homeUrl."section/".$entry['feed']['topics']['slug'];?>"><strong><?=$entry['feed']['topics']['title']?></strong></a>
<?php if($entry['read']):?>
<span class="i-e"><?=\Yii::t('main','read',$entry['read'])?></span> 
<?php endif;?>
</div>
<?php $idate=\Yii::$app->formatter->asDatetime($entry['itemDate'], 'php:d-M h:i A');?>
<time class="i-c t " title="<?=$idate?>" datetime="seconds: <?=$entry['itemDate']?>">
 <?= \common\components\TwitterHelper::time_ago($entry['itemDate'])?>
</time>
</div>

	  
    </article>
   
