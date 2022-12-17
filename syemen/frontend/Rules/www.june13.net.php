<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://www.june13.net/2019/02/22/%D8%A7%D9%84%D8%A8%D9%8A%D8%B6%D8%A7%D8%A1-%D9%85%D9%82%D8%AA%D9%84-%D8%A3%D9%83%D8%AB%D8%B1-%D9%85%D9%86-10-%D9%85%D9%86-%D8%B9%D9%86%D8%A7%D8%B5%D8%B1-%D8%A7%D9%84%D9%85%D9%84%D9%8A%D8%B4%D9%8A/',
            'body' => array(
                '//div[@class="entry"]',
            ),
            'strip' => array(
              //'//div[@class="news_details"]/div/div[last()]',
			 '//div[@class]',
			// '//p/img'

            ),
        ),
    ),
);
