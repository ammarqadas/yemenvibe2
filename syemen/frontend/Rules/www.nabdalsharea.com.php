<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.nabdalsharea.com/news35425.html',
            'body' => array(
                '//div[@class="story_text"]',
            ),
            'strip' => array(
                //'//img',
				'//div[@class="related_header"]',
				'//div[@class="share"]',
				'//div[@class="related_item"]',
				//'//img',
				//'//img',
				
            ),
        ),
    ),
);
