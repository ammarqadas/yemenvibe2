<?php
use yii\widgets\ListView;
use yii\widgets\LinkPager;
use frontend\components\TrendsWidget;
//use frontend\components\NotifWidget;
use yii\helpers\Html;
use nirvana\jsonld\JsonLDHelper;
$this->registerLinkTag(['rel' => 'canonical', 'href' => Yii::$app->homeUrl]);
$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('main','siteDesc')]);
$this->registerMetaTag(['name' => 'refresh', 'content' => '330;  url="https://yemenvibe.com']);
$siteTitle=\Yii::t('main', 'siteTitle',['appName'=>Yii::$app->name]);
$doc = (object)["@type" => "http://schema.org/WebSite","http://schema.org/name" => \Yii::$app->name,"http://schema.org/url" => \Yii::$app->urlManager->hostInfo];
JsonLDHelper::add($doc);
?>
<main id="m">

	<?php if ($headers ):?>

	<header>
	<?php //foreach($headers as $header) echo \Yii::$app->controller->renderPartial('_header',['entry'=>$header]);
	echo \Yii::$app->controller->renderPartial('_header',['entry'=>array_shift($headers)]);?>
	
	
	</header>
	

	
	<section>

<h2><?=t('topNews')?></h2>
<?php //if(isDesktop())echo '<div class="in" style="width:100%;"><div>';?>


	<?php  foreach($headers as $entry)
	echo \Yii::$app->controller->renderPartial('_header',['entry'=>$entry]);
	?>
		 <?php  //if(isDesktop()){echo '</div>'; echo $this->render('../ads/side_160x600');echo '</div>';}?>
	<a  title ="<?=t('topNews')?> " class="of more" href="/اخبار-اليمن-مباشر"><h4>المزيد من اخبار اليمن </h4></a>

	</section>
<?php endif?>

	<section id="l" >
		<h2><?=t('lastNews')?></h2>
		   <?php 
		      foreach($items as $entry)
	          echo \Yii::$app->controller->renderPartial('../_part/_item',['entry'=>$entry]);
			 ?>
		<h4><a  title ="<?=t('lastNews')?> "class="of more" href="/اخبار-اليمن-الان"> المزيد من الاخبار العاجله</a></h4>
	</section>
		



</main>
<?php 
  echo $this->render('../_part/_aside');
 ?>




