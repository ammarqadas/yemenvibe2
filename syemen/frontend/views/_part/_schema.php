<?php
use nirvana\jsonld\JsonLDHelper;
$mdate=date('c', $date);
$doc = [
   "@type"=> "http://schema.org/NewsArticle","http://schema.org/mainEntityOfPage" => (object)["@type" => "WebPage","@id" => $url,],
    "http://schema.org/headline" =>$title,
	"http://schema.org/articleSection" => $section,
	"http://schema.org/description" =>$desc ,
	"http://schema.org/url" =>$url,
	"http://schema.org/datePublished" => $mdate,
	"http://schema.org/dateModified" => $mdate,
    "http://schema.org/image" => (object)["@type" => "http://schema.org/imageObject","http://schema.org/url"=> $img],
	"http://schema.org/publisher"=> (object)["@type" => "http://schema.org/Organization","http://schema.org/name" => \Yii::$app->name,"http://schema.org/logo" => (object)["@type"=> "http://schema.org/imageObject","http://schema.org/url"=> "https://yemenvibe.com/static/image/logo.png"]],
    "http://schema.org/author" => (object)["@type" => "http://schema.org/Organization","http://schema.org/name" => \Yii::$app->name,"http://schema.org/logo" => (object)["@type"=> "http://schema.org/imageObject","http://schema.org/url"=> "https://yemenvibe.com/static/image/logo.png"]]];
JsonLDHelper::add($doc);
?>