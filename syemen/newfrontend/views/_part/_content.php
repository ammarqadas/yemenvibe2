<?php
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\components\FollowWidget;
use frontend\components\FbModalWidget;
$schema =$slug="";
if(!preg_match('/https/i',$news['url']) && !$news['feed']['res']['scrap'])
{
	$schema='http';
	$slug=param('urgentSlug');
}
else
{
	$schema='https';
	$slug=param('newsSlug');
}
$url=itemUrl($news['id'],$news['slug'],$slug);
//$url1=(!empty($news['slug']))?"/article/".$news['id'].'/'.$news['slug']: "/article/".$news['id'];
$canurl=Url::toRoute($url,$schema);
$url22=home().$url;
$turl=url([$slug.'/'.$news['id'],],$schema);
$desc=getDesc($news['content'],$news['feed']['res']['rName']);
$this->title= getTitle($news['title'],$news['feed']['res']['rName'],18);
$img=$news['enclosureUrl']?:url([assets().'/image/large.jpg',],true);

//$this->registerLinkTag(['rel' => 'canonical', 'href' => $canurl]);
if(!empty($desc))
	$this->registerMetaTag(['name' => 'description', 'content' =>$desc ]);
$this->registerMetaTag(['name' => 'keywords', 'content' => keywords($news['title'])]);
$this->registerMetaTag(['property' => 'og:title', 'content' => $this->title]);
$this->registerMetaTag(['property' => 'og:url', 'content' => $canurl]);
$this->registerMetaTag(['property' => 'og:site_name', 'content' => \Yii::$app->name]);
$this->registerMetaTag(['property' => 'og:locale', 'content' => \Yii::$app->language]);
$this->registerMetaTag(['property' => 'og:type', 'content' =>'article']);
$this->registerMetaTag(['property' => 'og:image', 'content' =>$img]);
$this->registerMetaTag(['name' => 'twitter:card', 'content' =>'summary_large_image']);
$this->registerMetaTag(['name' => 'twitter:title', 'content' =>$this->title]);
$this->registerMetaTag(['name' => 'twitter:description', 'content' =>$desc]);
//$this->registerMetaTag(['name' => 'twitter:card', 'content' =>'summary_large_image']);
$this->registerMetaTag(['name' => 'twitter:image', 'content' =>$img]);
?>

<?php
$shortTitle=words($this->title,10);

$source='/source/'.preg_replace('/\s+/', '-', $news['feed']['res']['rName']);
//$this->params['breadcrumbs'][] = ['label' => 'اخبار اليمن الان', 'url' =>url('/اخبار-اليمن-الان')];
//$this->params['breadcrumbs'][] = ['label' =>$news['feed']['res']['rName'], 'url' =>$source];
//$this->params['breadcrumbs'][] =['label' =>$shortTitle, 'url' =>$canurl];


$sparam=[
			'date'=>$news['itemDate'],
			'url'=>$canurl,
			'title'=>$shortTitle,
			'img' =>$img,
			'section'=> 'اخبار اليمن الان',
			'desc' =>words($news['content'],40)
			];
		$this->render('_schema',$sparam);
?>

<header id="ih">

<div class="in">

<div class="rN">
<div id="g">
<a href="<?=Yii::$app->homeUrl?>"><img src="<?=assets()?>/logo2.svg" alt="<?=Yii::t('main', 'logo',['appName'=>Yii::$app->name])?>" /></a>

</div>
<div class="t1">
<h1><?=words($news['title'],15)?></h1>
<ul class="inf">
<li><span><?=t('read',$news['read'])?> </span>
<li>
<?php $idate=\Yii::$app->formatter->asDatetime($news['itemDate'], 'php:Y-m-d\TH:i:sO');?>
<time class="i-c" title="<?=$idate?>" datetime="seconds: <?=$news['itemDate']?>">
 <?= \common\components\TwitterHelper::time_ago($news['itemDate'])?>
</time>
<li><a href="/source/<?=preg_replace('/\s+/', '-', $news['feed']['res']['rName'])?>"><strong><?=$news['feed']['res']['rName']?></strong></a>
<li ><a title="home" href="<?= Yii::$app->homeUrl?>"><strong> عودة يمن فايب</strong></a>

</ul>

</div>

</div>

</div>



</header>

<div id="c">
<div class="in" style="padding:.5em">
	

<iframe id="frm" name="frm" style="min-height:-webkit-fill-available;min-height:-moz-available" width="100%"  src="<?=$news['url']?>">
</iframe>

</div>
</div>

