<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://alwattan.net/news/87782',
            'body' => array(
                '//div[@class="colsethed3"]',
            ),
            'strip' => array(
          //      '//div[@class="news_details"]/div/div[last()]',
		//  '//img',
		'//div[@class="pageheader"]',
		'//div[@class="widget-title"]',
		'//div[@class="date"]',
		'//ins',
		'//h3',
		'//a',
		'//script',
		'//div[@class="addthis_sharing_toolbox"]',
		
            ),
        ),
    ),
);
