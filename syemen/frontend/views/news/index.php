<?php
use yii\helpers\Html;
use frontend\components\FollowWidget;
use frontend\components\FbModalWidget;

$url1=(!empty($news['slug']))?"/news/".$news['id'].'-'.$news['slug']: "/news".$news['id'];
$url=url([$url1.'.html',],'https');
//$image=url(['/news'.$news['id'].'.html',],true);
$this->title=words($news['title']);
$img=$news['enclosureUrl']?:url([assets().'/image/large.jpg',],true);
$this->registerLinkTag(['rel' => 'canonical', 'href' => $url]);
$this->registerMetaTag(['name' => 'description', 'content' => words($news['content'],50)]);
//$this->registerMetaTag(['name' => 'keywords', 'content' => keywords($news['title'])]);
$this->registerMetaTag(['property' => 'og:title', 'content' => $this->title]);
$this->registerMetaTag(['property' => 'og:url', 'content' => $url]);
$this->registerMetaTag(['property' => 'og:site_name', 'content' => \Yii::$app->name]);
$this->registerMetaTag(['property' => 'og:locale', 'content' => \Yii::$app->language]);
$this->registerMetaTag(['property' => 'og:type', 'content' =>'article']);
$this->registerMetaTag(['property' => 'og:image', 'content' =>$img]);
$this->registerMetaTag(['name' => 'twitter:card', 'content' =>'summary']);
$this->registerMetaTag(['name' => 'twitter:image', 'content' =>$img]);
?>

<header id="ih">
<div class="in">
<div class="rN">
<div id="g">
<a href="<?=Yii::$app->homeUrl?>"><img src="<?=assets()?>/image/logo2.svg" alt="<?=Yii::t('main', 'logo',['appName'=>Yii::$app->name])?>" /></a>

</div>
<div class="t1">
<h1><?=words($news['title'],16)?></h1>

<ul class="inf">


<li>
<a href="<?= "/website/".$news['feed']['res']['domain'];?>"><strong><?php echo $news['feed']['res']['rName'];?></strong></a>

<li>
<?=t('read',$news['read'])?> 
<li>

<i class="i-c" aria-hidden="true"></i>
<?php $idate=\Yii::$app->formatter->asDatetime($news['itemDate'], 'php:Y-m-d\TH:i:sO');?>
<time title="<?=$idate?>" datetime="seconds: <?=$news['itemDate']?>">
 <?= \common\components\TwitterHelper::time_ago($news['itemDate'])?>
</time>

</ul></div>
</div>
<ul id="b">
<li><a title="home" href="<?= Yii::$app->homeUrl?>"> الرئيسية</a>
<li><a title="mostNews" href="<?= Yii::$app->homeUrl?>yemen/topnews.html"> أهم الأخبار</a>
<li><a href="<?=$news['url']?>"><span class="close">إخفاء^</span></a>
</ul>

</div></header>
<div id="c">
<div class="in" style="padding:.5em">
	

<iframe id="frm" name="frm" style="min-height:-webkit-fill-available;min-height:-moz-available" width="100%"  src="<?=$news['url']?>">
</iframe>
<?=FbModalWidget::widget(['title'=>$this->title,'url'=>$url])?>
</div>
</div>
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