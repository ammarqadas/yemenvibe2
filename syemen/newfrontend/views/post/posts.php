<?php

use yii\widgets\ListView;
use yii\widgets\LinkPager;
use frontend\components\YemenWidget;
use yii\helpers\Html;
$this->title="اخبار ".\Yii::$app->name;
?>
<main>
		<header><h1><?=$this->title?></h1></header>

	<section>
		<?php foreach($posts as $entry)
	echo \Yii::$app->controller->renderPartial('_post',['post'=>$entry]);
	
	echo LinkPager::widget([
    'pagination' => $pages,
	'options' =>['class'=>'p'],
		'maxButtonCount' => \Yii::$app->params['pageCount'],

]);
	?>
	</section>
</main>
<?=$this->render('../_part/_aside2')?>



