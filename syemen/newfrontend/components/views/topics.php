<ul><?php 
foreach($ress as $entry)
echo '<li><a title ="'.$entry['title'].'" href="/section/'.$entry['slug'].'">'.$entry['title'].'</a></li>';

?>
</ul>

