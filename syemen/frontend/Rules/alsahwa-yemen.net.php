<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://alsahwa-yemen.net/p-27916',
            'body' => array( 
                '//div[@class="entry-box"]/div[@class="entry-content"]',
            ),
            'strip' => array(
              //  '//div[@class="news_details"]/div/div[last()]',
			  '//a',
			  '//h2'
			  
            ),
        ),
    ),
);
