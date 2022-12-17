<?php
use yii\widgets\LinkPager;
use frontend\components\Res2Widget;
use yii\helpers\Html;
$source='/source/'.preg_replace('/\s+/', '-', $rName);
$url=url([$source,],'https');
$this->title= \Yii::t('main','resTitle',['appName'=>Yii::$app->name,'resName'=>$rName]);


$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('main','resDesc',['resName'=>$rName])]);
$this->registerLinkTag(['rel' => 'canonical', 'href' => $url]);
//$this->registerMetaTag(['name' => 'robots', 'content' => 'nofollow']);

?>
<main>
	<header><h1>اخر اخبار <?=$rName?></h1></header>

	<?=$this->render('../ads/mobile_top');?>	

	    <section id="l">

	<?php //foreach($res[0]['feeds'] as $feeds)
	
	foreach($res as $entry)
	echo \Yii::$app->controller->renderPartial('_rItem',['entry'=>$entry]);
if($next)
			echo tokens($next['itemDate'].'-'.$next['id']);
	?>
	</section>

</main>

<aside id="l">
 <h2><?=\Yii::t('main','websiteTitle')?></h2>

<div id="ra" class="rN">

	<?php 
	if ($this->beginCache("reslist3", ['duration' => 7200])) {
	echo Res2Widget::widget();
	$this->endCache();
	}?>

		
</div>
	
			<?=$this->render('../ads/side_336x280');?>

</aside>



