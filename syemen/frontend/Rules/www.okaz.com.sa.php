<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.okaz.com.sa/news/local/2020308',
            'body' => array(
                '//div[@class="bodyText"]',
            ),
            'strip' => array(
                '//img',
				'//div[@class="clear"]',
				'//div[@class="pagingWrap"]',
				//'//img',
				
				
            ),
        ),
    ),
);
