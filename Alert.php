<?php

namespace Jeff\beyond;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Alert renders an alert bootstrap component.
 *
 * For example,
 *
 * ```php
 * echo Alert::widget([
 *     'options' => [
 *         'class' => 'alert-info',
 *     ],
 *     'body' => 'Say hello...',
 * ]);
 * ```
 *
 * The following example will show the content enclosed between the [[begin()]]
 * and [[end()]] calls within the alert box:
 *
 * ```php
 * Alert::begin([
 *     'options' => [
 *         'class' => 'alert-warning',
 *     ],
 * ]);
 *
 * echo 'Say hello...';
 *
 * Alert::end();
 * ```
 * or flashModel
 *
 * ```php
 * \Yii::$app->getSession()->setFlash('error', 'This is the message');
 * \Yii::$app->getSession()->setFlash('success', 'This is the message');
 * \Yii::$app->getSession()->setFlash('info', 'This is the message');
 * ```
 *
 * Multiple messages could be set as follows:
 *
 * ```php
 * \Yii::$app->getSession()->setFlash('error', ['Error 1', 'Error 2']);
 * ```
 */
class Alert extends Widget
{
    /**
     * @var string the body content in the alert component. Note that anything between
     * the [[begin()]] and [[end()]] calls of the Alert widget will also be treated
     * as the body content, and will be rendered before this.
     */
    public $body;
    /**
     * @var array the alert types configuration for the flash messages.
     * This array is setup as $key => $value, where:
     * - $key is the name of the session flash variable
     * - $value is the bootstrap alert type (i.e. danger, success, info, warning)
     */
    public $alertTypes = [
        'error'   => 'alert-danger',
        'danger'  => 'alert-danger',
        'success' => 'alert-success',
        'info'    => 'alert-info',
        'warning' => 'alert-warning'
    ];
    /**
     * @var array the options for rendering the close button tag.
     */
    public $closeButton = [];
    public $flashModel  = false;

    /**
     * Initializes the widget.
     */
    public function init()
    {
        if ($this->flashModel) {
            $session = \Yii::$app->getSession();
            $flashes = $session->getAllFlashes();
            $appendCss = isset($this->options['class']) ? ' ' . $this->options['class'] : '';

            foreach ($flashes as $type => $data) {
                if (isset($this->alertTypes[$type])) {
                    $data = (array) $data;
                    foreach ($data as $i => $message) {
                        /* initialize css class for each alert box */
                        $this->options['class'] = $this->alertTypes[$type] . $appendCss;

                        /* assign unique id to each alert box */
                        $this->options['id'] = $this->getId() . '-' . $type . '-' . $i;

                        $this->body = $message;
                    }

                    $session->removeFlash($type);
                }
            }
        }

        parent::init();

        $this->initOptions();

        echo Html::beginTag('div', $this->options) . "\n";
        echo $this->renderBodyBegin() . "\n";
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        echo "\n" . $this->renderBodyEnd();
        echo "\n" . Html::endTag('div');

        $this->registerPlugin('alert');
    }

    /**
     * Renders the close button if any before rendering the content.
     * @return string the rendering result
     */
    protected function renderBodyBegin()
    {
        return $this->renderCloseButton();
    }

    /**
     * Renders the alert body (if any).
     * @return string the rendering result
     */
    protected function renderBodyEnd()
    {
        return $this->body . "\n";
    }

    /**
     * Renders the close button.
     * @return string the rendering result
     */
    protected function renderCloseButton()
    {
        if (($closeButton = $this->closeButton) !== false) {
            $tag = ArrayHelper::remove($closeButton, 'tag', 'button');
            $label = ArrayHelper::remove($closeButton, 'label', '&times;');
            if ($tag === 'button' && !isset($closeButton['type'])) {
                $closeButton['type'] = 'button';
            }

            return Html::tag($tag, $label, $closeButton);
        } else {
            return null;
        }
    }

    /**
     * Initializes the widget options.
     * This method sets the default values for various options.
     */
    protected function initOptions()
    {
        Html::addCssClass($this->options, 'alert');
        Html::addCssClass($this->options, 'fade');
        Html::addCssClass($this->options, 'in');

        if ($this->closeButton !== false) {
            $this->closeButton = array_merge([
                'data-dismiss' => 'alert',
                'aria-hidden' => 'true',
                'class' => 'close',
            ], $this->closeButton);
        }
    }
}
