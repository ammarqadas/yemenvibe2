<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://mandabpress.com/news60025.html',
            'body' => array(
                '//div[@id="article"]',
            ),
            'strip' => array(
                
				 '//div[@style]',
			//	 '//div[@id]',
			      '//div[@id="Mpi_WIDGET*"]',
				 '//div[@class="news_share"]',
				 '//div[@class="news-date-info"]',
				 '//script',
				 '//h1',
				 '//a',
				 
				 
            ),
        ),
    ),
);
