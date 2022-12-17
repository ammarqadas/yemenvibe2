
<?php 
use frontend\components\YemenWidget;
use frontend\components\ResWidget;
use frontend\components\Res2Widget;
//use frontend\components\FollowWidget;
use frontend\components\ArticlesCatWidget;
use frontend\components\PostWidget;

$pw= new PostWidget;
?>
<aside id="l">
<section id="y">
			<h2><?=\Yii::t('main','todayNews')?></h2>
			<div>
			<?php if ($this->beginCache("hasad12", ['duration' => 1200])) {
echo YemenWidget::widget(['fromDate'=>' -7 hours','toDate'=>'-1  hours','limit'=>6]);
	$this->endCache();
	}?>
			</div>
<a class="of more" title="اخبار اليوم اليمن  24 ساعه" href="/اخبار-اليمن-اليوم-مباشر"><h4>المزيد من الأخبار</h4></a>

</section>
 <?php //echo $this->render('../ads/mpi_index_left');?>

<?php if ($pw->check()):?>
<section class="pst">
<h2>اخبار خاصة يمن فايب</h2>
<div>
			<?php if ($this->beginCache("postwid", ['duration' => 900])) {

echo $pw::widget(['limit'=>5]);
$this->endCache();
	}
	
	?>

</div>
<a class="of more" title="اخبار خاصة يمن فايب" href="/posts"><h4>المزيد من الأخبار</h4></a>
</section>
<?php endif;?>
</aside>