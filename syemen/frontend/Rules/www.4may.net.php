<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://www.4may.net/news/16243',
            'body' => array(
                '//div[@class="colsethed3"]',
            ),
            'strip' => array(
          '//div[@class="pageheader"]',
		'//div[@class="widget-title"]',
		'//div[@class="date"]',
		'//ins',
		'//h3',
		'//h1',
		'//a',
		'//script',
		'//div[@class="addthis_sharing_toolbox"]',
            ),
        ),
    ),
);
