<?php

use yii\widgets\ListView;
use yii\widgets\LinkPager;
use frontend\components\YemenWidget;
use yii\helpers\Html;
$this->title=\Yii::t('main','todayTitle');
$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('main','todyDesc')]);
//$this->registerMetaTag(['name' => 'robots', 'content' => 'nofollow']);
$url=url(['/اخبار-اليمن-اليوم-مباشر',],'https');

$this->registerLinkTag(['rel' => 'canonical', 'href' => $url]);

?>
<main>
<header><h1>اخبار <?=\Yii::t('main','todayNews')?></h1></header>
	<?php //if(isDesktop()) echo $this->render('../ads/top_728x90');	?>

	<?=$this->render('../ads/mobile_top');?>	

	
	<section>
		<?php
		$hitm=6;
		$i2=0;

		foreach($items as $entry)
		{
			$layout=( $i2++ <$hitm )?"_entry":"_item";
		//	if($i2==$hitm) echo $this->render('../ads/inline_ads');

			echo \Yii::$app->controller->renderPartial('../_part/'.$layout,['entry'=>$entry]);
		}
		if($next)
			echo tokens($next['itemDate'].'-'.$next['id']);

	?>

	</section>

</main>

<aside id="l">
<section id="y">
			<div>
			<?php if ($this->beginCache("hasad4h1", ['duration' => 1200])) {
echo YemenWidget::widget(['fromDate'=>' -4 hours','toDate'=>'-1  hours','limit'=>4]);
	$this->endCache();
	}?>
			</div>
<a class="of more" title="اخبار اليوم اليمن  24 ساعه" href="/اخبار-اليمن-اليوم-مباشر"><h4>المزيد من الأخبار</h4></a>

</section>
		<?=$this->render('../ads/side_336x280');?>

</aside>




