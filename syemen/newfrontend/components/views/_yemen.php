<article>
	<h3><?php 
	//$url=(!empty($entry['slug']))?"news/".$entry['id'].'-'.$entry['slug']: "news".$entry['id'];
$url=itemUrl($entry['id'],$entry['slug']);

$title=words($entry['title'],25);
echo \yii\helpers\Html::a($title,$url)?>

</h3>

</article>
   
