<?php

namespace zacksleo\yii2\post\behaviors;

use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\base\InvalidParamException;

class UploadBehavior extends \mongosoft\file\UploadBehavior
{

    /**
     * This method is called at the end of inserting or updating a record.
     * @throws \yii\base\InvalidParamException
     */
    public function afterSave()
    {
        /** @var \yii\db\BaseActiveRecord $model */
        $model = $this->owner;
        if (in_array($model->scenario, $this->scenarios)) {
            if ($this->getUploadedFile() instanceof UploadedFile) {
                $path = $this->getUploadPath($this->attribute);
                if (is_string($path) && FileHelper::createDirectory(dirname($path))) {
                    $this->save($this->getUploadedFile(), $path);
                    $this->afterUpload();
                } else {
                    throw new InvalidParamException("Directory specified in 'path' attribute doesn't exist or cannot be created.");
                }
            }
        }
    }
}
