<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://www.motabaat.com/2019/03/22/%D9%85%D8%B4%D8%B1%D9%88%D8%B9-%D9%84%D8%B2%D8%B1%D8%A7%D8%B9%D8%A9-%D8%A7%D9%84%D9%82%D9%85%D8%AD-%D9%8A%D8%AD%D9%82%D9%82-%D9%86%D8%AA%D8%A7%D8%A6%D8%AC-%D8%A8%D8%A7%D9%87%D8%B1%D8%A9-%D9%82%D8%AF/',
            'body' => array(
                '//div[@class="single-container"]/div[contains(@class,"entry-content")]',
            ),
            'strip' => array(
              //  '//div[@class="news_details"]/div/div[last()]',
			  '//img',
			  '//a',
			  
			  
            ),
        ),
    ),
);
