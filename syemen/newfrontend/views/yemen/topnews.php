<?php

use yii\widgets\ListView;
use yii\widgets\LinkPager;
use frontend\components\YemenWidget;
use yii\helpers\Html;
$this->title=\Yii::t('main','topNews');
//$this->title="أخر اخبار مدينة الحزم أمين العكيمي يرفض الانسحاب -محافظة الجوف";

$url=url(['/اهم-الاخبار-اليمن',],'https');
$this->registerLinkTag(['rel' => 'canonical', 'href' => $url]);
$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('main','todyDesc')]);
//$this->registerMetaTag(['name' => 'description', 'content' =>'أسباب سقوط مدينة الحزم بيد الحوثيون وظهور محافظ الجوف امين العكيمي ويرفض الانسحاب وتعزيزات تصل العكيمي']);
//$this->registerMetaTag(['name' => 'robots', 'content' => 'nofollow']);

?>
<main>
<header>
<h1><?=\Yii::t('main','topNews')?></h1>
</header>
	<?php //if(isDesktop()) echo $this->render('../ads/top_728x90');	?>
	<?=$this->render('../ads/mobile_top');?>	

	<section>
		<?php
		$hitm=6;
		$i2=0;
		
		foreach($items as $entry)
		{
		$layout=( $i2++ <$hitm )?"_entry":"_item";
	    echo \Yii::$app->controller->renderPartial('../_part/'.$layout,['entry'=>$entry]);
	   // if($i2==$hitm) echo $this->render('../ads/inline_ads');

		}
if($next)
			echo tokens($next['itemDate'].'-'.$next['id']);

	?>
	</section>
	
</main>

<aside id="l">
<section id="y">
			<div>
			<?php if ($this->beginCache("hasad2h", ['duration' => 1200])) {
echo YemenWidget::widget(['fromDate'=>' -2 hours','toDate'=>'-20  minutes','limit'=>5]);
	$this->endCache();
	}?>
			</div>
<a class="of more" title="اخبار اليوم اليمن  24 ساعه" href="/اخبار-اليمن-اليوم-مباشر"><h4>المزيد من الأخبار</h4></a>

</section>
		<?=$this->render('../ads/side_336x280');?>

</aside>






