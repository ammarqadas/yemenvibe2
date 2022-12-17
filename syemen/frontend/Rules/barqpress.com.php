<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://barqpress.com/archives/114645',
            'body' => array(
                '//div[@class="post-inner"]/div[@class="entry"]',
            ),
            'strip' => array(
         //       '//img',
            '//a',
            '//strong',
            ),
        ),
    ),
);
