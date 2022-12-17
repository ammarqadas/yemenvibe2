<?php

namespace common\models;

use Yii;

class Post extends \backend\modules\post\models\Post implements SitemapEntityInterface
{
   
	 public function getSitemapLastmod()
    {
     
		  return  date('c', $this->updated_at);
    }

    /**
     * @inheritdoc
     */
    public function getSitemapChangefreq()
    {
        return 'daily';
    }

    /**
     * @inheritdoc
     */
    public function getSitemapPriority()
    {
        return 0.5;
    }

    /**
     * @inheritdoc
     */
    public function getSitemapLoc()
    {
		$url=itemUrl($this->id,$this->slug,'/post');
		return url([$url,],'https');
		
    }

    /**
     * @inheritdoc
     */
    public static function getSitemapDataSource()
    {
        return self::find();
		return self::find()->where(['>=', 'created_at', strtotime(param('sitemapFrom'))])
		->andwhere(['<', 'created_at', strtotime(param('sitemapTo'))]);
    }
	
}
