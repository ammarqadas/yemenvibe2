<?php
namespace common\components;
use yii\helpers\ArrayHelper;
use DateTime;
use DateTimeZone;
 
class FeedsHelper  {
public static $StopWords="شاهد;وردنا;،;ء;ءَ;آ;آب;آذار;آض;آل;آمينَ;آناء;آنفا;آه;آهاً;آهٍ;آهِ;أ;أبدا;أبريل;أبو;أبٌ;أجل;أجمع;أحد;أخبر;أخذ;أخو;أخٌ;أربع;أربعاء;أربعة;أربعمئة;أربعمائة;أرى;أسكن;أصبح;أصلا;أضحى;أطعم;أعطى;أعلم;أغسطس;أفريل;أفعل به;أفٍّ;أقبل;أكتوبر;أل;ألا;ألف;ألفى;أم;أما;أمام;أمامك;أمامكَ;أمد;أمس;أمسى;أمّا;أن;أنا;أنبأ;أنت;أنتم;أنتما;أنتن;أنتِ;أنشأ;أنه;أنًّ;أنّى;أهلا;أو;أوت;أوشك;أول;أولئك;أولاء;أولالك;أوّهْ;أى;أي;أيا;أيار;أيضا;أيلول;أين;أيّ;أيّان;أُفٍّ;ؤ;إحدى;إذ;إذا;إذاً;إذما;إذن;إزاء;إلى;إلي;إليكم;إليكما;إليكنّ;إليكَ;إلَيْكَ;إلّا;إمّا;إن;إنَّ;إى;إياك;إياكم;إياكما;إياكن;إيانا;إياه;إياها;إياهم;إياهما;إياهن;إياي;إيهٍ;ئ;ا;ا?;ا?ى;االا;االتى;ابتدأ;ابين;اتخذ;اثر;اثنا;اثنان;اثني;اثنين;اجل;احد;اخرى;اخلولق;اذا;اربعة;اربعون;اربعين;ارتدّ;استحال;اصبح;اضحى;اطار;اعادة;اعلنت;اف;اكثر;اكد;الآن;الألاء;الألى;الا;الاخيرة;الان;الاول;الاولى;التى;التي;الثاني;الثانية;الحالي;الذاتي;الذى;الذي;الذين;السابق;الف;اللاتي;اللتان;اللتيا;اللتين;اللذان;اللذين;اللواتي;الماضي;المقبل;الوقت;الى;الي;اليه;اليها;اليوم;اما;امام;امس;امسى;ان;انبرى;انقلب;انه;انها;او;اول;اي;ايار;ايام;ايضا;ب;بؤسا;بإن;بئس;باء;بات;باسم;بان;بخٍ;بد;بدلا;برس;بسبب;بسّ;بشكل;بضع;بطآن;بعد;بعدا;بعض;بغتة;بل;بلى;بن;به;بها;بهذا;بيد;بين;بَسْ;بَلْهَ;ة;ت;تاء;تارة;تاسع;تانِ;تانِك;تبدّل;تجاه;تحت;تحوّل;تخذ;ترك;تسع;تسعة;تسعمئة;تسعمائة;تسعون;تسعين;تشرين;تعسا;تعلَّم;تفعلان;تفعلون;تفعلين;تكون;تلقاء;تلك;تم;تموز;تينك;تَيْنِ;تِه;تِي;ث;ثاء;ثالث;ثامن;ثان;ثاني;ثلاث;ثلاثاء;ثلاثة;ثلاثمئة;ثلاثمائة;ثلاثون;ثلاثين;ثم;ثمان;ثمانمئة;ثمانون;ثماني;ثمانية;ثمانين;ثمنمئة;ثمَّ;ثمّ;ثمّة;ج;جانفي;جدا;جعل;جلل;جمعة;جميع;جنيه;جوان;جويلية;جير;جيم;ح;حاء;حادي;حار;حاشا;حاليا;حاي;حبذا;حبيب;حتى;حجا;حدَث;حرى;حزيران;حسب;حقا;حمدا;حمو;حمٌ;حوالى;حول;حيث;حيثما;حين;حيَّ;حَذارِ;خ;خاء;خاصة;خال;خامس;خبَّر;خلا;خلافا;خلال;خلف;خمس;خمسة;خمسمئة;خمسمائة;خمسون;خمسين;خميس;د;دال;درهم;درى;دواليك;دولار;دون;دونك;ديسمبر;دينار;ذ;ذا;ذات;ذاك;ذال;ذانك;ذانِ;ذلك;ذهب;ذو;ذيت;ذينك;ذَيْنِ;ذِه;ذِي;ر;رأى;راء;رابع;راح;رجع;رزق;رويدك;ريال;ريث;رُبَّ;ز;زاي;زعم;زود;زيارة;س;ساء;سابع;سادس;سبت;سبتمبر;سبحان;سبع;سبعة;سبعمئة;سبعمائة;سبعون;سبعين;ست;ستة;ستكون;ستمئة;ستمائة;ستون;ستين;سحقا;سرا;سرعان;سقى;سمعا;سنة;سنتيم;سنوات;سوف;سوى;سين;ش;شباط;شبه;شتانَ;شخصا;شرع;شمال;شيكل;شين;شَتَّانَ;ص;صاد;صار;صباح;صبر;صبرا;صدقا;صراحة;صفر;صهٍ;صهْ;ض;ضاد;ضحوة;ضد;ضمن;ط;طاء;طاق;طالما;طرا;طفق;طَق;ظ;ظاء;ظل;ظلّ;ظنَّ;ع;عاد;عاشر;عام;عاما;عامة;عجبا;عدا;عدة;عدد;عدم;عدَّ;عسى;عشر;عشرة;عشرون;عشرين;عل;علق;علم;على;علي;عليك;عليه;عليها;علًّ;عن;عند;عندما;عنه;عنها;عوض;عيانا;عين;عَدَسْ;غ;غادر;غالبا;غدا;غداة;غير;غين;ـ;ف;فإن;فاء;فان;فانه;فبراير;فرادى;فضلا;فقد;فقط;فكان;فلان;فلس;فهو;فو;فوق;فى;في;فيفري;فيه;فيها;ق;قاطبة;قاف;قال;قام;قبل;قد;قرش;قطّ;قلما;قوة;ك;كأن;كأنّ;كأيّ;كأيّن;كاد;كاف;كان;كانت;كانون;كثيرا;كذا;كذلك;كرب;كسا;كل;كلتا;كلم;كلَّا;كلّما;كم;كما;كن;كى;كيت;كيف;كيفما;كِخ;ل;لأن;لا;لا سيما;لات;لازال;لاسيما;لام;لايزال;لبيك;لدن;لدى;لدي;لذلك;لعل;لعلَّ;لعمر;لقاء;لكن;لكنه;لكنَّ;للامم;لم;لما;لمّا;لن;له;لها;لهذا;لهم;لو;لوكالة;لولا;لوما;ليت;ليرة;ليس;ليسب;م;مئة;مئتان;ما;ما أفعله;ما انفك;ما برح;مائة;ماانفك;مابرح;مادام;ماذا;مارس;مازال;مافتئ;ماي;مايزال;مايو;متى;مثل;مذ;مرّة;مساء;مع;معاذ;معه;مقابل;مكانكم;مكانكما;مكانكنّ;مكانَك;مليار;مليم;مليون;مما;من;منذ;منه;منها;مه;مهما;ميم;ن;نا;نبَّا;نحن;نحو;نعم;نفس;نفسه;نهاية;نوفمبر;نون;نيسان;نيف;نَخْ;نَّ;ه;هؤلاء;ها;هاء;هاكَ;هبّ;هذا;هذه;هل;هللة;هلم;هلّا;هم;هما;همزة;هن;هنا;هناك;هنالك;هو;هي;هيا;هيهات;هيّا;هَؤلاء;هَاتانِ;هَاتَيْنِ;هَاتِه;هَاتِي;هَجْ;هَذا;هَذانِ;هَذَيْنِ;هَذِه;هَذِي;هَيْهات;و;و6;وأبو;وأن;وا;واحد;واضاف;واضافت;واكد;والتي;والذي;وان;واهاً;واو;واوضح;وبين;وثي;وجد;وراءَك;ورد;وعلى;وفي;وقال;وقالت;وقد;وقف;وكان;وكانت;ولا;ولايزال;ولكن;ولم;وله;وليس;ومع;ومن;وهب;وهذا;وهو;وهي;وَيْ;وُشْكَانَ;ى;ي;ياء;يفعلان;يفعلون;يكون;يلي;يمكن;يمين;ين;يناير;يوان;يورو;يوليو;يوم;يونيو;ّأيّان;عاجل;هام";

protected function _an($text)
{

$text= preg_replace("/[[:punct:]]/u", ' ', $text);
$text= preg_replace("/[^[:alnum:][:space:]]/u", '', $text);
$text=preg_replace('/&.+?;/', '', $text);
return preg_replace('/\s+/', ' ', $text);

}
static function remove_words($input,$unique_words = true)
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
protected function cleanText($text)
{
        $t=preg_replace('/&.+?;/', '', $text);
	$t= preg_replace("/[[:punct:]]/u", ' ', strip_tags($t));
	$t= preg_replace("/[^[:alnum:][:space:]]/u", '', $t);
//	$t=preg_replace('/&.+?;/', '', $t);
	return preg_replace('/\s+/', ' ', $t);
}
public function topWords($string,$wordLimit=0)
{
	$separator = '-';
     $quoteSeparator = preg_quote($separator, '#');

    $trans = array(
	'\d+:\d+'             => ' ',
     '\d+\/\d+\d+'             => ' ',
	    '^[0-9]+'             => 'عدد\\0',
        '&.+?;'                    => '',
        '[^\w\d _-]'            => ' ',
        '\s+'                    => ' ',
        '('.$quoteSeparator.')+'=> ''
    );
	
	
    foreach ($trans as $key => $val){
	$string = preg_replace('#'.$key.'#iu', $val, $string);
    }
	$string = preg_replace('/\s+/', ' ', $string);
	$string = strtolower($string);
	$wordArr=self::remove_words($string);
	//print_r($wordArr);
	$arr=array();
    if(count($wordArr)> $wordLimit)
	{
		uasort($wordArr, function($a, $b) {
				//return strlen($b) <=> strlen($a);
				 return mb_strlen($b)-mb_strlen($a);
					});
		
		foreach($wordArr as $key=>$val)
		{
		$arr[$key]=$val;
		if(count($arr)>=$wordLimit)
		{
			ksort($arr);
			$wordArr=$arr;
			break;
		}
		
		}
			
//	$wordArr= array_slice($arr,0,$wordLimit);
	}
						

	return $wordArr;
	
}
public static function generateSeoURL($string, $wordLimit = 10)
{
	$separator = '-';
	$wordArr=self::topWords($string,$wordLimit);
return trim(implode ($separator, $wordArr),$separator);

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
	$data['etag']= $feed->getEtag();
	$data['lastChecked']= strtotime(date(DATE_RSS));
	(!empty($feed->getLastModified()))?:$data['lastModified']=strtotime($feed->getLastModified());
	return $data;
}	
public static function getFeedItems($feed,$feedid,$lastDate)
{
	$data2=$data=array();
//echo count($feed->getItems()).' items date:'.$feed->getItems()[0]->date->format(DATE_RSS).' lastDate:'.date('m/d/Y H:i:s', $lastDate); 
//print_r($feed->getItems()[0]);
	if(count($feed->getItems()) and strtotime($feed->getItems()[0]->date->format(DATE_RSS)) > $lastDate)
	foreach($feed->getItems() as $item )
	{
		$itemDate=strtotime($item->date->format(DATE_RSS));
		//echo "item date ".$itemDate ." lastd ".$lastDate."<br>";
		if($itemDate > $lastDate)
		{
			echo "itemdate > lastdate true ";
		$dt=array();
		$dt['feedId']=$feedid;
		$dt['title']=self::cleanText($item->title);
		$dt['url']=$item->url;
		$dt['hashcode']=get64BitNumber($item->url);
		$dt['enclosureUrl']=$item->enclosureUrl ?: (preg_match('/<img [^>]*src="([^"]+)"[^>]*>/i',$item->content,$img)? $img[1] : null);
		//$dt['enclosureUrl']=$item->enclosureUrl?:preg_match('/<img [^>]*src="([^"]+)"[^>]*>/i',$item->content, $img)?$img[1]:null;

		$dt['enclosureType']=$item->enclosureType;
		$dt['content']=self::cleanText($item->content);
		$dt['itemDate']=(strtotime($item->date->format(DATE_RSS))>strtotime(date(DATE_RSS)))?strtotime('0 minutes'):strtotime($item->date->format(DATE_RSS));
		$dt['slug']=self::generateSeoURL($dt['title'],param('slugLength'));
$dt['thumb']='';
if(isFound($dt['enclosureUrl']))
{
$thumb['sm']=imgUrl2($dt['enclosureUrl'],param('imgOptions'),param('imgExt'));
$thumb['md']=imgUrl2($dt['enclosureUrl'],param('imgOptions_large'),param('imgExt'));
$dt['thumb']=json_encode($thumb);//' JSON_OBJECT("sm",'.$sm.',"md",'.$md.')';	
//$dt['thumb']=json_encode($thumb);//' JSON_OBJECT("sm",'.$sm.',"md",'.$md.')';	
}
$data[]=$dt;
		}
		if(count($data) >= \Yii::$app->params['itemsPerFetch'] )return $data;
		
	}
	if(count($data)) return $data;
	return false;
			
}
public static function gmtDate($timestamp)
{
	//return date_format(date_create('@'.$timestamp)->setTimezone(new DateTimeZone('GMT')),DATE_RFC2822);
	return date_format(date_create()->setTimestamp($timestamp)->setTimezone(new DateTimeZone('GMT')),'D, d M Y H:i:s T');
}
	
}
?>
