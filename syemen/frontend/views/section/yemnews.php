<?php
use yii\helpers\Html;
$this->title=\Yii::t('main','yemnewsTitle',['appName'=>Yii::$app->name]);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'اليمن ,اخبار اليمن ,اخبار اليمن الان، اخبار اليمن اليوم، اخبار اليمن عاجل ,صحافة نت، مصادر نت ,صحافه نت 24 ,الاكثر قراءه,الاكثر زياره,اهم الاخبار,اخبار24']);
//$url=url(['/section/اخبار-اليمن',],'https');
//$this->registerLinkTag(['rel' => 'canonical', 'href' => $url]);
$this->registerLinkTag(['rel' => 'canonical', 'href' => Yii::$app->homeUrl]);

$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('main','siteDesc')]);
?>
<main id="m">
<header>
<h1><a href="<?=Yii::$app->homeUrl?>"> اخبار اليمن الان عاجل </a></h1> 

</header>
	<?php if ($headers ):?>
	
	<?=$this->render('../ads/mobile_top');?>	

	<section>
    <h2>  <a href="/section/اخبار-اليمن" title=" اخبار الصحافه اليمنيه من اهم المصادر"><strong style="color:#ffebcd"> اخبار اليمن </strong></a> الاكثر قراءه</h2>

		<?php  if ($headers ) foreach($headers as $entry)
	echo \Yii::$app->controller->renderPartial('../_part/_entry',['entry'=>$entry]);
	?>
		 	
	</section>
	<?php endif;?>
	<section  >
		<h2>اخبار اليمن من اهم المصادر</h2>
		   <?php 
		      foreach($items as $entry)
	          echo \Yii::$app->controller->renderPartial('../_part/_item',['entry'=>$entry]);
              if($next)
	     		echo tokens($next['itemDate'].'-'.$next['id'],false,'الصحافه اليمنيه المزيد<<');
					
			?>
	</section>
</main>
<?php 
  echo $this->render('../_part/_aside');
 ?>




