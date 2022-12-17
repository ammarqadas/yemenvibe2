<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.alaraby.co.uk/medianews/2019/3/16/%D9%81%D9%8A%D8%B3%D8%A8%D9%88%D9%83-%D8%AA%D9%83%D8%AB%D9%81-%D8%AC%D9%87%D9%88%D8%AF%D9%87%D8%A7-%D9%81%D9%8A-%D9%85%D9%83%D8%A7%D9%81%D8%AD%D8%A9-%D8%A7%D9%84%D8%A5%D8%A8%D8%A7%D8%AD%D9%8A%D8%A9-%D8%A7%D9%84%D8%A7%D9%86%D8%AA%D9%82%D8%A7%D9%85%D9%8A%D8%A9',
            'body' => array(
                '//div[contains(@class,"DP-MainText")]',
            ),
            'strip' => array(
               '//div[@class="mceNonEditable"]',
			//  '//img',
			  '//div[contains(@class,"fb-twitter-container")]',
            ),
        ),
    ),
);
