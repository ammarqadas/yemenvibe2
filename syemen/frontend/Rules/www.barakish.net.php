<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'www.barakish.net/news02.aspx?cat=12&sub=23&id=666997',
            'body' => array(
                '//div[@id="CtmDetailsNewsBar1_newDetails"]',
            ),
            'strip' => array(
              //  '//div[@class="news_details"]/div/div[last()]',
			  '//img',
			  '//a',
			  //'//div[contains(@class,"fb-twitter-container")]',
            ),
        ),
    ),
);
