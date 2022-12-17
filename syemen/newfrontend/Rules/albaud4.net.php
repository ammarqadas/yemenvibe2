<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://albaud4.net/news/4301',
            'body' => array(
                '//div[@class="colsethed3"]/div[@class="content"]',
            ),
            'strip' => array(
          //      '//div[@class="news_details"]/div/div[last()]',
		  '//img',
            ),
        ),
    ),
);
