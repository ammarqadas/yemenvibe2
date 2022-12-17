<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://anaweenpost.com/archives/29901',
            'body' => array(
                '//article/div[contains(@class,"entry-content")]',
            ),
            'strip' => array(
             //   '//div[@class="news_details"]/div/div[last()]',
			 '//img',
			 '//div[@class]',
			 '//a',
			 '//ul',
			 
            ),
        ),
    ),
);
