<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.shabab-news.com/news4532.html',
            'body' => array(
        //'//div[contains(@class,"details_body")]/div[@class="news_content"]/div[@class="story_text"]',
        //  '//div[@class="news_content"]/div[@class="story_text"]',
       //  '//div[@class="right_side"]/div[@class="news_content"]/div[@class="story_text"]',
            '//div[@class="story_text"]',
            ),
            'strip' => array(
                '//img',
				'//a',
				'//div[@style]',
            ),
        ),
    ),
);
