<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.expatriatesvoice.com/news3116.html',
            'body' => array(
           //     '//div[contains(@class,"details_body")]/div[@class="news_content"]/div[@class="story_text"]',
            '//div[@class="story_text"]',

			),
            'strip' => array(
                '//img',
				'//div[@style]',
				'//strong',
				 '//br',
				 '//p/a',

            ),
        ),
    ),
);
