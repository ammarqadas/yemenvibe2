<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://yemendays.com/posts/1267',
            'body' => array(
                '//div[contains(@class,"gr-element__content")]',
            ),
            'strip' => array(
		'//b',
		'//h1',
		'//a',
		'//script',
            ),
        ),
    ),
);
