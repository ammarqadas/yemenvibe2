<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.okaz.com.sa/article/1712621/%D8%A7%D9%84%D8%B3%D9%8A%D8%A7%D8%B3%D8%A9/%D8%AA%D8%B9%D9%8A%D9%8A%D9%86-%D8%A7%D9%84%D8%AC%D9%86%D8%B1%D8%A7%D9%84-%D8%A7%D9%84%D8%A3%D9%85%D8%B1%D9%8A%D9%83%D9%8A-%D8%AA%D9%88%D8%AF-%D9%88%D9%88%D9%84%D8%AA%D8%B1%D8%B2-%D9%82%D8%A7%D8%A6%D8%AF%D8%A7-%D8%A3%D8%B9%D9%84%D9%89-%D9%84%D9%82%D9%88%D8%A7%D8%AA-%D8%AD%D9%84%D9%81-%D8%B4%D9%85%D8%A7%D9%84-%D8%A7%D9%84%D8%A3%D8%B7%D9%84%D8%B3%D9%8A',
            'body' => array(
                '//div[contains(@class,"articleBody")]',
            ),
            'strip' => array(
                '//img',
				'//div[@class="pagingWrap"]',
				//'//img',
				
				
            ),
        ),
    ),
);
