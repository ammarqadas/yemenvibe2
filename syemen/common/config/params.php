<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
	'itemsPerFetch'=> 1,//fetched news for each feed per time 
	'feedsPerTime' => 80, // number of feeds proccessd per time 
	'articlesCat' => 2,
	'articlesWidgetLimit' => 10,
	'feedsPerEach' => 8,
	'upload_dir' =>'/uploads/img/',
	'slugLength' =>6,
	'addUrlExt' =>true,
	'urlExt' => '.html',
	'sourceSlugWordsLimit' => 3,//value or false
	'keyWordsLimit' => 5,
	'newsSlug'=>'news-article',
	'urgentSlug' =>'urgent-news',
	'sitemapFrom' =>'-2 days',
	'sitemapTo' => '-1 seconds',
	
'feedType'=>[1=> 'Yemen News Only',2=>'General News',3=>'Articles',4=>'Not Yemen News'],
'resTrend'=>[1=> 'No Trend',2=>'Houthi Trend',3=>'Sharia Trend',4=>'takamol hosting',],
'trendBeforeDate'=>[0=> 'Now',1=> 'Today',2=>'Tow Days',3=>'Three Days',7=>'Week'],

'imgKey'  => '5dae79d7bd0b0d8959d0a67ccdfd9c6201ac99233929aea03dac4b3a95da705f',
	'imgSalt' => '9e5375e3cef4283a8ce240006320e2a08fc9fc58ba8a62d2285cf7075173c02a',
	'imgExt' => 'webp',
//	'imgOptions'=>'fill/160/100/no/1',
//	'imgOptions_h'=>'fill/160/100/no/1',
//	'imgOptions_side'=>'fit/120/90/no/1',
//	'imgOptions_large'=>'fit/400/0/no/1',

	'imgOptions'=>'rs:fill:160:100:no:1',
      'imgOptions_h'=>'rs:fill:160:100:no:1',
      'imgOptions_side'=>'rs:auto:120:90:no:1',
      'imgOptions_large'=>'rs:auto:400:0:no:1',


];
