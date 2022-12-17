<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Feeds".
 *
 * @property string $id
 * @property string $feedurl
 * @property int $cat
 * @property string $resID
 * @property int $interval
 * @property int $lastDate
 * @property int $lastModified
 * @property string $etag
 * @property int $ttl
 * @property int $failNo
 * @property string $lastError
 * @property int $active
 * @property int $lastChecked
 * @property string $created_at
 */
class Feeds extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Feeds';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['feedurl', 'resID'], 'required'],
            [['cat', 'resID', 'interval', 'lastDate', 'lastModified', 'ttl', 'failNo', 'lastChecked','type'], 'number'],
            [['created_at','lastDate'], 'safe'],
			[['feedurl'], 'url'],
			[['feedurl'], 'unique'],
            [['etag', 'lastError'], 'string', 'max' => 255],
            [['active'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('feed', 'ID'),
            'feedurl' => Yii::t('feed', 'Feedurl'),
            'cat' => Yii::t('feed', 'Cat'),
			'type' => Yii::t('feed', 'Type'),
            'resID' => Yii::t('feed', 'Res ID'),
            'interval' => Yii::t('feed', 'Interval'),
            'lastDate' => Yii::t('feed', 'Last Date'),
            'lastModified' => Yii::t('feed', 'Last Modified'),
            'etag' => Yii::t('feed', 'Etag'),
            'ttl' => Yii::t('feed', 'Ttl'),
            'failNo' => Yii::t('feed', 'Fail No'),
            'lastError' => Yii::t('feed', 'Last Error'),
            'active' => Yii::t('feed', 'Active'),
            'lastChecked' => Yii::t('feed', 'Last Checked'),
            'created_at' => Yii::t('feed', 'Created At'),
        ];
    }
	public function getRes()
	{
		return $this->hasOne(Res::className(), ['id' => 'resID']);
	}
	public function getTopics()
	{
		return $this->hasOne(Topics::className(), ['id' => 'cat']);
	}
	public function getItemCount()
	{
		return $this->hasMany(Items::className(), ['feedId' => 'id'])->count();
	}
	public function getItems()
	{
		return $this->hasMany(Items::className(), ['feedId' => 'id']);
	}
}
