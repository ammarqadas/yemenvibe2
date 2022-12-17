<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://yemen-press.com/news112030.html',
            'body' => array(
           //     '//div[contains(@class,"details_body")]/div[@class="news_content"]/div[@class="story_text"]',
            '//div[@class="news_text"]',

			),
            'strip' => array(
                '//img',
				'//div[@class="share-on"]',
				'//strong',
				 '//br',
				 '//a',

            ),
        ),
    ),
);
