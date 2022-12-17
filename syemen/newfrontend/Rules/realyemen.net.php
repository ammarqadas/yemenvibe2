<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://realyemen.net/19678',
            'body' => array(
            //    '//div[@class="hentry"]/div[contains(@class,"entry-content")]',
				'//div[contains(@class,"herald-entry-content")]'
            ),
            'strip' => array(
                '//div[contains(@class,"herald-ad")]',
				'//h6',
            ),
        ),
    ),
);
