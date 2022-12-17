<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.yemen-line.com/news3915.html',
            'body' => array(
                '//div[@class="story_text"]',
            ),
            'strip' => array(
         //       '//div[@class="news_details"]/div/div[last()]',
            ),
        ),
    ),
);
