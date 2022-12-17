<?php

namespace common\models;
use yii\behaviors\SluggableBehavior;
use Yii;


/**
 * This is the model class for table "Res".
 *
 * @property string $id
 * @property string $rName
 * @property string $logo
 * @property int $active
 */
class Res extends \yii\db\ActiveRecord implements SitemapEntityInterface
{
    /**
     * @inheritdoc
     */
	
    public static function tableName()
    {
        return 'Res';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rName'], 'string', 'max' => 70],
            [['logo'], 'url'],
			[['trend'], 'number'],
			[['rName'],'unique'],
            [['active','scrap'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('feed', 'ID'),
            'rName' => Yii::t('feed', 'R Name'),
            'logo' => Yii::t('feed', 'Logo'),
            'active' => Yii::t('feed', 'Active'),
			 'scrap' => Yii::t('feed', 'Scrap'),
			'trend' => Yii::t('feed', 'Trend'),
			
        ];
    }
	public function getFcount()
	{
		return $this->hasMany(Feeds::className(), ['resID' => 'id'])->count();
	}
	
	public function getFeeds()
	{
		return $this->hasMany(Feeds::className(), ['resID' => 'id']);
	}
public static function getResList()
	{
		return \Yii\helpers\ArrayHelper::map(Res::find()->all(),'id','rName');
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
		$url="source/".preg_replace('/\s+/', '-', $this->rName);
		return url([$url,],'https');
		
    }
public static function getSitemapDataSource()
    {
        return self::find()->where(['active'=>1]);
	 }

	
}
