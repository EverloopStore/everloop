<?php

namespace app\modules\dashboard;

use Yii;
use app\models\User;
use app\models\Manager;
use yii\filters\AccessControl;
use app\models\Utilities;

/**
 * dashboard module definition class
 */
class Module extends \yii\base\Module
{
    public function behaviors()
    {
        return [
            'access'    =>  [
                'class' =>  AccessControl::className(),
                'denyCallback'  =>  function($rule, $action)
                {
                    throw new \yii\web\NotFoundHttpException();
                },
                'rules' =>  [
                    [
                        'allow' =>  true,
                        'matchCallback' =>  function($rule, $action)
                        {
                            // Fix for open 404 page if non-authored user
                            if (Yii::$app->user->id == null) return null;

                            $user = User::findOne(Yii::$app->user->id);
                            return $user->managers != null ? $user->managers->credentials > 1 : null;
                        }
                    ]
                ]
            ]
        ];
    }

    
    /**
     * {@inheritdoc}
     */
    public $layout = '/dashboard';
    public $controllerNamespace = 'app\modules\dashboard\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
