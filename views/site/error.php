<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<?php
$css = <<<EOF
body{background-color:#fb6e52;color:#fff}body:before{display:none}body .error-container h1{color:#fb6e52}body .return-btn:hover{color:#fb6e52}
EOF;
$this->registerCss($css);
?>
<div class="site-error">
    <div class="error-header"> </div>
    <div class="container ">
        <section class="error-container text-center">
            <h1><?= isset($exception->statusCode) ? $exception->statusCode : '000' ?></h1>
            <div class="error-divider">
                <h2><?= nl2br(Html::encode($message)) ?></h2>
            </div>
            <a href="<?= \yii\helpers\Url::home() ?>" class="return-btn"><i class="fa fa-home"></i><?= Yii::t('yii', 'Home') ?></a>
        </section>
    </div>
</div>