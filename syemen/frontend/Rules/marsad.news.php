<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://marsad.news/news/65896',
            'body' => array(
                '//div[@class="colsethed3"]',
            ),
            'strip' => array(
'//div[@class="pageheader"]',
		'//div[@class="widget-title"]',
		'//div[@class="date"]',
		'//ins',
		'//h3',
		'//a',
		'//script',
		'//div[@class="addthis_sharing_toolbox"]',            ),
        ),
    ),
);
