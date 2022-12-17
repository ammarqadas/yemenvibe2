<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://ababiil.net/yemen-news/189543.html',
            'body' => array(
                '//div[@class="news_text"]',
				//'//div[contains(@class,"content")]'
            ),
            'strip' => array(
                '//div[@style]',
            ),
        ),
    ),
);
