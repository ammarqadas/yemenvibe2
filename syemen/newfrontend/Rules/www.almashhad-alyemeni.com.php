<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.almashhad-alyemeni.com/123454',
            'body' => array(
                '//article',
            ),
            'strip' => array(
         '//div[@class="MobileShareBar"] or div[@class="banner"] or div[@class="sharetable"]',
               '//figure',
               '//span',
               '//link',
                '//script',
				'//time',
				'//h1',
				'//img',
				'//a[@id="totopictop"]',
				
				
            ),
        ),
    ),
);
