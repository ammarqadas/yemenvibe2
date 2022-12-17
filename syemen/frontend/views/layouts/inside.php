<?php
use yii\helpers\Html;
use nirvana\jsonld\JsonLDHelper;?>
<?php $this->beginPage();?>
<!DOCTYPE html>
<html lang="ar">
<head>
      <?php  Html::csrfMetaTags(); ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
<?=$this->render('../_part/_header')?>
</head>
<body style="height:100%;overflow:scroll;padding-top:55px;">
<link   href="<?=assets()?>/0.css?v=1" rel="stylesheet">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-134152096-1"></script>
<script>
  window.dataLayer = window.dataLayer||[];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-134152096-1');
   //gtag('create', 'UA-134152096-1', {'siteSpeedSampleRate': 10});
</script>
<?php $this->beginBody() ?><div id="w">

<?= $content ?>
</div><?php $this->endBody() ?>
<style>
html{overflow-y:hidden;overflow-y:-moz-hidden-unscrollable}
body{padding-top:60px;}
html,body{height: 100%;overflow:hidden;margin:0px;
    box-sizing: border-box;}
</style>
<link  href="<?=assets()?>/d2.css?v=1" rel="stylesheet" media="(min-width:800px)">
<script>
function setframe(){var frm=document.getElementById('frm');frm.style.height=""+(getHight()-90)+"px";}
function getHight(){var height = window.innerHeight||document.documentElement.clientHeight||document.body.clientHeight;return height;}
document.addEventListener("DOMContentLoaded",function(){setframe()});
</script>
<link  async href="<?=assets()?>/s2.css?v=1" rel="stylesheet">
</body>
</html>

<?php $this->endPage() ?>
