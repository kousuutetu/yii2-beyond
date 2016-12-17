<?php

namespace maple\beyond;

class ErrorAction extends \yii\web\ErrorAction
{
    /**
     * Runs the action
     *
     * @return string result content
     */
    public function run()
    {
        $this->controller->layout = 'nonav';
        return parent::run();
    }
}
