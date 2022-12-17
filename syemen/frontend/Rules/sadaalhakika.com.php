<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://sadaalhakika.com/news/18897',
            'body' => array(
                '//div[@class="subject_font"]',
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
