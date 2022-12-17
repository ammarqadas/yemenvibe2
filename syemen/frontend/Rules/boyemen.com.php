<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://boyemen.com/news81764.html',
            'body' => array(
                '//div[@class="story_text"]',
            ),
            'strip' => array(
               // '//div[@class="news_details"]/div/div[last()]',
			   '//img',
			   '//a',
			  '//script',
              '//p/strong',
              '//p/a',
            ),
        ),
    ),
);
