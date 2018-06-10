<?php

namespace app\modules\catalog;

/**
 * catalog module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $layout = "/catalog";
    public $controllerNamespace = 'app\modules\catalog\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
