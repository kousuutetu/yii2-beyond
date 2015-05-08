<?php

namespace Jeff\beyond;

use yii\web\AssetBundle;

class BeyondAsset extends AssetBundle
{
    public $sourcePath = "@vendor/jeff/yii2-beyond/assets";
    public $css = [
    	// Basic Styles
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
        // Fonts
        'css/font-google.min.css',
        // Beyond styles
        'css/beyond.min.css',
        // 'css/demo.min.css',
        'css/animate.min.css',
        'css/skins/teal.min.css',
    ];
    public $js = [
        'js/skins.min.js',
        // Basic Scripts
        'js/bootstrap.min.js',
        'js/slimscroll/jquery.slimscroll.min.js',
        // Beyond Scripts
        'js/beyond.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
