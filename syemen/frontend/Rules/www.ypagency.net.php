<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://www.ypagency.net/253182',
            'body' => array(
                '//div[@class="single-container"]/article',
            ),
            'strip' => array(
           //    '//div[@class="news_details"]/div/div[last()]',
    '//h1',
    '//div[@class="post-meta-wrap"]',
	'//div[contains(@class,"post-share")]',
    '//div[contains(@class,"post-meta-wrap")]',
            ),
        ),
    ),
);
