<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://almawqeapost.net/news/48256',
            'body' => array(
                '//div[@class="description"]',
            ),
            'strip' => array(
             // '//div[@class="news_details"]/div/div[last()]',
            '//div[contains(@class,"follow-us")]',
            '//div[contains(@class,"tag-cloud")]',
           // '//div[@class="news_details"]/div/div[last()]',
            ),
        ),
    ),
);
