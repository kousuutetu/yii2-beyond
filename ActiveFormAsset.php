<?php

namespace maple\beyond;

use yii\web\AssetBundle;

class ActiveFormAsset extends AssetBundle
{
    public $sourcePath = '@vendor/maple/yii2-beyond/assets';
    public $depends = [
        'yii\widgets\ActiveFormAsset',
    ];
}
