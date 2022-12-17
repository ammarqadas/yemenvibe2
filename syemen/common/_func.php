<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\ArrayHelper;
function url($url = ’’, $scheme = false)
{
   return Url::to($url, $scheme);
}
function h($text)
{
   return Html::encode($text);
}
function ph($text)
{
   return HtmlPurifier::process($text);
}
function t($message, $params = [], $category = "main", $language = null)
{
return Yii::t($category, $message, $params, $language);
}
function param($name, $default = null)
{
return ArrayHelper::getValue(Yii::$app->params, $name, $default);
}
?>