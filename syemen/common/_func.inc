<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\ArrayHelper;
use common\components\FeedsHelper;
//use common\components\Mobile_Detect;
include "Mobile_Detect.php";
$curl = curl_init();
function url($url = ’’, $scheme = false)
{
return Url::to($url, $scheme);
}

function h($text)
{
return Html::encode($text);
}
function ph($text)
{
return HtmlPurifier::process($text);
}
function t($message, $params = [], $category = "main", $language = null)
{
return Yii::t($category, $message, $params, $language);
}
function param($name, $default = null)
{
return ArrayHelper::getValue(Yii::$app->params, $name, $default);
}
function qstr($param,$default=0)
{
		return \Yii::$app->getRequest()->getQueryParam($param)??$default;

}
function tokens($token,$ptoken=false,$title='المزيد من الاخبار>> ')
{
$path=\Yii::$app->request->pathInfo;
//$tok .=($ptoken)?'<li><a href="/'.$path.'?ptoken='.$ptoken.'">السابق</a></li>':NULL;
return '<div class="cent"><h4><a title ="next" "class="of more" href="/'.$path.'?token='.$token.'">'.$title.'</a></h4></div>';
}
//		<h4><a title ="next" "class="of more" href=" من الاخبار العاجله

function mc($str,$append="+")
	{
		$words =array_map('trim', preg_split("/[\n,]+/",$str));
		$words =  preg_filter('/^/', $append, array_filter($words));
		//echo $str;
		//print_r($words);//777331907
		
		return implode(' ',$words);
	}
function itemUrl($id,$slug,$prefix='news-article')
{
$link=(empty($slug))?$id:$slug;
$url='/'.$prefix.'/'.$link;
$url .=(param('addUrlExt'))? param('urlExt'):NULL; 
return $url;
//return url([$url]);
}
function an($text)
{

$text= preg_replace("/[[:punct:]]/u", ' ', $text);
$text= preg_replace("/[^[:alnum:][:space:]]/u", '', $text);
$text=preg_replace('/&.+?;/', '', $text);
return preg_replace('/\s+/', ' ', $text);

}
function home()
{
//Yii::setAlias('@home', '');
return Url::to('https://yemenvibe.com');

}
function get64BitNumber($str)
{
    return gmp_strval(gmp_init(substr(md5($str), 0, 16), 16), 10);
}
function assets()
{
//Yii::setAlias('@home', '');
//return Url::to('https://s.yemenvibe.com');
return Url::to('/a');
}

function isMobile()
{
$detect = new Mobile_Detect();
return $detect->isMobile();
return false;// \Yii::$app->devicedetect->isMobile();
}
function isDesktop()
{return !isMobile();}

function topWords($title,$limit=10)
{
$wordArr=FeedsHelper::topWords(an($title),$limit);
return  implode(" ",$wordArr);

}
function words($string,$cnt=20)
{
//return \yii\helpers\StringHelper::truncateWords(an(strip_tags($string)),$cnt);
return h(\yii\helpers\StringHelper::truncateWords(an(strip_tags($string)),$cnt));
}
function at($arr)
{
foreach($arr as $k=>$v)
$arr[$k]=t($v);
return $arr;
}
function keywords($title)
{ //$wordArr=array_chunk(FeedsHelper::topWords(an($title),param('keyWordsLimit')),3);
	//$words=array();
	//foreach($wordArr as $arr)$words[]=implode(' ',$arr);
return  implode(",",FeedsHelper::topWords(an($title),param('keyWordsLimit')));
}
function isFound($url){

global $curl;
if(empty($url))return false;



curl_setopt_array($curl, array(    
    CURLOPT_URL => $url,
    CURLOPT_HEADER => 0,
CURLOPT_TIMEOUT =>2,
CURLOPT_CONNECTTIMEOUT =>1,

//CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
    CURLOPT_RETURNTRANSFER => 0,
//CURLOPT_ENCODING =>'',
    CURLOPT_NOBODY => 1));
curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//\Yii::error('httpcode:'.$httpCode);
if( $httpCode == 200 ){return true;}

//$header = explode("\n", curl_exec($curl));
//curl_close($curl);
    //$header=get_headers($url);
	//return strpos($header[0],"200");
}

