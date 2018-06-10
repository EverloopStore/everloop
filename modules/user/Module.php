<?php

namespace app\modules\user;

use Yii;
use app\models\User;
use yii\filters\AccessControl;

/**
 * user module definition class
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
                            $user = User::findOne(Yii::$app->user->id);
                            return $user->managers != null ? $user->managers->credentials > 0 : null;
                        }
                    ]
                ]
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public $layout = '/profile';
    public $controllerNamespace = 'app\modules\user\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
