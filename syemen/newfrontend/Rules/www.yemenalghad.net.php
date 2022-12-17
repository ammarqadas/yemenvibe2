<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.yemenalghad.net/news24389.html',
            'body' => array(
                '//div[@class="story_text"]',
            ),
            'strip' => array(
                //'//div[@class="news_details"]/div/div[last()]',
				'//img',
			     '//a',
				 // '//div[@id]',
				 // '//div[@class]'
				  
            ),
        ),
    ),
);
