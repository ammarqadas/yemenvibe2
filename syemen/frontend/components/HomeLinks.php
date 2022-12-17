<?php

namespace frontend\components;
use yii\base\Component;

class HomeLinks extends Component {
	public $links;
	public $confPath;
	private $_conf;
	
	protected function config($link)
	{
		
		if(array_key_exists($link, $this->links))
		{
		$this->_conf=require($this->confPath.$this->links[$link]);
		$this->_conf['search']=$this->search();
		return true;
		}
		return false;
		
	}
	protected function mc($str,$append="+")
	{
		$words =array_map('trim', preg_split("/[\n,]+/",$str));
		$words =  preg_filter('/^/', $append, array_filter($words));
		//echo $str;
		//print_r($words);//777331907
		
		return implode(' ',$words);
	}
 	public function RouteP()
    {
		
     foreach (array_map('trim',array_keys($this->links)) as $pattern)$grouped_patterns[] = "(" . $pattern . ")";
     return implode($grouped_patterns, "|");
    }
	
	protected function search()
	{
		
		return self::mc($this->_conf->must).
		self::mc($this->_conf->never,' -').' '.
		self::mc($this->_conf->contain,null);
	}
	public function getConf($link)
	{
		return $this->config($link)?$this->_conf:null;
	}

	
}
?>