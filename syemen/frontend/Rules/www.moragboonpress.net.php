<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.moragboonpress.net/news27937.html',
            'body' => array(
                '//div[@class="details"]',
            ),
            'strip' => array(
                '//div[@class="share"]]',
				'//div[@class="details_title"]',
				'//div[@class="stroy_date"]',
				'//div[@class="details_title"]',
				'//div[@class="details_title"]',
				'//script',
				'//iframe',
				'//a',
				//'//img'
				
            ),
        ),
    ),
);
