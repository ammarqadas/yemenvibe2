<article>


<p><?php // $url=(!empty($entry['slug']))?"news/".$entry['id'].'-'.$entry['slug']: "news".$entry['id'];
//$url= "article/".$entry['id'];
$url=itemUrl($entry['id'],$entry['slug']);

$title=words($entry['title'],18);
echo \yii\helpers\Html::a($title,$url)?>
</p>

<div class="inf">
<?php if($entry['read']):?>
<span aria-hidden="true" class="i-e"><?=\Yii::t('main','read',$entry['read'])?></span> 
<?php endif;?>
<?php $idate=\Yii::$app->formatter->asDatetime($entry['itemDate'], 'php:d-M h:i A');?>
<time class="i-c t " title="<?=$idate?>" datetime="seconds: <?=$entry['itemDate']?>">
 <?= \common\components\TwitterHelper::time_ago($entry['itemDate'])?>
</time>
</div>


	  
    </article>
   
