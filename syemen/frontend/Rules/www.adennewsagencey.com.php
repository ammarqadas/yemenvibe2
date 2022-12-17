<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://www.adennewsagencey.com/27864/',
            'body' => array(
             //   '//div[@propname="articleBody"]/div[contains(@class,"gr-element__content")]',
                '//div[@propname="articleBody"]',
            ),
            'strip' => array(
             //   '//img',
				'div[contains(@class,"addtoany_content_bottom")',
            ),
        ),
    ),
);
