<?php

use yii\widgets\ListView;
use yii\widgets\LinkPager;
use frontend\components\YemenWidget;
use yii\helpers\Html;
$this->title=$trend->title;
$url=url(['/hashtag/'.$trend->slug,],'https');
$desc=$header['title']??$trend->description;
$this->registerLinkTag(['rel' => 'canonical', 'href' => $url]);
$this->registerMetaTag(['name' => 'description', 'content' => $desc]);
//$words =array_filter(array_map('trim', preg_split("/[\n,]+/",$trend->keyWords)));
//$this->registerMetaTag(['name' => 'keywords', 'content' => implode(',',$words)]);
?>
<main>
<header>
<h1><?=$trend->title?></h1>
	<?php if ($header)
		echo \Yii::$app->controller->renderPartial('_header',['entry'=>$header]);
else echo '<p>'.$trend->description.'</p>';
$slugTile=preg_replace('/\-/',' ',$trend->slug);
?>
</header>
<?php if ($headers):?>
<section>
<h2><?=$slugTile?> أهم الأخبار</h2>
	<?php  foreach($headers as $entry)
	echo \Yii::$app->controller->renderPartial('../_part/_entry',['entry'=>$entry]);
	?>
	</section>
<?php endif?>

	<section>
	<h2><?=$slugTile?> اخر اخبار</h2>

		<?php foreach($items as $entry)
	echo \Yii::$app->controller->renderPartial('../_part/_item',['entry'=>$entry]);
	echo LinkPager::widget([
    'pagination' => $pages,
	'options' =>['class'=>'p'],
	'maxButtonCount' => \Yii::$app->params['pageCount'],
]);
		?>
	</section>
</main>
<?=$this->render('../_part/_aside2')?>



