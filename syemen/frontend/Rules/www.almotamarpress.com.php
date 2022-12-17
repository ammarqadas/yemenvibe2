<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.hunaaden.net/news52428.html',
            'body' => array(
                '//div[@class="story_text"]',
            ),
            'strip' => array(
              //  '//div[@class="news_details"]/div/div[last()]',
			 // '//img',
			 ),
        ),
    ),
);
