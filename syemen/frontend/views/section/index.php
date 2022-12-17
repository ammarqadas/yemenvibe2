<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;
use frontend\components\Res2Widget;
$this->title=$topic->title;
$source='/section/'.$topic->slug;
$url=url([$source,],'https');
//$this->registerMetaTag(['name' => 'robots', 'content' => 'noindex,nofollow']);
$this->registerLinkTag(['rel' => 'canonical', 'href' => $url]);
$this->registerLinkTag(['rel' => 'canonical', 'href' => Yii::$app->homeUrl]);

?>
<main>
	<header><h1> <?=$topic->title?></h1></header>

	<?=$this->render('../ads/mobile_top');?>	

	<section>
	<?php 
	$hitm=10;
		$i2=0;

		foreach($res as $entry)
		{
			$layout=( $i2++ <$hitm )?"_entry":"_item";
	     echo \Yii::$app->controller->renderPartial('../_part/'.$layout,['entry'=>$entry]);
	    	//if($i++ = 5) 
          //echo $this->render('../ads/mpi_index_right');
		}
	//foreach($res as $entry)echo \Yii::$app->controller->renderPartial('_topicItems',['entry'=>$entry]);
	
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
	
</aside>



