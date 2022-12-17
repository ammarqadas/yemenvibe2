<?php

use yii\helpers\Html;
use frontend\components\FollowWidget;
use frontend\components\FbModalWidget;

$url=url(['/news'.$news['id'].'.html',],'https');
//$image=url(['/news'.$news['id'].'.html',],true);
$url1=(!empty($news['slug']))?"/news/".$news['id'].'-'.$news['slug']: "/news".$news['id'];
$url=url([$url1.'.html',],'https');
$this->title=words($news['title']);
$img=$news['enclosureUrl']?:url([assets().'/image/large.jpg',],true);
$this->registerLinkTag(['rel' => 'canonical', 'href' => $url]);
$this->registerMetaTag(['name' => 'description', 'content' => words($news['content'],50)]);
$this->registerMetaTag(['property' => 'og:title', 'content' => $this->title]);
$this->registerMetaTag(['property' => 'og:url', 'content' => $url]);
$this->registerMetaTag(['property' => 'og:site_name', 'content' => \Yii::$app->name]);
$this->registerMetaTag(['property' => 'og:locale', 'content' => \Yii::$app->language]);
$this->registerMetaTag(['property' => 'og:type', 'content' =>'article']);
$this->registerMetaTag(['property' => 'og:image', 'content' =>$img]);
$this->registerMetaTag(['name' => 'twitter:card', 'content' =>'summary']);
$this->registerMetaTag(['name' => 'twitter:image', 'content' =>$img]);
?>

       
<main style="padding:1em">
<header>
<h1><?=$news['title']?></h1>

<div class="i0">

<ul class="inf">
<li>
<a href="<?= "/website/".$news['feed']['res']['domain'];?>"><strong><?php echo $news['feed']['res']['rName'];?></strong></a>

<?if($news['read']):?>
<li>
<span class="i-e"></span><span class="cnt"><?=\Yii::t('main','read',$news['read'])?></span> 
<?php endif;?>
<li>

<i class="i-c" aria-hidden="true"></i>
<?php $idate=\Yii::$app->formatter->asDatetime($news['itemDate'], 'php:d-M h:i A');?>
<time title="<?=$idate?>" datetime="seconds: <?=$news['itemDate']?>">
 <?= \common\components\TwitterHelper::time_ago($news['itemDate'])?>
</time>

</ul>



</div>
</header>

	<content>
	<div class="cent">
	
	<img  alt="<?=$this->title?>" class="defimg" src="<?=param('defImage')?>" data-src="<?=$img?>"/>
	

	</div>
	
	<?php echo (!empty($news['body']))?$news['body']:$news['content'];?>
	<br>
	<div><h3>
	 قراءة الخبر من <?= $news['feed']['res']['rName'] ?> <a href="<?=$news['url']?>">اضغط هنا </a>
	</h3></div>
	
		
		
		<div class="cent">
		<?=$this->render('../_part/_social',['title'=>$news['title'],'url'=>$url])?>

		</div>

	
		
	</content>
</main>

<script type="application/ld+json">
//<![CDATA[
{
"@context": "http://schema.org",
"@type": "NewsArticle",
"url" :"<?=$url?>",
"mainEntityOfPage":"<?=$news['url']?>",

"headline": "<?=$this->title?>",
"author": "<?=$news['feed']['res']['rName']?>",
"datePublished": "<?=date('c', $news['itemDate'])?>",
"dateModified": "<?=date('c', $news['itemDate'])?>",

"image": {
"@type": "imageObject",
"url": "<?=$img?>",
"height": "400",
"width": "300"
},
"publisher": {
"@type": "Organization",
"name": "<?=\Yii::$app->name?>",
"logo": {
"@type": "imageObject",
"url": "https://yemenvibe.com/static/image/logo.png"
}
}
}
//]]>
</script>

<?=$this->render('../_part/_aside2')?>

 