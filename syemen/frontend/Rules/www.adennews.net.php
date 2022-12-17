<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.adennews.net/106810',
            'body' => array(
                '//div[contains(@class,"entry-news")]',
            ),
            'strip' => array(
                '//div[@class="yarpp-related"]',
            ),
        ),
    ),
);
