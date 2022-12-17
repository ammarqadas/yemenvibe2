<?php
return [
    'adminEmail' => 'admin@example.com',
	'ydate1' => '-2 days',
	'ydate2' => '-1 days ',
	'yItemLimit' => 8,
	'topnewsTime' => '-3 hours', // number of feeds proccessd per time 
	'topnewsLimit' => 5, // number of feeds proccessd per time 
	'pageCount' => 3,
	'ItemsPerPage' => 50,
	//'ItemsPerPage' =>['desktop'=> 50,'mobile' => 40],
	'FeedItems' => 10,
	'entryImg' => '100x',
	'headerImg' => '130x',
	'detailImg' => '300x',
	'sideWidgetImg'=>'100x',
	'imgKey'  => '5dae79d7bd0b0d8959d0a67ccdfd9c6201ac99233929aea03dac4b3a95da705f',
	'imgSalt' => '9e5375e3cef4283a8ce240006320e2a08fc9fc58ba8a62d2285cf7075173c02a',
	'imgExt' => 'webp',
//	'imgOptions'=>'fill/160/100/no/1',
//	'imgOptions_h'=>'fill/160/100/no/1',
//	'imgOptions_side'=>'fit/120/90/no/1',
//	'imgOptions_large'=>'fit/400/0/no/1',
	//'imgOptions_large'=>'360x,q75',
	'TopicWhere' =>' -2 days ',
	'SourceWhere' =>'-5 days',
	'TodayLimit' =>'-1 days',
	'NowNewsLimit' =>'-2 hours',
	'TopNewsLimit' =>'-6 hours',
	'PageLimitCount' =>'10',
	'homeLinks'=>require __DIR__ . '/homeLinks.php',
	
	'defImage'=>'data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=',
];
