<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.sabanew.net/viewstory/42675',
            'body' => array(
                '//div[@id="content"]',
            ),
            'strip' => array(
                '//div[@style="*"]',
				 '//a',
				 '//img',
            ),
        ),
    ),
);
