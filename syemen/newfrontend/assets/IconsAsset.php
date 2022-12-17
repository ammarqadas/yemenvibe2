<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class IconsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '';
    // public $basePath = '@webroot';
  //  public $baseUrl = '@web';
    public $css = [ 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css']; 
	//public $css = [ 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'];
   // public $css = [ 'css/fa-regular.css'];
	 public $depends = [
       
        'yii\bootstrap\BootstrapAsset',
    ];
	 
    
}
