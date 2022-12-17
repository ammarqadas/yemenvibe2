<?php

use yii\widgets\ListView;
use yii\widgets\LinkPager;
use frontend\components\YemenWidget;
use yii\helpers\Html;
$this->title=\Yii::t('main','todayTitle',['appName'=>Yii::$app->name]);
$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('main','todayDesc')]);
//$this->registerMetaTag(['name' => 'robots', 'content' => 'nofollow']);
$url=url(['/اخبار-اليمن-اليوم-مباشر',],'https');

$this->registerLinkTag(['rel' => 'canonical', 'href' => $url]);

?>
<main>
<header>
<h1><a href="<?=Yii::$app->homeUrl?>">اخبار اليمن اليوم </a></h1> :
<h2><?=\Yii::t('main','todayNews')?></h2></header>

	<?php //if(isDesktop()) echo $this->render('../ads/top_728x90');	?>



	<section>
		<?php
		$hitm=10;
		$i2=0;

		foreach($items as $entry)
		{
			$layout=( $i2++ <$hitm )?"_entry":"_item";

			echo \Yii::$app->controller->renderPartial('../_part/'.$layout,['entry'=>$entry]);
				 	if($i2 == 2)echo $this->render('../ads/mobile_top');

		}
		if($next)
			echo tokens($next['itemDate'].'-'.$next['id'],false,' اليمن اليوم المزيد >>');

	?>

	</section>

</main>

<aside id="l">

<section id="y">
<h2>اخبار <strong style="color:#ffebcd">اليمن اليوم</strong> العاجله</h2>
			<div>
			<?php if ($this->beginCache("hasad4h1", ['duration' => 1200])) {
echo YemenWidget::widget(['fromDate'=>' -4 hours','toDate'=>'-1  hours','limit'=>4]);
	$this->endCache();
	}?>
			</div>
<a class="of more" title="اخبار اليوم اليمن  24 ساعه" href="/اخبار-اليمن-اليوم-مباشر"><h4>اليمن اليوم اخبار الساعه</h4></a>

</section>

</aside>




