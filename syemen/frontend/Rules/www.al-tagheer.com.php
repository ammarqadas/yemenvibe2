<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.al-tagheer.com/news104010.html',
            'body' => array(
                '//div[@class="story_text"]',
            ),
            'strip' => array(
             //   '//div[@class="news_details"]/div/div[last()]',
            ),
        ),
    ),
);
