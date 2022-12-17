<?php
use yii\helpers\Html;
use frontend\components\FollowWidget;
use frontend\components\FbModalWidget;
$url=itemUrl($post['id'],$post['slug'],'post');
//$=url([$url,],'https');
$url=home().$url;
$canurl=url([$url,],'https');

//$image=url(['/post'.$post['id'].'.html',],true);
$this->title=words($post['title']);
$img=imgUrl2(url([param('upload_dir').$post['img'],],true),param('imgOptions_large'),param('imgExt'))?:url([assets().'/image/large.jpg',],true);

//$img=(!empty($post['img']))?url([param('upload_dir').$post['img'],],true):url([assets().'/image/large.jpg',],true);
$this->registerLinkTag(['rel' => 'canonical', 'href' => $canurl]);
$this->registerMetaTag(['name' => 'description', 'content' => words($post['content'],50)]);
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

<?php
$shortTitle=words($this->title,13);
//$source=url('/source/'.preg_replace('/\s+/', '-', $news['feed']['res']['rName']));
$this->params['breadcrumbs'][] = ['label' => \Yii::$app->name, 'url' =>\Yii::$app->homeUrl];
$this->params['breadcrumbs'][] = ['label' => 'اخبار اليمن-تعز الان', 'url' =>url('/posts')];
$this->params['breadcrumbs'][] =['label' =>  $shortTitle, 'url' =>$url] ;
$sparam=[
			'date'=>$post['created_at'],
			'url'=>$url,
			'title'=>$shortTitle,
			'img' =>$img,
			'section'=> 'اخبار اليمن الان',
			'desc' =>words($post['content'],40)
			];
		$this->render('../_part/_schema',$sparam);
?>

<h1><?=$post['title']?></h1>
<div class="i0">
<div class="inf">

<?if($post['views']):?>

<span class="i-e"></span><span class="cnt"><?=\Yii::t('main','read',$post['views'])?></span> 

</div>
<div class="t">
 <i class="i-c" aria-hidden="true"></i>
<?php $idate=\Yii::$app->formatter->asDatetime($post['created_at'], 'php:d-M h:i A');?>
<time title="<?=$idate?>" datetime="seconds: <?=$post['created_at']?>">
 <?= \common\components\TwitterHelper::time_ago($post['created_at'])?>
</time>
</div>



</div>
</header>

	<content>
	<div class="cent">
	<img src="<?=param('upload_dir').$post['img']?>"/>
	</div>
	
	
	
		<?=$post['content']?>

		<?php $url=url(['/post'.$post['id'].'.html',],true);?>
		<div class="cent">
		<?=$this->render('../_part/_social',['title'=>$post['title'],'url'=>$canurl,'turl'=>$url])?>

		</div>

	
		
	</content>
</main>


<?=$this->render('../_part/_aside2')?>

