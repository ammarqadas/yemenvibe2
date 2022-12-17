<?php
use yii\widgets\ListView;
use yii\widgets\LinkPager;
use frontend\components\YemenWidget;
use frontend\components\Res2Widget;
use yii\helpers\Html;

$this->title=t('websitePageTitle');
$url=url(['/مصادر-اخباريه-يمينه-عربيه',],'https');
$this->registerLinkTag(['rel' => 'canonical', 'href' => $url]);
$this->registerMetaTag(['name' => 'robots', 'content' => 'noindex,nofollow']);


?>
<main>
<header><h1><?=$this->title?></h1></header>


<section>
		<?php echo YemenWidget::widget(['type'=>'detail','fromDate'=>' -2 hours','toDate'=>'- 1 minutes']);?>
</section>
</main>
<aside id="l">


		<section id="r"><?=Res2Widget::widget()?> </section>

	
</aside>


