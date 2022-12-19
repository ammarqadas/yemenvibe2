<?php
use yii\helpers\Html;
use frontend\components\FollowWidget;
use frontend\components\FbModalWidget;
use frontend\components\YemenWidget;
use nirvana\jsonld\JsonLDHelper;
$url=itemUrl($news['id'],$news['slug']);
$canurl=url([$url,],'https');
$turl=url(['news-article/'.$news['id'],],'https');
$url22=home().$url;
$cont=!empty($news['body'])?$news['body']:$news['content'];
$this->title= getTitle($news['title'],$news['feed']['res']['rName'],12);
$desc=topWords($news['title'],5).' '.getDesc($cont,$news['feed']['res']['rName'],27);
if($news['thumb'])
{
	$thumb=json_decode($news['thumb']);
		//\Yii::error('slug:'.$news['slug']);
	   // \Yii::error('thumb:'.$news['thumb'].' thumb22:');
	$img=$thumb->md;
}
	else $img=url(assets().'/image/large.jpg',true);
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
$this->registerMetaTag(['name' => 'twitter:image', 'content' =>$img]);

// if(strtotime('-4 months')>$news['itemDate'])
// {
// $this->registerMetaTag(['name' => 'googlebot', 'content' =>'noindex']);
// $this->registerMetaTag(['name' => 'robots', 'content' =>'noindex']);
// }
$this->registerMetaTag(['name' => 'GOOGLEBOT', 'content' =>"unavailable_after: ".\Yii::$app->formatter->asDatetime(strtotime('+4 months', $news['itemDate']), 'php:d-M-y h:i:s T')]);?>

<main style="padding:1em">

<header>
<h1><?=$news['title']?></h1>

<div class="i0">

<i  class="i-e"><?=t('read',$news['read'])?></i>
<div class="t">
<i class="i-c"></i>
<?php $idate=\Yii::$app->formatter->asDatetime($news['itemDate'], 'php:d-M h:i A');?>
<time title="<?=$idate?>" datetime="seconds: <?=$news['itemDate']?>">
 <?= \common\components\TwitterHelper::time_ago($news['itemDate'])?>
</time>
</div>
</div>

<?php
//$shortTitle= getTitle($news['title'],$news['feed']['res']['rName'],15);
$source='/source/'.preg_replace('/\s+/', '-', $news['feed']['res']['rName']);
$this->params['breadcrumbs'][] = ['label' => 'اخبار اليمن الان', 'url' =>url('/اخبار-اليمن-الان')];
$this->params['breadcrumbs'][] =['label' =>$news['slug'], 'url' =>$canurl];
//$this->params['breadcrumbs'][] = ['label' =>$news['feed']['res']['rName'], 'url' =>$source];

$sparam=[
			'date'=>$news['itemDate'],
			'url'=>$canurl,
			'title'=>$this->title,
			'img' =>$img,
			'section'=> 'اخبار اليمن',
			'desc' =>$desc
			];
		$this->render('_schema',$sparam);
JsonLDHelper::addBreadcrumbList();

 ?>
 
</header>

	<content>


			 <?php echo (!empty($news['body']))? \yii\helpers\StringHelper::truncateWords($news['body'],300,'',true):$news['content'];?>
     
 	 <div class="cent">
	    	<?=$this->render('_social',['title'=>$news['title'],'url'=>$url22,'turl'=>$turl])?>
		</div>
	
	
	<div>
	<h4>
	<?php $newslink='<a href="'.$news['url'].'">اضغط هنا </a>';
	$sourceLink='<a href="'.$source.'">'.$news['feed']['res']['rName'].'</a>';
	echo Yii::t('main','newsNote',['sourceName'=>$sourceLink,'news'=>$newslink]);?>
	</h4>
	<h4>
	اخر اخبار اليمن مباشر من أهم المصادر الاخبارية تجدونها  على الرابط <a href="/اخبار-اليمن-الان">اخبار اليمن الان</a> 
	</h4>
	</div>
	
		
		
		


			 <?php //echo $this->render('../ads/ketshwa_under_article');?>

	</content>

	<aside>
	
	<h2>اخبار اليمن من اهم المصادر</h2>
	

	<?php if ($this->beginCache("scrapMore3", ['duration' => 500])) {
echo YemenWidget::widget(['fromDate'=>' -'.rand(12, 18).' hours','toDate'=>'-10 hours','limit'=>3]);
	$this->endCache();
	}?>
	
	

	<section id="y">                         
			<?php if ($this->beginCache("hasad300", ['duration' => 1200])) {
echo YemenWidget::widget(['fromDate'=>' -2 hours','toDate'=>'-40  minutes','limit'=>2]);
	$this->endCache();
	}?>
<a class="of more" title="اخبار اليوم اليمن  24 ساعه" href="/اخبار-اليمن-اليوم-مباشر"><h4>المزيد من الأخبار</h4></a>

</section>
	</aside>




</main>
	
