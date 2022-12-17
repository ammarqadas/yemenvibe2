<?php
use frontend\components\YemenWidget;
use frontend\components\Res2Widget;
use frontend\components\ArticlesCatWidget;
?>

<aside id="l">


<section id="y">                         
			<?php if ($this->beginCache("hasad300", ['duration' => 1200])) {
echo YemenWidget::widget(['fromDate'=>' -2 hours','toDate'=>'-30  minutes','limit'=>3]);
	$this->endCache();
	}?>
<a class="of more" title="اخبار اليوم اليمن  24 ساعه" href="/اخبار-اليمن-اليوم-مباشر"><h4>المزيد من الأخبار</h4></a>

</section>


<ins class="adsbygoogle stads sad"
     style="display:inline-block;width:100%;text-align:center;"
     data-ad-client="ca-pub-2543093479909749"
     data-ad-slot="6873171904"
     data-ad-format="vertical"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</aside>
