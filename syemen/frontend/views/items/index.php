<?php
use yii\widgets\ListView;
use yii\widgets\LinkPager;
use frontend\components\TrendsWidget;
//use frontend\components\NotifWidget;
use yii\helpers\Html;
use nirvana\jsonld\JsonLDHelper;
$this->registerMetaTag(['name' => 'keywords', 'content' => 'اخبار اليمن، اليمن الان، اخبار اليمن الان، اليمن اليوم، اليمن، اليمن 24 ساعة، المشهد اليمني، صحافة نت، مصادر اليمن,يمن برس,مأرب برس,السجل,الجوف,عدن,تعز,الضالع,ابين,الحديدة,المخا,الامارات,الحوثيين,عفاش,العدوان,التحالف العربي,اخبار24']);
//$this->registerLinkTag(['rel' => 'canonical', 'href' => Yii::$app->homeUrl]);
$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('main','siteDesc')]);
$this->registerMetaTag(['name' => 'refresh', 'content' => '330;  url="https://yemenvibe.com']);
$siteTitle=\Yii::t('main', 'siteTitle',['appName'=>Yii::$app->name]);
$doc = (object)["@type" => "http://schema.org/WebSite","http://schema.org/name" => \Yii::$app->name,"http://schema.org/url" => \Yii::$app->urlManager->hostInfo];
JsonLDHelper::add($doc);
$timestamp=time();
$dateUp=\Yii::$app->formatter->asDatetime($timestamp, 'php:d-M h:i A');
?>
<main id="m">
	<header>

<h1><a href="<?=Yii::$app->homeUrl?>" title="اخر اخبار اليمن  الحدث تاريخ  <?=$dateUp?>"  >اخبار اليمن الان</a></h1> 
	<?php if ($headers )?>
	<?php //foreach($headers as $header) echo \Yii::$app->controller->renderPartial('_header',['entry'=>$header]);
	echo \Yii::$app->controller->renderPartial('../_part/_entry_top',['entry'=>array_shift($headers)]);?>
			</header>

	
	

	<section>

<h2>اهم اخبار  <strong style="color:#ffebcd">اليمن الان</strong></h2>
<?php //if(isDesktop())echo '<div class="in" style="width:100%;"><div>';?>


	<?php  $ih=0;if ($headers ) foreach($headers as $entry){
	echo \Yii::$app->controller->renderPartial('../_part/_entry',['entry'=>$entry]);
	if(++$ih == 1)echo $this->render('../ads/mobile_top');
	
	}?>
	
	
		 <?php  //if(isDesktop()){echo '</div>'; echo $this->render('../ads/side_160x600');echo '</div>';}?>
	<h4><a  title ="اليمن الان اخبار الساعه " class="of more" href="/اخبار-اليمن-مباشر"> اليمن الان اخبار الساعه</a> </h4>

	</section>

	<section >
		<h2> اخبار <strong style="color:#ffebcd">اليمن الان</strong> من اهم المصادر</h2>
		   <?php 
		      foreach($items as $entry){
/*if($entry['thumb']){
$thumb = json_decode($entry['thumb']);
\Yii::error('SMURL::'.$entry['thumb']);
\Yii::error('SMURL SM::'.$thumb->sm);
}*/

	          echo \Yii::$app->controller->renderPartial('../_part/_item',['entry'=>$entry]);
		
 }?>
		<h4><a  title ="اخر اخبار اليمن الان العاجله" class="of more" href="/اخبار-اليمن-الان">اخبار اليمن الان عاجل</a></h4>
	</section>
		



</main>
<?php 
  echo $this->render('../_part/_aside');
 ?>




