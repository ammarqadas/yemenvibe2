<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.psa-ye.com/11254',
            'body' => array(
                '//div[contains(@class,"entry-content")]',
				//'//div[contains(@class,"content")]'
            ),
            'strip' => array(
                '//div[@class="mh-loveit-container"]',
             '//div[@class="mh_share_footer"]',
           '//a',
            ),
        ),
    ),
);
