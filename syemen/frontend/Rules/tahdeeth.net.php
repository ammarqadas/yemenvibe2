<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://tahdeeth.net/news/79195',
            'body' => array(
                '//div[@class="colsethed3"]',
            ),
            'strip' => array(
        '//div[@class="pageheader"]',
		'//div[@class="widget-title"]',
		'//div[@class="date"]',
		'//ins',
		'//a',
		'//h3',
		'//h1',
		'//script',
		'//div[@class="addthis_sharing_toolbox"]',
		
        ),
    ),
	),
);




 