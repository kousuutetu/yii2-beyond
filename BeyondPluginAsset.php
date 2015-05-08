<?php

namespace Jeff\beyond;

use yii\web\AssetBundle;

class BeyondPluginAsset extends AssetBundle
{
    public $sourcePath = '@vendor/jeff/yii2-beyond/assets';
    public $depends = [
        'yii\web\JqueryAsset',
        'Jeff\beyond\BeyondAsset',
    ];
}
