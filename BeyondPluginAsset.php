<?php

namespace maple\beyond;

use yii\web\AssetBundle;

class BeyondPluginAsset extends AssetBundle
{
    public $sourcePath = '@vendor/jeff/yii2-beyond/assets';
    public $depends = [
        'yii\web\JqueryAsset',
        'maple\beyond\BeyondAsset',
    ];
}
