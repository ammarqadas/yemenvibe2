<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://www.4may.net/news/16243',
            'body' => array(
                '//div[@class="colsethed3"]/div[@class="content"]',
            ),
            'strip' => array(
              '//img',
            ),
        ),
    ),
);
