<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://ahdathnet.net/news5760.html',
            'body' => array(
           //     '//div[contains(@class,"details_body")]/div[@class="news_content"]/div[@class="story_text"]',
            //'//div[@class="news-contint"]/div[@id="article"]/div[@class="news_text"]',
            '//div[@class="news_text"]',


			),
            'strip' => array(
              //  '//img',
			//	'//div[@style]',
			//	'//div[@id]',
				'//span',
				'//a'
				

            ),
        ),
    ),
);
