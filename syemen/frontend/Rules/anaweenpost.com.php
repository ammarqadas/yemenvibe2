<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://anaweenpost.com/archives/77837',
            'body' => array(
                '//div[@id="left-area"]/article',
            ),
            'strip' => array(
             //   '//div[@class="news_details"]/div/div[last()]',
			// '//img',
			 '//h1',
			 '//div[@class="post-meta"]',
			 '//div[@class="mh_share_footer"]',
			 '//div[@class="mh-loveit-container"]',
			 '//div[@class="anawe-after-content"]',
			 '//div[@class="anawe-after-content_2"]',
			 '//div[@class="mh_post_meta_wrapper"]',
			// '//a',
			// '//ul',
			 
            ),
        ),
    ),
);
