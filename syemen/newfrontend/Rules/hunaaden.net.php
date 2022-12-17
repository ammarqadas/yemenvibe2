<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://hunaaden.net/news57738.html',
            'body' => array(
             '//div[@class="news-contint"]/div[@class="news_text"]',
            ),
            'strip' => array(
                '//img',
				  '//h1',
				'//div[@style]',
				
            ),
        ),
    ),
);
