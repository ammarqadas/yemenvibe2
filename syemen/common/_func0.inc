<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\ArrayHelper;
use common\components\FeedsHelper;
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
return preg_replace("/[^[:alnum:][:space:]]/u", '', $text);
}
function home()
{
//Yii::setAlias('@home', '');
return Url::to('https://yemenvibe.com');

}
function assets()
{
//Yii::setAlias('@home', '');
//return Url::to('https://s.yemenvibe.com');
return Url::to('/static');
}

function isMobile()
{return \Yii::$app->devicedetect->isMobile();}
function isDesktop()
{return !isMobile();}
function keywords($title)
{
   $wordArr=FeedsHelper::remove_words(an($title));
     uasort($wordArr, function($a, $b) {
				//return strlen($b) <=> strlen($a);
				 return mb_strlen($b)-mb_strlen($a);
					});
		$wordArr= array_slice($wordArr,0,param('keyWordsLimit'));			
return  implode(",",$wordArr);
}
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
function isFound($url){
if(empty($url))return ;

    $header=get_headers($url);
	return strpos($header[0],"200");
}

function imgUrl($url,$option)
{
if(empty($url))return;
return 'https://img.yemenvibe.com/'.$option.'/'.$url;
}

function imgUrl2($url,$processing_options,$extension)
{
$keyBin = pack("H*" , param('imgKey'));
if(empty($keyBin)) die('Key expected to be hex-encoded string');	
$saltBin = pack("H*" , param('imgSalt'));
if(empty($saltBin)) die('Salt expected to be hex-encoded string');

$encodedUrl = rtrim(strtr(base64_encode($url), '+/', '-_'), '=');
$path = "/{$processing_options}/{$encodedUrl}.{$extension}";
$signature = rtrim(strtr(base64_encode(hash_hmac('sha256', $saltBin.$path, $keyBin, true)), '+/', '-_'), '=');
return sprintf("https://img.yemenvibe.com/%s%s", $signature, $path);

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