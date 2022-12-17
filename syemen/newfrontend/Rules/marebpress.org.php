<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://marebpress.org/news_details.php?lang=arabic&sid=147966',
            'body' => array(
                '//div[@class="details"]',
            ),
            'strip' => array(
                '//div[@id]',
				'//img',
				'//script',
            ),
        ),
    ),
);
