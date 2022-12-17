<article>

<h3><?php // $url=(!empty($entry['slug']))?"news/".$entry['id'].'-'.$entry['slug']: "news".$entry['id'];
//$url= "article/".$entry['id'];
$url=itemUrl($entry['id'],$entry['slug']);

$title=words($entry['title'],18);
echo \yii\helpers\Html::a($title,$url,['target' => '_blank'])?>
</h3>
<div class="i0">
<ul class="inf">


<li>
<a href="/section/<?=$entry['feed']['topics']['slug'];?>"><strong><?=$entry['feed']['topics']['title']?></strong></a>
</li>
<li>
<a href="/source/<?= preg_replace('/\s+/', '-', $entry['feed']['res']['rName'])?>"><strong><?php echo $entry['feed']['res']['rName'];?></strong></a>
</li>
<?php if($entry['read']):?>
<li>
<i class="i-e"></i>
<span class="cnt"><?=\Yii::t('main','read',$entry['read'])?> </span>

</li><?php endif;?>
</ul>
<div class="t">
<i class="i-c" aria-hidden="true"></i>
<?php $idate=\Yii::$app->formatter->asDatetime($entry['itemDate'], 'php:d-M h:i A');?>
<time title="<?=$idate?>" datetime="seconds: <?=$entry['itemDate']?>">
 <?= \common\components\TwitterHelper::time_ago($entry['itemDate'])?>
</time>
</div>

	  
    </article>
   
