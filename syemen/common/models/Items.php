<?php

namespace common\models;
use Yii;


/**
 * This is the model class for table "Items".
 *
 * @property string $id
 * @property string $feedId
 * @property string $title
 * @property string $content
 * @property string $url
 * @property string $enclosureUrl
 * @property string $enclosureType
 * @property int $itemDate
 * @property int $read
 * @property int $active
 * @property int $ordr
 */
class Items extends \yii\db\ActiveRecord implements SitemapEntityInterface
{
    public static function tableName()
    
    {
        return 'Items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['feedId', 'itemDate'], 'required'],
            [['feedId', 'itemDate', 'read', 'ordr'], 'integer'],
            [['content'], 'string'],
            [['title', 'url'], 'string', 'max' => 255],
            [['enclosureUrl','url'], 'url'],
            [['enclosureType'], 'string', 'max' => 30],
            [['active'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('items', 'ID'),
            'feedId' => Yii::t('items', 'Feed ID'),
            'title' => Yii::t('items', 'Title'),
            'content' => Yii::t('items', 'Content'),
            'url' => Yii::t('items', 'Url'),
            'enclosureUrl' => Yii::t('items', 'Enclosure Url'),
            'enclosureType' => Yii::t('items', 'Enclosure Type'),
            'itemDate' => Yii::t('items', 'Item Date'),
            'read' => Yii::t('items', 'Read'),
            'active' => Yii::t('items', 'Active'),
            'ordr' => Yii::t('items', 'Ordr'),
        ];
    }
	 public function getFeed()
    {
        return $this->hasOne(Feeds::className(), ['id' => 'feedId']);
    }
	 public function getDetail()
    {
        return $this->hasOne(self::className(), ['slug' => 'slug']);
    }
	
	
	/*
	sitemap interface function 
	*/
	
	 public function getSitemapLastmod()
    {
     
		  return  date('c', $this->itemDate);
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
        //return 'http://localhost/' . $this->slug;
		//echo 'scrap'.$this->feed->res->scrap;
		if(!preg_match('/https/i',$this->url) && !$this->feed->res->scrap)
			{
				$schema='http';
				$slug=param('urgentSlug');
			}
			else
			{
				$schema='https';
				$slug=param('newsSlug');
			}
			$url=itemUrl($this->id,$this->slug,$slug);
		return url([$url,],$schema);
    }

    /**
     * @inheritdoc
     */
    public static function getSitemapDataSource()
    {
       
       return self::find()->where(['>=', 'ItemDate', strtotime(param('sitemapFrom'))])
		->andwhere(['<', 'ItemDate', strtotime(param('sitemapTo'))]);
			
		
   }
	
}
