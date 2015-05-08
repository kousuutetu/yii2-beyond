<?php

namespace Jeff\beyond;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Panel extends Widget
{
	/**
     * @var array the HTML attributes for the widget container tag. 
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];
    /**
     * @var array list for the widget header.
     * include class, icon, caption, buttons.
     */
    public $headerOptions;
    /**
     * @var array list for the widget body.
     */
    public $bodyOptions;

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, 'widget');
        echo Html::beginTag('div', ['class' => $this->options['class']]);
        echo $this->renderHeader();
        Html::addCssClass($this->bodyOptions, 'widget-body');
        echo Html::beginTag('div', ['class' => $this->bodyOptions['class']]);
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        echo Html::endTag('div');
        echo Html::endTag('div');
        BeyondAsset::register($this->getView());
    }

    /**
     * Renders widget body.
     */
    public function renderHeader()
    {
        if ($this->headerOptions === null) {
            return '';
        }

        Html::addCssClass($this->headerOptions, 'widget-header');
        $header = Html::beginTag('div', ['class' => $this->headerOptions['class']]);
        $icon    = ArrayHelper::getValue($this->headerOptions, 'icon', null);
        $caption = ArrayHelper::getValue($this->headerOptions, 'caption', null);
        $buttons = ArrayHelper::getValue($this->headerOptions, 'buttons', []);
        if ($icon !== null) {
            $header .= Html::tag('i', '', ['class' => $icon]);
        }
        if ($caption !== null) {
            $header .= Html::tag('span', $caption, ['class' => 'widget-caption']);
        }
        if (!empty($buttons)) {
            $buttonsOptions = ArrayHelper::getValue($this->headerOptions, 'buttonsOptions', []);
            Html::addCssClass($buttonsOptions, 'widget-buttons');
            $header .= Html::beginTag('div', ['class' => $buttonsOptions['class']]);
            foreach ($buttons as $key => $value) {
            	if (is_string($value)) {
            		$header .= $value;
            	}
            	if (is_array($value)) {
	                $url = ArrayHelper::getValue($value, 'url', null);
	                $header .= Html::a(Html::tag('i', '', $value), $url !== null ? $url : 'javascript:void(0)', ['data-toggle' => $key]);
            	}
            }
            $header .= Html::endTag('div');
        }
        $header .= Html::endTag('div');
        return $header;
    }
}