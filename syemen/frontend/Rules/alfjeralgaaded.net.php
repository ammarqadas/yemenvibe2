<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://alfjeralgaaded.net/news_details.php?lang=arabic&sid=20065',
            'body' => array(
                '//div[@class="news_details"]',
            ),
            'strip' => array(
                '//img',
            ),
        ),
    ),
);
