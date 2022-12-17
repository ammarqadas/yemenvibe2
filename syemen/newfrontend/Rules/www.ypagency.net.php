<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://www.ypagency.net/138769',
            'body' => array(
                '//div[@class="single-container"]/div[contains(@class,"entry-content")]',
            ),
            'strip' => array(
                '//div[@class="news_details"]/div/div[last()]',
            ),
        ),
    ),
);
