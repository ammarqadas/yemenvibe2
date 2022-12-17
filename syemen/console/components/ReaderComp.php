<?php

namespace console\components;
use PicoFeed\Reader\Reader;
use yii\filters\AccessControl;
use common\models\LoginForm;
use PicoFeed\Client\Client;

class ReaderComp extends Reader
{
	public $timeout;
  
	public $proxy;
      public $port;	
    public function download($url, $last_modified = '', $etag = '', $username = '', $password = '')
     {
        $url = $this->prependScheme($url);
		//echo "timeout:-".$this->timeout;

        return Client::getInstance()
                        ->setConfig($this->config)
                        ->setLastModified($last_modified)
                        ->setEtag($etag)
                        ->setUsername($username)
			->setTimeout($this->timeout)
			->setProxyHostname($this->proxy)
                        ->setProxyPort($this->port)
                        ->setPassword($password)
                        ->execute($url);
     }
}


 
