<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.almashhadalan.com/news25317.html',
           'body' => array(
                '//div[@class="story_text"]',
            ),
            'strip' => array(
                '//img',
				'//div[@style]',
				'//strong',
				 '//br', 
				 '//script',
            ),
        ),
    ),
);
