<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.mandabpress.com/news54000.html',
            'body' => array(
                '//div[@class="story_text"]',
            ),
            'strip' => array(
                
				 '//div[@style]',
				 '//div[@class="clearfix"]',
				 '//script'
            ),
        ),
    ),
);
