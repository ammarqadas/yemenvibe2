<?php
use yii\helpers\Html;
$this->title=\Yii::t('main','sahafahTitle',['appName'=>Yii::$app->name]);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'اليمن , اخبار اليمن الان، اليمن اليوم، صحافة نت، مصادر نت ,صحافه نت 24 ,يمن برس,مأرب برس,السجل,المشهد اليمني,الاكثر قراءه,تعز,الاكثر زياره,اهم الاخبار,الحديدة,الامارات,الحوثيين,العدوان السعودي,التحالف العربي,اخبار24']);
$url=url(['/صحافه-نت-اخبار-اليمن',],'https');
$this->registerLinkTag(['rel' => 'canonical', 'href' => $url]);
$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('main','sahafahDesc')]);
?>
<main id="m">
	<?php if ($headers ):?>
	<header><h1> صحافه نت اهم الاخبار </h1>
	
	<?php 
	echo \Yii::$app->controller->renderPartial('_entry',['entry'=>array_shift($headers)]);?>
	</header>
	<?=$this->render('../ads/mobile_top');?>	


	<section>
    <h2> اخبار <a href="/صحافه-نت-اخبار-اليمن" title=" اخبار الصحافه اليمنيه من اهم المصادر"><strong style="color:#ffebcd"> صحافه نت </strong></a> الاكثر قراءه</h2>

		<?php  if ($headers ) foreach($headers as $entry)
	echo \Yii::$app->controller->renderPartial('../_part/_entry',['entry'=>$entry]);
	?>
		 	
	</section>
	<?php endif;?>
	<section  >
		<h2>اخبار الصحافه من اهم المصادر</h2>
		   <?php 
		      foreach($items as $entry)
	          echo \Yii::$app->controller->renderPartial('../_part/_item',['entry'=>$entry]);
              if($next)
	     		echo tokens($next['itemDate'].'-'.$next['id'],false,'المزيد اخبار صحافه نت >>');
					
			?>
	</section>
</main>
<?php 
  echo $this->render('../_part/_aside');
 ?>




