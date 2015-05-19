<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use Jeff\beyond\Nav;
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
    <!-- Loading Container -->
    <!--<div class="loading-container">
        <div class="loader"></div>
    </div>-->
    <!--  /Loading Container -->
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="navbar-container">
                <!-- Navbar Barnd -->
                <div class="navbar-header pull-left">
                    <a href="<?= Yii::$app->homeUrl ?>" class="navbar-brand">
                        Jeff Beyond
                    </a>
                </div>
                <!-- /Navbar Barnd -->
                <!-- Sidebar Collapse -->
                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="collapse-icon fa fa-bars"></i>
                </div>
                <!-- /Sidebar Collapse -->
                <!-- Account Area and Settings -->
                <div class="navbar-header pull-right">
                    <div class="navbar-account">
                        <ul class="account-area">
                            <li>
                                <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                    <section>
                                        <h2><span class="profile"><span><?= Yii::$app->user->identity->username ?></span></span></h2>
                                    </section>
                                </a>
                                <!--Login Area Dropdown-->
                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                    <li class="username"><a><?= Yii::$app->user->identity->username ?></a></li>
                                    <li class="edit">
                                        <a href="#" class="pull-left">Profile</a>
                                        <a href="#" class="pull-right">Setting</a>
                                    </li>
                                    <li class="dropdown-footer">
                                        <?= Html::a(Yii::t('app', 'Sign out'), ['/site/logout'], ['data-method' => 'post']) ?>
                                    </li>
                                </ul>
                                <!--/Login Area Dropdown-->
                            </li>
                            <!-- /Account Area -->
                            <!-- Settings -->
                        </ul><div class="setting">
                            <a id="btn-setting" title="Setting" href="#">
                                <i class="icon glyphicon glyphicon-cog"></i>
                            </a>
                        </div><div class="setting-container">
                            <label>
                                <input type="checkbox" id="checkbox_fixednavbar">
                                <span class="text">Fixed Navbar</span>
                            </label>
                            <label>
                                <input type="checkbox" id="checkbox_fixedsidebar">
                                <span class="text">Fixed SideBar</span>
                            </label>
                            <label>
                                <input type="checkbox" id="checkbox_fixedheader">
                                <span class="text">Fixed Header</span>
                            </label>
                        </div>
                        <!-- Settings -->
                    </div>
                </div>
                <!-- /Account Area and Settings -->
            </div>
        </div>
    </div>
    <!-- /Navbar -->
    <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <input type="text" class="searchinput" />
                    <i class="searchicon fa fa-search"></i>
                    <div class="searchhelper"><!--Search Reports, Charts, Emails or Notifications --></div>
                </div>
                <!-- /Page Sidebar Header -->
                <!-- Sidebar Menu -->
                <?php
                    $menuItems = [
                        [
                            'label' => 'Dashboard',
                            'icon' => 'menu-icon glyphicon glyphicon-home',
                            'url' => ['/site/index'],
                        ],
                        [
                            'label' => 'About Me',
                            'icon' => 'menu-icon fa fa-desktop',
                            'items' => [
                                [
                                    'label' => 'About',
                                    'url' => ['/site/aboutus'],
                                ],
                                [
                                    'label' => 'Contact',
                                    'url' => ['/site/contact'],
                                ],
                            ],
                        ],
                    ];
                ?>
                <?= Nav::widget([
                    'activateParents' => true,
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => $menuItems
                ]) ?>
                <!-- /Sidebar Menu -->
            </div>
            <!-- /Page Sidebar -->
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Header -->
                <div class="page-header position-relative">
                    <div class="header-breadcrumbs">
                        <?= Breadcrumbs::widget([
                            'homeLink' => [
                                'template' => "<li><i class=\"fa fa-home\"></i>{link}</li>\n",
                                'label' => Yii::t('yii', 'Home'),
                                'url' => Yii::$app->homeUrl
                            ],
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>
                    </div>
                    <!--Header Buttons-->
                    <div class="header-buttons">
                        <a class="sidebar-toggler" href="#">
                            <i class="fa fa-arrows-h"></i>
                        </a>
                        <a class="refresh" id="refresh-toggler" href="<?= Url::current() ?>">
                            <i class="glyphicon glyphicon-refresh"></i>
                        </a>
                        <a class="fullscreen" id="fullscreen-toggler" href="#">
                            <i class="glyphicon glyphicon-fullscreen"></i>
                        </a>
                    </div>
                    <!--Header Buttons End-->
                </div>
                <!-- /Page Header -->
                <!-- Page Body -->
                <div class="page-body">
                    <!-- Your Content Goes Here -->
                    <?php echo  Alert::widget(['flashModel' => true]) ?>
                    <?= $content ?>
                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Container -->
    </div>
    <!-- Main Container -->
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
