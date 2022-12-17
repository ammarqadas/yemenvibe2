<?php

use yii\helpers\Html;
use frontend\components\FollowWidget;
use frontend\components\FbModalWidget;

$url=url(['/news'.$news['id'].'.html',],'https');
//$image=url(['/news'.$news['id'].'.html',],true);
$this->title=words($news['title']);
$img=$news['enclosureUrl']?:assets().'/image/large.png';
$this->registerLinkTag(['rel' => 'canonical', 'href' => $url]);
$this->registerMetaTag(['name' => 'description', 'content' => words($news['content'],50)]);
$this->registerMetaTag(['name' => 'keywords', 'content' => keywords($news['title'])]);
$this->registerMetaTag(['property' => 'og:title', 'content' => $this->title]);
$this->registerMetaTag(['property' => 'og:url', 'content' => $url]);
$this->registerMetaTag(['property' => 'og:site_name', 'content' => \Yii::$app->name]);
$this->registerMetaTag(['property' => 'og:locale', 'content' => \Yii::$app->language]);
$this->registerMetaTag(['property' => 'og:type', 'content' =>'article']);
$this->registerMetaTag(['property' => 'og:image', 'content' =>$img]);
$this->registerMetaTag(['name' => 'twitter:card', 'content' =>'summary']);
$this->registerMetaTag(['name' => 'twitter:image', 'content' =>$img]);
?>
<main>

	<section>
		<h1><?=$this->title?></h1>
		<ul class="inf">


<li>
<a href="<?= "/website/".$news['feed']['res']['domain'];?>"><strong><?php echo $news['feed']['res']['rName'];?></strong></a>

<li>
<?=t('read',$news['read'])?> 
<li>

<i class="i-c" aria-hidden="true"></i>
<?php $idate=\Yii::$app->formatter->asDatetime($news['itemDate'], 'php:d-M h:i A');?>
<time title="<?=$idate?>">
 <?= \common\components\TwitterHelper::time_ago($news['itemDate'])?>
</time>

</ul>
<p>
<?=$news['content'];?>
<div>
<a href="<?=$news['url']?>">رابط الخبر </a>
</div>

	</section>
</main>
<?=$this->render('../_part/_aside2')?>



