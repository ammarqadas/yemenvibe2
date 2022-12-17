<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.al-omana.com/news90115.html',
            'body' => array(
                '//div[@class="story_text"]',
            ),
            'strip' => array(
                '//img',
            ),
        ),
    ),
);
