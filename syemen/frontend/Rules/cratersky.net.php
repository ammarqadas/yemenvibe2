<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://cratersky.net/posts/12017',
            'body' => array(
                '//div[contains(@class,"gr-element__content")]',
            ),
            'strip' => array(
              //  '//img',
            ),
        ),
    ),
);
