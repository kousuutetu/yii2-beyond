Yii2 Theme Beyond
=================
Yii2 Theme Beyond

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist maple/yii2-beyond "*"
```

or add

```
"maple/yii2-beyond": "*"
```

to the require section of your `composer.json` file.

Usage
------------

```
cp -r vendor/maple/yii2-beyond/views backend/
cp -r vendor/maple/yii2-beyond/AppAsset.php backend/assets/
vim backend/controllers/SiteController.php
modify  yii\web\ErrorAction to maple\beyond\ErrorAction
add $this->layout = 'nonav' to action login
