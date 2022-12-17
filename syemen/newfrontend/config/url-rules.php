<?php
return [
				//'/' => isMobile()?'items/mindex':'items/index',
				'/' => 'items/index',
			     
				'check/<slug:(.+)>.html' => 'news-article/test' ,
				'post<sep:(/)?><id:\d+><ext:(\.html)?>' => 'post/index',
				'<controller:(news-article|post|urgent-news)>/<slug:(.+)?>.html' => '<controller>/slug',		
				'<controller:(section|source)>/<slug:.+>' => '<controller>/index',
				'<alias:news|article|yemen-news><sep:(/)?><id:\d+><slug:(.+)?><ext:(\.html)?>' => 'news-article/index',

				[
						'class' => 'yii\web\GroupUrlRule',
						'prefix' => '/',
						'rules' => [
						    'اخبار-اليمن-الان' => 'yemen/nownews',
							'اخبار-اليمن-مباشر' => 'yemen/topnews',
							'اخبار-اليمن-اليوم-مباشر' =>'yemen/todaynews',
							'مصادر-اخباريه-يمينه-عربيه' =>'yemen/websites',
							//'index.php' =>isMobile()?'items/mindex':'items/index',
							'index.php' => 'items/index',
							
						//	'<id:\d+>' => 'article/index',
							//'<id:\d+>' => 'article/index',
							
						   
							 ],
				],
				'<controller:(news-article|post|urgent-news)>/<id:\d+><slug:(.+)?><ext:(\.html)?>' => '<controller>/index',	

				'shownews/<id:\d+><slug:(.+)?><ext:(\.html)?>' => 'urgent-news/index',
                'shownews/<slug:(.+)><ext:(\.html)?>' => 'urgent-news/slug',

			    '<controller:(yemen)>/<action:\w+><ext:(\.html)?>' => '<controller>/<action>',
				'posts' => 'post/posts',
				//'sitemap-urgent.xml'=> 'feed/sitemap',

				'tag/<slug:.+>' => 'section/index',
			    'website/<domain:.+>' => 'source/domain',
				'hashtag/<slug:.+>' => 'items/trend',
				'const' => 'items/const',
				//'standalone' => isMobile()?'items/mindex':'items/index',

				//'check' =>'check/redis',//:'check/desktop' ,
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
		//		'<alias:signup|about|contact>' => 'site/<alias>',
		
	      //     '<notfound:.+>' => isMobile()?'items/mindex':'items/index',

				
];




?>