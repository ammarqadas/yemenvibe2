<?php
namespace common\components;
use yii\helpers\ArrayHelper;
use DateTime;
use DateTimeZone;

class FeedsHelper  {
public static $StopWords="";
function remove_words($input,$unique_words = true)
{
	//separate all words based on spaces
	$input_array = explode(' ',$input);
	
	//$slug = explode (' ', $slug);
  $input_array=array_map('trim',$input_array);
  if($unique_words) $input_array=array_unique($input_array); 
 //echo self::$ArStopWords;
 $words_array=explode(';',self::$StopWords);//json_decode(self::$ArStopWords,true);
  //$swords=explode(' ',$stopWords);// json_decode($ArStopWords,true);
  return array_diff($input_array,$words_array);
  
}
public static function generateSeoURL($string, $wordLimit = 0){
    $separator = '-';
     $quoteSeparator = preg_quote($separator, '#');

    $trans = array(
        '&.+?;:!'                    => '',
        '[^\w\d _-]'            => '',
        '\s+'                    => ' ',
        '('.$quoteSeparator.')+'=> ' '
    );
	
	
    foreach ($trans as $key => $val){
        $string = preg_replace('#'.$key.'#i'.(UTF8_ENABLED ? 'u' : ''), $val, $string);
    }
	

    $string = strtolower($string);
	$wordArr=self::remove_words($string);

    if($wordLimit != 0)$wordArr=array_slice($wordArr, 0, $wordLimit);
       
 return  trim(implode ($separator, $wordArr),$separator);
  
}
public static function getFeedData($feed)
{
	$data=array();
	$data['title']=$feed->title;
	$data['description']=$feed->description;
	$data['logo']=$feed->logo;
	$data['lastDate']=strtotime($feed->date->format(DATE_RSS));
	return $data;
}
public static function getFeedStatus($feed)
{
	$data=array();
	$data['etag']=$feed->getEtag();
	$data['lastChecked']=strtotime(date(DATE_RSS));
	(!empty($feed->getLastModified()))?:$data['lastModified']=strtotime($feed->getLastModified());
	return $data;
}	
public static function getFeedItems($feed,$feedid,$lastDate)
{
	$data2=$data=array();

	if(count($feed->getItems()) and strtotime($feed->getItems()[0]->date->format(DATE_RSS)) > $lastDate)
	foreach($feed->getItems() as $item )
	{
		$itemDate=strtotime($item->date->format(DATE_RSS));
		echo "item date ".$itemDate ." lastd ".$lastDate."<br>";
		if($itemDate > $lastDate)
		{
		$dt=array();
		$dt['feedId']=$feedid;
		$dt['title']=$item->title;
		$dt['url']=$item->url;
		$dt['enclosureUrl']=$item->enclosureUrl?:preg_match('/<img [^>]*src="([^"]+)"[^>]*>/i',$item->content, $img)?$img[1]:null;
		$dt['enclosureType']=$item->enclosureType;
		$dt['content']=$item->content;
		$dt['itemDate']=strtotime($item->date->format(DATE_RSS));
		$dt['slug']=self::generateSeoURL($item->title,15);
		$data[]=$dt;
		}
		if(count($data)>= \Yii::$app->params['itemsPerFetch'] )return $data;
		
	}
	return false;
			
}
public static function gmtDate($timestamp)
{
	//return date_format(date_create('@'.$timestamp)->setTimezone(new DateTimeZone('GMT')),DATE_RFC2822);
	return date_format(date_create()->setTimestamp($timestamp)->setTimezone(new DateTimeZone('GMT')),'D, d M Y H:i:s T');
}
	
}
?>