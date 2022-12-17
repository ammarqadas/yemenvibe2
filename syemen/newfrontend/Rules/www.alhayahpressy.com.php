<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://www.alhayahpressy.com/hayatihim/32459/',
            'body' => array(
                '//div[@class="entry-content"]',
            ),
            'strip' => array(
                '//img',
				'//div[@style]',
              //  '//div[@class]',
                '//style]'
            ),
        ),
    ),
);
