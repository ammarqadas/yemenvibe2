<?php


namespace backend\modules\post;

use yii;
use yii\base\Module as BaseModule;

/**
 * portal module definition class
 */
class Module extends BaseModule
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\post\controllers';

    /**
     *
     * @var string source language for translation
     */
    public $sourceLanguage = 'en-US';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    /**
     * Registers the translation files
     */
    protected function registerTranslations()
    {
        Yii::$app->i18n->translations['backend/modules/post/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => $this->sourceLanguage,
            'basePath' => '@backend/modules/post/messages',
            'fileMap' => [
                'backend/modules/post/post' => 'post.php',
            ],
        ];
    }

    /**
     * Translates a message. This is just a wrapper of Yii::t
     *
     * @see Yii::t
     *
     * @param $category
     * @param $message
     * @param array $params
     * @param null $language
     * @return string
     */
    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('backend/modules/post/' . $category, $message, $params, $language);
    }
}
