<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = Yii::t('app', 'Login');
?>
<div class="site-login">
    <div class="login-container animated fadeInDown">
        <div class="loginbox bg-white">
            <div class="loginbox-title"><?= Yii::t('app', 'SIGN IN') ?></div>
            <div class="loginbox-or">
                <div class="or-line"></div>
            </div>
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'options' => ['class' => ''],
                    'template' => '{input}',
                ]
            ]); ?>
            <div class="loginbox-textbox">
                <?= $form->field($model, 'username', [
                    'inputOptions' => [
                        'placeholder' => Yii::t('app', 'Username'),
                    ]
                ]) ?>
            </div>
            <div class="loginbox-textbox">
                <?= $form->field($model, 'password', [
                    'inputOptions' => [
                        'placeholder' => Yii::t('app', 'Password'),
                    ]
                ])->passwordInput() ?>
            </div>
            <div class="loginbox-forgot">
                <a href="<?= \yii\helpers\Url::to(['site/forget-password']) ?>"><?= Yii::t('app', 'Forgot Password?') ?></a>
            </div>
            <div class="loginbox-submit">
                <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="logobox logobox-text">
        	<?= isset(Yii::$app->params['Project name']) ? Yii::$app->params['Project name'] : '' ?>
        </div>
    </div>
</div>

