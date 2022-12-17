<article>
<h3><?php $url="post/".$post['id'];
$title=words($post['title'],18);
$t1=words($post['title'],10);
echo \yii\helpers\Html::a($title,Yii::$app->homeUrl.$url,['target' => '_blank','title'=> $t1])?></h3>
<div class="i0">
<div class="inf">

<?php if($post['views']):?>

<span class="i-e"></span><span class="cnt"><?=\Yii::t('main','read',$post['views'])?></span> 

<?php endif;?>
</div>
<div class="t">
 <i class="i-c" aria-hidden="true"></i>
<?php $idate=\Yii::$app->formatter->asDatetime($post['created_at'], 'php:d-M h:i A');?>
<time title="<?=$idate?>" datetime="seconds: <?=$post['created_at']?>">
 <?= \common\components\TwitterHelper::time_ago($post['created_at'])?>
</time>
</div>



</div>
<?php $cont1=words($post['content'],30); if (!empty($post['img'])){?>
<div class ="rN2">
<img class="av" alt="<?=$t1?>" src="<?=param('defImage')?>" data-src="<?=imgUrl2(url([param('upload_dir').$post['img'],],true),param('imgOptions'),param('imgExt'))?>"/>
<p>
<?=$cont1?> </p>
</div>
<?php }else{?>
<p><?=$cont1?> </p>
<?php } ;?>
<div class="i0">
<div class="cnts">
</div>
<?php $url=url(['/post/'.$post['id'],],true);?>
 <?=$this->render('../_part/_share',['url'=>$url,'title'=>$post['title']])?>

 </div>
    </article>
   
