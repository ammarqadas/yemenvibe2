<?php

namespace backend\modules\post\assets;

use yii\web\AssetBundle;
use yii\web\View;

class ClipboardAsset extends AssetBundle
{
    public $sourcePath = '@npm/clipboard';
    public $publishOptions = [
        'only' => [
            'dist/*',
        ]
    ];
    public $js = [
        "dist/clipboard.min.js"
    ];
    public $jsOptions = [
        'position' => View::POS_END
    ];
}
