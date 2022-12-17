<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://www.motabaat.com/2020/04/15/%d9%88%d8%b1%d8%af%d9%86%d8%a7-%d8%a7%d9%84%d8%a2%d9%86-%d8%ad%d9%83%d9%88%d9%85%d8%a9-%d8%b5%d9%86%d8%b9%d8%a7%d8%a1-%d8%aa%d8%b9%d9%84%d9%86-%d8%b9%d9%88%d8%af%d8%a9-%d8%b5%d8%b1%d9%81-%d8%a7%d9%84/',
            'body' => array(
                '//div[@class="single-container"]/article',
            ),
            'strip' => array(
              //  '//div[@class="news_details"]/div/div[last()]',
			//  '//img',
			  '//a',
			  '//div[contains(@class,"post-share")]',
			  '//div[@class="post-header-inner"]',
			  
			  
			  
            ),
        ),
    ),
);
