<?php
namespace common\components;
use PicoFeed\Scraper\Scraper;
use PicoFeed\Config\Config;
use DateTimeZone;

class Scrap extends Scraper {


	public function __construct($url)
	{
		 parent::__construct();
		 $config =new Config;
		 $config->setGrabberRulesFolder(\Yii::getAlias('@frontend/Rules'));
		 $this->setConfig($config);
		 $this->setUrl($url);

	}

}
?>