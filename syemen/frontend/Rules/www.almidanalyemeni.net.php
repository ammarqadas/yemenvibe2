<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.almidanalyemeni.net/archives/23194',
            'body' => array(
            '//div[contains(@class,"entry-content")]',
           // '//div[@class="story_text"]',

			),
            'strip' => array(
                '//script',
				//'//div[@class]',
				'//h2',
				'//h3',
				 '//p/strong',
				 '//a',

            ),
        ),
    ),
);
