<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<!--Head-->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta http-equiv="Content-Type" charset="<?= Yii::$app->charset ?>" />
    <link rel="shortcut icon" href="data:image/ico;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAADwlEMAAAAAAALJcwAAjP8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAERERERERERERERAAAAEREREREAAAAREREREQAAABERERERAAAAEREREREAAAAREREREQAAABEREREREREREREREREREREREREzMzMRIiIiETMzMxEiIiIRMzMzESIiIhEzMzMRIiIiETMzMxEiIiIRMzMzESIiIhERERERERERH//wAA+B8AAPgfAAD4HwAA+B8AAPgfAAD4HwAA//8AAP//AACBgQAAgYEAAIGBAACBgQAAgYEAAIGBAAD//wAA" type="image/x-icon">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<!--Head Ends-->
<!--Body-->
<body>
    <?php $this->beginBody() ?>
    <!-- Main Container -->
    <?= $content ?>
    <!-- Main Container -->
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
