<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\LoginForm;
use app\models\Utilities;
use app\models\SignupForm;

class AuthController extends Controller
{
      /**
       * {@inheritdoc}
       */
      public function behaviors()
      {
            return [
                  'access' => [
                        'class' => AccessControl::className(),
                        'only' => ['logout'],
                        'rules' => [
                              [
                                    'actions' => ['logout'],
                                    'allow' => true,
                                    'roles' => ['@'],
                              ],
                        ],
                  ],
                  'verbs' => [
                        'class' => VerbFilter::className(),
                        'actions' => [
                              'logout' => ['post'],
                        ],
                  ],
            ];
      }

      /**
       * {@inheritdoc}
       */
      public function actions()
      {
            return [
                  'error' => [
                        'class' => 'yii\web\ErrorAction',
                  ],
                  'captcha' => [
                        'class' => 'yii\captcha\CaptchaAction',
                        'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                  ],
            ];
      }

      /**
       * Login action.
       *
       * @return Response|string
       */
      public function actionSignin()
      {
            if (!Yii::$app->user->isGuest) {
                  return $this->goHome();
            }

            $model = new LoginForm();
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                  return $this->goBack();
            }

            $model->password = '';
            return $this->render('signin', [
                  'model' => $model,
            ]);
      }

      public function actionSignup()
      {
            $signup = new SignupForm();

            if (Yii::$app->request->isPost)
            {
                  $signup->load(Yii::$app->request->post());
                  if ($signup->signup())
                  {
                        $model = new LoginForm();
                        $model->email = $signup->email;
                        $model->password = $signup->password;
                        $model->rememberMe = false;
                        $model->login();

                        return $this->redirect(['site/index']);
                  }
            }

            return $this->render('signup', [
                  'model' => $signup,
            ]);
      }

      /**
       * Logout action.
       *
       * @return Response
       */
      public function actionLogout()
      {
            Yii::$app->user->logout();

            return $this->goHome();
      }
}