<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.almotamarpress.com/news9079.html',
            'body' => array(
                '//div[@class="story_text"]',
            ),
            'strip' => array(
              //  '//div[@class="news_details"]/div/div[last()]',
			  '//img',
			 ),
        ),
    ),
);
