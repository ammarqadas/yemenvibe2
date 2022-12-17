<article>
	<h3><?php 
	//$url=(!empty($entry['slug']))?"news/".$entry['id'].'-'.$entry['slug']: "news".$entry['id'];
$url=itemUrl($entry['id'],$entry['slug']);

$title=words($entry['title'],15);
echo \yii\helpers\Html::a($title,$url)?>

</h3>
<div class="inf">
<strong>اخبار اليمن الان</strong>
<?php $idate=\Yii::$app->formatter->asDatetime($entry['itemDate'], 'php:d-M h:i A');?>
<time class="i-c t " title="<?=$idate?>" datetime="seconds: <?=$entry['itemDate']?>">
 <?= \common\components\TwitterHelper::time_ago($entry['itemDate'])?>
</time>

<?endif;?>
</div>
</article>
   
