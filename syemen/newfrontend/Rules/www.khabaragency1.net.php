<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.khabaragency1.net/news123019.html',
            'body' => array(
                '//section[@id="paragraphs"]',
            ),
            'strip' => array(
              //  '//div[@class="news_details"]/div/div[last()]',
			  '//img',
			//  '//div[contains(@class,"fb-twitter-container")]',
            ),
        ),
    ),
);
