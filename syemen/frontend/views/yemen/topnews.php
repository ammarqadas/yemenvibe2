<?php

use yii\widgets\ListView;
use yii\widgets\LinkPager;
use frontend\components\YemenWidget;
use yii\helpers\Html;
$this->title=\Yii::t('main','topNews',['appName'=>Yii::$app->name]);
$url=url(['/اخبار-اليمن-مباشر',],'https');
$this->registerLinkTag(['rel' => 'canonical', 'href' => $url]);
$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('main','topDesc')]);
//$this->registerMetaTag(['name' => 'description', 'content' =>'أسباب سقوط مدينة الحزم بيد الحوثيون وظهور محافظ الجوف امين العكيمي ويرفض الانسحاب وتعزيزات تصل العكيمي']);
//$this->registerMetaTag(['name' => 'robots', 'content' => 'nofollow']);
?>
<main>
<header>
<h1><a href="<?=Yii::$app->homeUrl?>">اخبار اليمن</a></h1> :

<h2>اهم اخبار الساعه</h2>
</header>

	<section>
		<?php
		$hitm=8;
		$i2=0;
		
		foreach($items as $entry)
		{
		$layout=( $i2++ <$hitm )?"_entry":"_item";
	    echo \Yii::$app->controller->renderPartial('../_part/'.$layout,['entry'=>$entry]);
		 	if($i2 == 2)echo $this->render('../ads/mobile_top');

		}
if($next)
			echo tokens($next['itemDate'].'-'.$next['id'],false,'اخبار اليمن الساعه >>');

	?>
	</section>
	
</main>

<aside id="l">
<section id="y">
			<div>
			<?php if ($this->beginCache("hasad2h2", ['duration' => 1200])) {
echo YemenWidget::widget(['fromDate'=>' -2 hours','toDate'=>'-20  minutes','limit'=>2]);
	$this->endCache();
	}?>
			</div>
<a class="of more" title="اخبار اليوم اليمن  24 ساعه" href="/اخبار-اليمن-اليوم-مباشر"><h4>اليمن اليوم اخبار 6 ساعات </h4></a>

</section>

<section id="r">
		 <h2><?=\Yii::t('main','websiteTitle')?></h2>

	<?php if ($this->beginCache("reslist3", ['duration' => 7200])) {
	echo Res2Widget::widget(['limit'=>20]);
	$this->endCache();
}?>
</section>

</aside>






