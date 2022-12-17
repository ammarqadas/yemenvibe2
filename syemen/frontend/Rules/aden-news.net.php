<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://aden-news.net/aden-56382',
            'body' => array(
                '//div[contains(@class,"entry-news")]',
            ),
            'strip' => array(
                '//div[@class="related-inside-wrap"]',
            ),
        ),
    ),
);
