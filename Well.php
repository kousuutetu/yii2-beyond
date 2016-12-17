<?php

namespace maple\beyond;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class Well extends Widget
{
	public $options 		= [];
	public $headerOptions	= [];
	public $footerOptions	= [];

	/**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, 'well');
        if (!empty($this->headerOptions)) {
        	Html::addCssClass($this->options, 'with-header');
        }
        if (!empty($this->footerOptions)) {
        	Html::addCssClass($this->options, 'with-footer');
        }
        echo Html::beginTag('div', $this->options);
        $this->renderHeader();
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
    	$this->renderFooter();
    	echo Html::endTag('div');
        BeyondAsset::register($this->getView());
    }

    public function renderHeader()
    {
    	if (!empty($this->headerOptions)) {
    		if (!isset($this->headerOptions['label'])) {
	            throw new InvalidConfigException("The 'label' option is required for headerOptions.");
	        }
	        $label = ArrayHelper::remove($this->headerOptions, 'label');
        	Html::addCssClass($this->headerOptions, 'header');

        	echo Html::tag('div', $label, $this->headerOptions);
        }
    }

    public function renderFooter()
    {
    	if (!empty($this->footerOptions)) {
    		if (!isset($this->footerOptions['label'])) {
	            throw new InvalidConfigException("The 'label' option is required for footerOptions.");
	        }
	        $label = ArrayHelper::remove($this->footerOptions, 'label');
        	Html::addCssClass($this->footerOptions, 'footer');

        	echo Html::tag('div', $label, $this->footerOptions);
        }
    }
}