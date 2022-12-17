<?php
use yii\helpers\Html;
use nirvana\jsonld\JsonLDHelper;?>
<?php $this->beginPage();?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language ?>">
<head>
      <?php  Html::csrfMetaTags(); ?>
    <title><?= Html::encode($this->title) ?></title>
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
<script>
const zload=()=>{var js,fjs=ById('BCSS');js=document.createElement('link');if(ById('vcss'))return;js.id='vcss';js.rel='stylesheet';js.href='<?=assets()?>/s2.css?v=3';fjs.parentNode.insertBefore(js,fjs.nextSibling);};
(function(){zload()})();
</script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<?php $this->beginBody() ?><div id="w">

<?= $content ?>
</div><?php $this->endBody() ?>
<style>
html{overflow-y:hidden;overflow-y:-moz-hidden-unscrollable}
body{padding-top:60px;}
html,body{height: 100%;overflow:hidden;margin:0px;
    box-sizing: border-box;}
</style>
<link  href="<?=assets()?>/d2.css?v=2" rel="stylesheet" media="(min-width:800px)">
<script>
function setframe(){var frm=ById('frm');frm.style.height=""+(getHight()-60)+"px";}
function getHight(){var height = window.innerHeight||document.documentElement.clientHeight||document.body.clientHeight;return height;}
document.addEventListener("DOMContentLoaded",function(){setframe()});
</script>
<noscript><link  href="<?=assets()?>/s2.css?v=1" rel="stylesheet"></noscript>

</body>
</html>

<?php $this->endPage() ?>
