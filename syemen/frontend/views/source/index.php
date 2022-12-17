<?php
use yii\widgets\LinkPager;
use frontend\components\Res2Widget;
use frontend\components\YemenWidget;

use yii\helpers\Html;
$source='/source/'.preg_replace('/\s+/', '-', $rName);
$url=url([$source,],'https');
$keyword=\Yii::t('main','resKeyword',['resName'=>$rName]);
$this->title= \Yii::t('main','resTitle',['resName'=>$rName,'appName'=>Yii::$app->name]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $keyword]);
$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('main','resDesc',['resName'=>$rName])]);
$this->registerLinkTag(['rel' => 'canonical', 'href' => $url]);
//$this->registerMetaTag(['name' => 'robots', 'content' => 'nofollow']);

?>
<main>
	<header><h1> اخبار <?=$rName?></h1> : <h2>اخر اخبار موقع <strong><?=$rName?></strong> العاجله</h2></header>

	<?=$this->render('../ads/mobile_top');?>	

	    <section>
		<?php
			$hitm=5;
		$i2=0;

		foreach($res as $entry)
		{
			$layout=( $i2++ <$hitm )?"../_part/_entry":"_rItem";
	     echo \Yii::$app->controller->renderPartial($layout,['entry'=>$entry]);
	    	//if($i++ = 5) 
          //echo $this->render('../ads/mpi_index_right');
		}
		if($next)
			echo tokens($next['itemDate'].'-'.$next['id'],false,$rName.' التالي >>');
?>
	</section>

</main>
<aside id="l">




<section id="y" >
			<?php if ($this->beginCache("hasad250", ['duration' => 1200])) {
echo YemenWidget::widget(['fromDate'=>' -5hours','toDate'=>'-1  hours','limit'=>5]);
	$this->endCache();
	}?>
</section>
</aside>

<script>
const ads =(url)=>{return new Promise((res,rej) => {let s =document.createElement('script');s.type='text/javascript';s.src=url;s.addEventListener('load',()=>res(s),false);s.addEventListener('error',(e)=>{console.log('loading ads fail:'+e.message);rej(s)},false);document.body.appendChild(s);});};
ads("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js").then(()=>{(adsbygoogle=window.adsbygoogle||[]).push({})});
</script>




