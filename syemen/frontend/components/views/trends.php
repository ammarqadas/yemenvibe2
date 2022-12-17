<?php 
foreach($ress as $entry)
//echo '<a href="/hashtag/'.$entry['slug'].'">'.$entry['title'].'</a></li>';
	echo '<h1><a href="'.\Yii::$app->homeUrl.'hashtag/'.$entry['slug'].'">'.$entry['title'].'</a></h1>';
?>

