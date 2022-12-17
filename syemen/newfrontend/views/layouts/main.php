<?php
use yii\helpers\Html;
use frontend\components\TopicsWidget;
//use frontend\components\ModalWidget;
use nirvana\jsonld\JsonLDHelper;
$siteTitle= \Yii::t('main', 'siteTitle',['appName'=>Yii::$app->name]);?>
<?php $this->beginPage()?>
<!DOCTYPE HTML>
<html lang="<?= Yii::$app->language ?>">
<head>
	<?php  Html::csrfMetaTags(); ?>
 <title><?= Html::encode($this->title??$siteTitle) ?></title>
 <?php JsonLDHelper::registerScripts(); ?>
 <?php $this->head() ?>
<?=$this->render('../_part/_header')?>
</head>

<body>
<link  id="BCSS" href="<?=assets()?>/0.css?v=4" rel="stylesheet">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-134152096-1"></script>
<script>
  window.dataLayer = window.dataLayer||[];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-134152096-1');
   //gtag('create', 'UA-134152096-1', {'siteSpeedSampleRate': 10});
</script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<?php $this->beginBody()?>
<div id="w">
<header>
<div class="in">
<div id="g">
<a href="<?=Yii::$app->homeUrl?>"><img src="<?=assets()?>/logo3.png" alt="<?=Yii::t('main', 'logo',['appName'=>Yii::$app->name])?>" /></a>
<a id="nT" href="javascript:void(0)" onclick="nT()" >&#9776;</a>
</div>

</div>
</header>
<div id="c">
<div class="in">
        <?= $content ?>
</div>


</div> 

<footer>

    <div id="f1" class="in">
	
	<div>
		
		<p><?=Yii::t('main', 'footerNote',['appName'=>Yii::$app->name])?></p>
	</div>

	<div>
        		<a href="<?=Yii::$app->homeUrl?>"><img src="<?=assets()?>/logo3.png" alt="<?=Yii::t('main', 'logo',['appName'=>Yii::$app->name])?>" />
			<p><span class="i-m"></span>yemenvibe@gmail.com</p>
			<div class="fm">
				<a href="https://www.facebook.com/vibeyemen" target="_blank"> <span class="i-f"></span></a>
				<a href="https://twitter.com/VibeYemen" target="_blank"><span class="i-t"></span></a>
				<a href="https://t.me/yemenvibe" target="_blank"><span class="i-tg"></span></a>
			</div>
			
	</div>
	
			
  </div>
</footer>
<div id="cp" >
<div  class="in">



		<span>&copy; <?=date('Y')." ".Yii::$app->name?> | تصميم <strong> سعد باصالح </strong>  </span>
  </div>
</div>

</div>
<?php $this->endBody() ?>

<script>
function nT(){var x=ById('tnv');if(x.className==='snv'){x.className='tnv'}else{x.className='snv'}};
const imgDefer=(cls)=>{const imgAsync=document.querySelectorAll(cls);const loadImage=(img)=>{return new Promise((resolve,reject)=>{img.src=img.getAttribute('data-src');img.onload=()=>{console.log("loaded image: "+img.src);img.removeAttribute('data-src');resolve(img)};img.onerror=(e)=>{console.log('load fail:'+e.message);resolve(e)}})};if(imgAsync)
Array.from(imgAsync).map(img=>loadImage(img))};
(function(){imgDefer('.av');imgDefer('.defimg')})();
const zload=()=>{var js,fjs=ById('BCSS');js=document.createElement('link');if(ById('vcss'))return;js.id='vcss';js.rel='stylesheet';js.href='<?=assets()?>/s2.css?v=3';fjs.parentNode.insertBefore(js,fjs.nextSibling);};
(function(){zload()})();

</script>
<noscript><link  href="<?=assets()?>/s2.css?v=4" rel="stylesheet"></noscript>

</body></html>
<link  href="<?=assets()?>/d2.css?v=4" rel="stylesheet" media="(min-width:800px)">
<?php $this->endPage() ?>
