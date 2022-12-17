<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Trends".
 *
 * @property string $id
 * @property string $slug
 * @property string $fromDate
 * @property string $mustContain
 * @property string $contain
 * @property string $notContain
 * @property string $keyWords
 * @property string $description
 * @property int $active
 * @property string $created_at
 */
class Trends extends \yii\db\ActiveRecord implements SitemapEntityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Trends';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slug'], 'required'],
         //   [['fromDate'], 'integer'],
            [['created_at','fromDate'], 'safe'],
            [['title','slug', 'mustContain', 'contain', 'notContain', 'keyWords', 'description'], 'string', 'max' => 255],
            [['active'], 'boolean'],
            [['slug'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('feed', 'ID'),
		    'title'=>	Yii::t('feed', 'Title'),
            'slug' => Yii::t('feed', 'Slug'),
            'fromDate' => Yii::t('feed', 'From Date'),
            'mustContain' => Yii::t('feed', 'Must Contain'),
            'contain' => Yii::t('feed', 'Contain'),
            'notContain' => Yii::t('feed', 'Not Contain'),
            'keyWords' => Yii::t('feed', 'Key Words'),
            'description' => Yii::t('feed', 'Description'),
            'active' => Yii::t('feed', 'Active'),
            'created_at' => Yii::t('feed', 'Created At'),
			
        ];
    }

	public function getSearch()
	{
	//$trend =Trends::find()->where(['slug'=>$slug])->one();
	return mc($this->mustContain).mc($this->notContain,' -').' '.mc($this->contain,null);
	
	}
		 
	 public function getSitemapLastmod()
    {
     
		  return  date('c', strtotime('-3 days'));
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

	
public function getSitemapLoc()
    {
		$url="hashtag/".$this->slug;
		return url([$url,],'https');
		
    }
public static function getSitemapDataSource()
    {
        return self::find();
	 }

	
}
