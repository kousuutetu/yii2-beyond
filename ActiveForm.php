<?php

namespace maple\beyond;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\base\InvalidConfigException;

/**
 * A Bootstrap 3 enhanced version of [[\yii\widgets\ActiveForm]].
 *
 * This class mainly adds the [[layout]] property to choose a Bootstrap 3 form layout.
 * So for example to render a horizontal form you would:
 *
 * ```php
 * use yii\bootstrap\ActiveForm;
 *
 * $form = ActiveForm::begin(['layout' => 'horizontal'])
 * ```
 *
 * This will set default values for the [[yii\bootstrap\ActiveField|ActiveField]]
 * to render horizontal form fields. In particular the [[yii\bootstrap\ActiveField::template|template]]
 * is set to `{label} {beginWrapper} {input} {error} {endWrapper} {hint}` and the
 * [[yii\bootstrap\ActiveField::horizontalCssClasses|horizontalCssClasses]] are set to:
 *
 * ```php
 * [
 *     'offset' => 'col-sm-offset-3',
 *     'label' => 'col-sm-3',
 *     'wrapper' => 'col-sm-6',
 *     'error' => '',
 *     'hint' => 'col-sm-3',
 * ]
 * ```
 *
 * To get a different column layout in horizontal mode you can modify those options
 * through [[fieldConfig]]:
 *
 * ```php
 * $form = ActiveForm::begin([
 *     'layout' => 'horizontal',
 *     'fieldConfig' => [
 *         'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
 *         'horizontalCssClasses' => [
 *             'label' => 'col-sm-4',
 *             'offset' => 'col-sm-offset-4',
 *             'wrapper' => 'col-sm-8',
 *             'error' => '',
 *             'hint' => '',
 *         ],
 *     ],
 * ]);
 * ```
 *
 * @see \yii\bootstrap\ActiveField for details on the [[fieldConfig]] options
 * @see http://getbootstrap.com/css/#forms
 */
class ActiveForm extends \yii\widgets\ActiveForm
{
    /**
     * @var string the default field class name when calling [[field()]] to create a new field.
     * @see fieldConfig
     */
    public $fieldClass = 'maple\beyond\ActiveField';
    /**
     * @var array|\Closure the default configuration used by [[field()]] when creating a new field object.
     * This can be either a configuration array or an anonymous function returning a configuration array.
     * If the latter, the signature should be as follows,
     *
     * ```php
     * function ($model, $attribute)
     * ```
     *
     * The value of this property will be merged recursively with the `$options` parameter passed to [[field()]].
     *
     * @see fieldClass
     */
    public $fieldConfig = [];
    /**
     * @var array HTML attributes for the form tag. Default is `['role' => 'form']`.
     */
    public $options = ['role' => 'form'];
    /**
     * @var string the form layout. Either 'default', 'horizontal' or 'inline'.
     * By choosing a layout, an appropriate default field configuration is applied. This will
     * render the form fields with slightly different markup for each layout. You can
     * override these defaults through [[fieldConfig]].
     * @see \yii\bootstrap\ActiveField for details on Bootstrap 3 field configuration
     */
    public $layout = 'default';


    /**
     * @inheritdoc
     */
    public function init()
    {
        if (!in_array($this->layout, ['default', 'horizontal', 'inline'])) {
            throw new InvalidConfigException('Invalid layout type: ' . $this->layout);
        }

        if ($this->layout !== 'default') {
            Html::addCssClass($this->options, 'form-' . $this->layout);
        }

        parent::init();
    }

    /**
     * Generates a form field.
     * A form field is associated with a model and an attribute. It contains a label, an input and an error message
     * and use them to interact with end users to collect their inputs for the attribute.
     * @param Model $model the data model
     * @param string $attribute the attribute name or expression. See [[Html::getAttributeName()]] for the format
     * about attribute expression.
     * @param array $options the additional configurations for the field object
     * @return ActiveField the created ActiveField object
     * @see fieldConfig
     */
    public function field($model, $attribute, $options = [])
    {
    	
        $config = $this->fieldConfig;
        if ($config instanceof \Closure) {
            $config = call_user_func($config, $model, $attribute);
        }
        if (!isset($config['class'])) {
            $config['class'] = $this->fieldClass;
        }
        if (!isset($config['inputOptions']['placeholder'])) {
        	$config['inputOptions']['placeholder'] = Html::encode($model->getAttributeLabel($attribute));
        }
        return Yii::createObject(ArrayHelper::merge($config, $options, [
            'model' => $model,
            'attribute' => $attribute,
            'form' => $this,
        ]));
    }
}
