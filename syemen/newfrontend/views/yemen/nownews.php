<?php
use yii\widgets\ListView;
use yii\widgets\LinkPager;
use yii\helpers\Html;
use frontend\components\YemenWidget;

$this->title=\Yii::t('main','nowTitle',['appName'=>Yii::$app->name]);

//$this->title="أخر اخبار الجوف الان اليمن الحزم";

$url=url(['/اخبار-اليمن-الان',],'https');

$this->registerLinkTag(['rel' => 'canonical', 'href' => $url]);

$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('main','nowDesc')]);

?>


<main>


<div class="in rev">
	<?php //if(isDesktop()) echo $this->render('../ads/top_728x90');	?>
	
<main>
<header>
<h1><?=\Yii::t('main','lastNews')?></h1>
</header>
	<?=$this->render('../ads/mobile_top');?>	

	<section id="l">
		
		 
		<?php
				$i2=0;
//array_slice($items,6)
		foreach($items as $entry)
		{
	     echo \Yii::$app->controller->renderPartial('../_part/_item',['entry'=>$entry]);
	    	//if($i++ = 5) 
          //echo $this->render('../ads/mpi_index_right');
		}
        if($next)
			echo tokens($next['itemDate'].'-'.$next['id']);

	?>

	</section>
</main>
<aside id="l">
<section id="y">
			<?php if ($this->beginCache("hasad102", ['duration' => 1200])) {
echo YemenWidget::widget(['fromDate'=>' -6 hours','toDate'=>'-2  hours','limit'=>4]);
	$this->endCache();
	}?>

</section>
		<?=$this->render('../ads/side_336x280');?>

</aside>
</div>
</main>

