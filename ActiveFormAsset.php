<?php

namespace maple\beyond;

use yii\web\AssetBundle;

class ActiveFormAsset extends AssetBundle
{
    public $sourcePath = '@vendor/jeff/yii2-beyond/assets';
    public $depends = [
        'yii\widgets\ActiveFormAsset',
    ];
}
