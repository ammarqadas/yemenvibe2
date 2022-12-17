<?php
return array(
    'grabber' => array(
        '%.*%' => array(
           'test_url' => 'http://mosnad.com/news.php?id=41273',
            'body' => array(
       //         '//div[@class="col-md-9"]',
		  //'//div[contains(@class,"blog-single")]/div[@class="col-md-9"]',
         '//div[contains(@class,"blog-single")]/div[@class="row"]/div[@class="col-md-9"]',

            ),
            
        ),
    ),
);
