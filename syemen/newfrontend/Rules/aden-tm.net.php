<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://aden-tm.net/NDetails.aspx?contid=76852',
            'body' => array(
                '//div[@class="colsethed3"]/div[@class="content"]',
            ),
            'strip' => array(
                '//img',
            ),
        ),
    ),
);
