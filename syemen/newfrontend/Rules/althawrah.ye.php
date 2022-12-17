<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://althawrah.ye/archives/594432',
            'body' => array(
                '//div[@class="single-container"]/article/div[contains(@class,"single-post-content")]',
            ),
            'strip' => array(
                '//a',
            ),
        ),
    ),
);
