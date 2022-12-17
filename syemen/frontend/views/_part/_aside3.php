
<?php 
use frontend\components\YemenWidget;
use frontend\components\Res2Widget;
use frontend\components\ArticlesCatWidget;
?>
<aside id="l">


	<div id="ra" class="rN">
	<section id="r">
	<?php if ($this->beginCache("reslist23", ['duration' => 7200])) {
	echo Res2Widget::widget();
	$this->endCache();
}?>
</section>
	</div>
	
</aside>