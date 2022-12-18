<?php
use yii\helpers\Html;
use frontend\components\TopicsWidget;
//use frontend\components\ModalWidget;
use nirvana\jsonld\JsonLDHelper;
$siteTitle= \Yii::t('main', 'siteTitle',['appName'=>Yii::$app->name]);?>
<?php $this->beginPage()?>
<!DOCTYPE HTML>
<html lang="ar">
<head>
	<?php  Html::csrfMetaTags(); ?>
 <title><?= Html::encode($this->title??$siteTitle) ?></title>
 <?php JsonLDHelper::registerScripts(); ?>
 <?php $this->head() ?>
 <script data-ad-client="ca-pub-2543093479909749" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<?=$this->render('../_part/_header')?>

</head>

<body>
<link  href="<?=assets()?>/0.css?v=1" rel="stylesheet">
<style>@media(min-width:800px){#c{flex-flow:column}}</style>
<?php $this->beginBody()?>
<div id="w">
<header>
<div class="in">
<div id="g">
<a href="<?=Yii::$app->homeUrl?>"><img width="154" height="30" src="<?=assets()?>/logo2.svg" alt="اخبار اليمن الان الحدث اليوم  عاجل" title="<?=Yii::t('main', 'logo',['appName'=>Yii::$app->name])?>" /></a>
<a id="nT" href="javascript:void(0)" onclick="nT()" >&#9776;</a>
</div>
<nav id="tnv" class="snv">
<ul class="hide">
<li><a title="اخبار اليمن الان عاجل" href="/اخبار-اليمن-الان">اليمن الان</a></li>
<li><a title="اليمن اخبار الساعه الصحافه نت" href="/اخبار-اليمن-مباشر"> اخبار الساعه</a></li>
<li><a title="اليمن اليوم مباشر اخبار 24 ساعه " href="/اخبار-اليمن-اليوم-مباشر">اليمن اليوم</a></li>


</ul>
</nav>
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
	
		<nav><ul>
	<li><a title ="اخر اخبار اليمن من اهم المصادر" href="/section/اخبار-اليمن">اخبار اليمن</a></li>
    <li><a title="صحافه نت اخبار اليمن" href="/صحافه-نت-اخبار-اليمن">صحافه نت</a></li>
	</ul></nav>
		<p><?=Yii::t('main', 'footerNote',['appName'=>Yii::$app->name])?></p>
	</div>
	

	<div>
        		<a href="<?=Yii::$app->homeUrl?>"><img src="<?=assets()?>/logo2.svg" width="220" height="40" alt="اخبار اليمن الان الحدث اليوم  عاجل" title="<?=Yii::t('main', 'logo',['appName'=>Yii::$app->name])?>" />
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
</body>
<?php $this->endBody() ?>
</html>
<script>
const imgDefer=(cls)=>{const imgAsync=document.querySelectorAll(cls);const loadImage=(img)=>{return new Promise((resolve,reject)=>{img.src=img.getAttribute('data-src');img.onload=()=>{img.removeAttribute('data-src');resolve(img)};img.onerror=(e)=>{console.log('load fail:'+e.message);resolve(e)}})};if(imgAsync)
Array.from(imgAsync).map(img=>loadImage(img))};
function nT(){var x=document.getElementById('tnv');if(x.className==='snv'){x.className='tnv'}else{x.className='snv'}};
(function(){imgDefer('main article .av');})();
const wp=(url)=>{window.open(url,'شارك','width=655,height=430');return!1};
//ads("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js").then(()=>{(adsbygoogle=window.adsbygoogle||[]).push({})});
</script>


<?php $this->endPage() ?>
<link   href="<?=assets()?>/s2.css?v=1" rel="stylesheet">
<link   href="<?=assets()?>/d2.css?v=1" rel="stylesheet" media="(min-width:800px)">
