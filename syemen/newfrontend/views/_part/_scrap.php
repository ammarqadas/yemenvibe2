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
$desc=getDesc($cont,$news['feed']['res']['rName'],60);
$this->title= getTitle($news['title'],$news['feed']['res']['rName'],18);
$img=(isFound($news['enclosureUrl']))?imgUrl2($news['enclosureUrl'],param('imgOptions_large'),param('imgExt')):url(assets().'/image/large.jpg',true);
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
?>

	<div class="in rev">	
<main style="padding:1em">

<header>
<h1><?=$news['title']?></h1>

<div class="i0">

<i class="i-e"><?=t('read',$news['read'])?></i>
<div class="t">
<i class="i-c" aria-hidden="true"></i>
<?php $idate=\Yii::$app->formatter->asDatetime($news['itemDate'], 'php:d-M h:i A');?>
<time title="<?=$idate?>" datetime="seconds: <?=$news['itemDate']?>">
 <?= \common\components\TwitterHelper::time_ago($news['itemDate'])?>
</time>
</div>
</div>

<?php
$shortTitle= getTitle($news['title'],$news['feed']['res']['rName'],12);
$source='/source/'.preg_replace('/\s+/', '-', $news['feed']['res']['rName']);
$this->params['breadcrumbs'][] = ['label' => 'اخبار اليمن مباشر', 'url' =>url('/اخبار-اليمن-الان')];
$this->params['breadcrumbs'][] = ['label' =>$news['feed']['res']['rName'], 'url' =>$source];
$this->params['breadcrumbs'][] =['label' =>$shortTitle, 'url' =>$canurl];

$sparam=[
			'date'=>$news['itemDate'],
			'url'=>$canurl,
			'title'=>$shortTitle,
			'img' =>$img,
			'section'=> 'اليمن-الان',
			'desc' =>getDesc($news['content'],$news['feed']['res']['rName'],40)
			];
		$this->render('_schema',$sparam);
JsonLDHelper::addBreadcrumbList();

 ?>
 
</header>
	
	<content>


		<?php if(isFound($news['enclosureUrl'])):?>	
	   
	<img style="margin:.3em auto;display:block" alt="<?=$this->title?>" class="defimg" src="<?=param('defImage')?>" data-src="<?=$img?>"/>
		<?php endif;?>
		
			 <?php 
			 		echo (!empty($news['body']))? \yii\helpers\StringHelper::truncateWords($news['body'],220,'',true):$news['content'];?>
      

	  
		<!-- article_336x280 -->

<ins class="adsbygoogle mad"
     style="display:inline-block;width:100%;text-align:center;"
     data-ad-client="ca-pub-2543093479909749"
     data-ad-slot="8046722581"
      data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

		
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
	
	<h4> اقراء ايضا أهم الاخبار  </h4>
	

	<?php if ($this->beginCache("scrapMore", ['duration' => 500])) {
echo YemenWidget::widget(['fromDate'=>' -16 hours','toDate'=>'-6 hours','limit'=>2]);
	$this->endCache();
	}?>
	
	</aside>
</main>
	
<?php //$aside=(isDesktop())?'_aside2':'_aside_mobile';

 echo $this->render('../_part/_aside2');?>
</div>
