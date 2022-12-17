<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://www.yafa-news.net/archives/439115',
            'body' => array(
                '//div[@class="singlefile"]/div[@class="content"]',
            ),
            'strip' => array(
                '//div[contains(@class,"sharedaddy")]',
				'//noscript',
				'//div[@class="infopost"]',
				'//div[@class="singlebanner"]',
				'//div[@class="tags"]',
				'//img'
				
            ),
        ),
    ),
);
