
<?php 
use newfrontend\components\YemenWidget;
use frontend\components\ResWidget;
use frontend\components\Res2Widget;
//use frontend\components\FollowWidget;
use frontend\components\ArticlesCatWidget;
use frontend\components\PostWidget;

$pw= new PostWidget;

?>

<aside id="l">




<section id="y" >
			<?php if ($this->beginCache("hasad08", ['duration' => 1200])) {
echo YemenWidget::widget(['fromDate'=>' -5hours','toDate'=>'-1  hours','limit'=>5]);
	$this->endCache();
	}?>
</section>
<aside id="l">
 <h2><?=\Yii::t('main','websiteTitle')?></h2>
<div id="ra" class="rN">

	<?php 
	if ($this->beginCache("reslist23", ['duration' => 7200])) {
	echo Res2Widget::widget();
	$this->endCache();
	}?>

		
</div>
</aside>

</aside>