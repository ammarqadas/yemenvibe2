<?php
use frontend\components\YemenWidget;
use frontend\components\Res2Widget;
use frontend\components\ArticlesCatWidget;
?>

<aside id="l">


<section id="y">                         
			<?php if ($this->beginCache("hasad300", ['duration' => 1200])) {
echo YemenWidget::widget(['fromDate'=>' -2 hours','toDate'=>'-40  minutes','limit'=>2]);
	$this->endCache();
	}?>
<a class="of more" title="اخبار اليوم اليمن  24 ساعه" href="/اخبار-اليمن-اليوم-مباشر"><h4>المزيد من الأخبار</h4></a>

</section>


</aside>
