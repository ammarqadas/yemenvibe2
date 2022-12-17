<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.almashhad-alyemeni.com/123454',
            'body' => array(
                '//article',
            ),
            'strip' => array(
                '//div[@class]',
               '//figure',
               '//span',
               '//link',
                '//script',
            ),
        ),
    ),
);
