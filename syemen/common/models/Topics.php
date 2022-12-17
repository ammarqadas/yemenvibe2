<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "topics".
 *
 * @property string $id
 * @property string $title
 * @property string $slug
 */
class Topics extends \yii\db\ActiveRecord implements SitemapEntityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Topics';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title', 'slug'], 'string', 'max' => 100],
            [['title'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('feed', 'ID'),
            'title' => Yii::t('feed', 'Title'),
            'slug' => Yii::t('feed', 'Slug'),
        ];
    }
	public static function getTopicsList()
	{
		return \Yii\helpers\ArrayHelper::map(Topics::find()->all(),'id','title');
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
		$url="section/".$this->slug;
		return url([$url,],'https');
		
    }
public static function getSitemapDataSource()
    {
        return self::find();
	 }

}
