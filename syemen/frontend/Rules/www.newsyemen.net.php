<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.newsyemen.net/news36444.html',
            'body' => array(
                '//h2[@class="newDiscription"]',
				//'//div[contains(@class,"content")]'
            ),
            'strip' => array(
               // '//div[@class="screen-all"]',
            ),
        ),
    ),
);
