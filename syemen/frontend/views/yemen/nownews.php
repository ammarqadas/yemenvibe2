<?php
use yii\widgets\ListView;
use yii\widgets\LinkPager;
use yii\helpers\Html;
use frontend\components\YemenWidget;
use frontend\components\Res2Widget;

$this->registerMetaTag(['name' => 'keywords', 'content' => 'اخبار اليمن، اليمن الان، اخبار اليمن الان، اليمن اليوم، اليمن، اليمن 24 ساعة']);

$this->title=\Yii::t('main','nowTitle',['appName'=>Yii::$app->name]);

//$this->title="اليمن الان-اخبار عاجلة يمن فايب";
//$this->registerMetaTag(['name' => 'robots', 'content' => 'follow']);
//$this->registerMetaTag(['name' => 'robots', 'content' => 'noindex,follow']);
//$this->registerLinkTag(['rel' => 'canonical', 'href' => Yii::$app->homeUrl]);
//$url=url(['/اخبار-اليمن-الان',],'https');

$this->registerLinkTag(['rel' => 'canonical', 'href' => $url]);

$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('main','nowDesc')]);

?>


<main>
<?php //if(isDesktop()) echo $this->render('../ads/top_728x90');	?>
	
<header>
<h1><a href="<?=Yii::$app->homeUrl?>">اخبار اليمن الان</a></h1> :
<h2>اخبار عاجله من الحدث</h2>
</header>

	<section>
		
		 
		<?php
			$hitm=10;
		$i2=0;

		foreach($items as $entry)
		{
			$layout=( $i2++ <$hitm )?"_entry":"_item";
	     echo \Yii::$app->controller->renderPartial('../_part/'.$layout,['entry'=>$entry]);
		 	if($i2 == 1)echo $this->render('../ads/mobile_top');

	    	//if($i++ = 5) 
          //echo $this->render('../ads/mpi_index_right');
		}
        if($next)
			echo tokens($next['itemDate'].'-'.$next['id'],false,'اليمن الان اخبار عاجله');
		

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


	<section id="r">
		 <h2><?=\Yii::t('main','websiteTitle')?></h2>

	<?php if ($this->beginCache("reslist3", ['duration' => 7200])) {
	echo Res2Widget::widget(['limit'=>25]);
	$this->endCache();
}?>
</section>

</aside>

