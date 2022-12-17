<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://adennews.net/aden-64798',
            'body' => array(
                '//div[contains(@class,"entry-content")]',
            ),
            'strip' => array(
                '//div[@class="subheading"]',
            ),
        ),
    ),
);
