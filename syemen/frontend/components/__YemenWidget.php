<?php
namespace frontend\components;
use yii\base\Widget;
use common\models\Items;
use yii;


class YemenWidget extends Widget
,'topics',]);
,							]);//->where('itemDate >= '.strtotime('-1 days'))->orderBy('read desc ,itemDate desc')->limit(6)->asArray()->all();

		if($this->type=='aside')
	return $this->render('yemen2',['items'=>$this->items]);
		;