function imgUrl($url,$option)
{
if(empty($url))return;
return 'https://img.yemenvibe.com/'.$option.'/'.$url;
}
function cleanWords($string,$remove)
{
 return array_diff(explode(' ',$string),explode(' ',$remove));

}
function getTitle($title,$remove,$limit=12)
{
$string_array=array_unique(cleanWords($title,$remove));
$truncated_array = array_slice($string_array,0,$limit);
 $truncated_string=implode(' ',$truncated_array);
return implode(' ',$truncated_array);

}
function getDesc($desc,$remove,$limit=30)
{
   $string_array=cleanWords(an(strip_tags($desc)),$remove);
$st=(count($string_array)> $limit)? 3:0;
   $truncated_array = array_slice($string_array,$st,$limit);
   //print_r($truncated_array);
   return implode(' ',$truncated_array);

}
function imgUrl2($url,$processing_options,$extension)
{
if(empty($url))return false;

$keyBin = pack("H*" , param('imgKey'));
if(empty($keyBin)) die('Key expected to be hex-encoded string');	
$saltBin = pack("H*" , param('imgSalt'));
if(empty($saltBin)) die('Salt expected to be hex-encoded string');

$encodedUrl = rtrim(strtr(base64_encode($url), '+/', '-_'), '=');
$path = "/{$processing_options}/{$encodedUrl}.{$extension}";
$signature = rtrim(strtr(base64_encode(hash_hmac('sha256', $saltBin.$path, $keyBin, true)), '+/', '-_'), '=');
$img = sprintf("https://img.yemenvibe.com/%s%s", $signature, $path);
return $img;
}
function cleanHtml($content)
{

  $replace = array(
        //remove tabs before and after HTML tags
        '/\>[^\S ]+/s'   => '>',
        '/[^\S ]+\</s'   => '<',
        //shorten multiple whitespace sequences; keep new-line characters because they matter in JS!!!
        '/([\t ])+/s'  => ' ',
        //remove leading and trailing spaces
        '/^([\t ])+/m' => '',
        '/([\t ])+$/m' => '',
        // remove JS line comments (simple only); do NOT remove lines containing URL (e.g. 'src="http://server.com/"')!!!
        '~//[a-zA-Z0-9 ]+$~m' => '',
        //remove empty lines (sequence of line-end and white-space characters)
        '/[\r\n]+([\t ]?[\r\n]+)+/s'  => "\n",
        //remove empty lines (between HTML tags); cannot remove just any line-end characters because in inline JS they can matter!
        '/\>[\r\n\t ]+\</s'    => '><',
        //remove "empty" lines containing only JS's block end character; join with next line (e.g. "}\n}\n</script>" --> "}}</script>"
        '/}[\r\n\t ]+/s'  => '}',
        '/}[\r\n\t ]+,[\r\n\t ]+/s'  => '},',
        //remove new-line after JS's function or condition start; join with next line
        '/\)[\r\n\t ]?{[\r\n\t ]+/s'  => '){',
        '/,[\r\n\t ]?{[\r\n\t ]+/s'  => ',{',
        //remove new-line after JS's line end (only most obvious and safe cases)
        '/\),[\r\n\t ]+/s'  => '),',
        //remove quotes from HTML attributes that does not contain spaces; keep quotes around URLs!
        '~([\r\n\t ])?([a-zA-Z0-9]+)="([a-zA-Z0-9_/\\-]+)"([\r\n\t ])?~s' => '$1$2=$3$4', //$1 and $4 insert first white-space character found before/after attribute
    );
    $content = preg_replace(array_keys($replace), array_values($replace), $content);

    //remove optional ending tags (see http://www.w3.org/TR/html5/syntax.html#syntax-tag-omission )
    $remove = array(
        '</option>', '</li>', '</dt>', '</dd>', '</tr>', '</th>', '</td>'
    );
    return str_ireplace($remove, '', $content);
}
?>