<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://alshahednews.net/news41866.html',
            'body' => array(
                '//div[@class="story_text"]',
            ),
           'strip' => array(
                '//div[@style]',
            ),

        ),
    ),
);
