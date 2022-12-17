<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://alwattan.net/news/87782',
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
