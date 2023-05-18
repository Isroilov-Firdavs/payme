<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\User;

use uzdevid\payme\merchant\CheckoutUrl;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
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
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $merchant_id = '';
        
        $account = [
            'user_id' => 1,
        ];
        
        $amount = 100000;
        
        $params = [
            'l' => 'uz',
            'c' => 'https://example.com/checkout/success',
            'ct' => 15000,
            'cr' => 'uzs'
        ];

        $checkout_url = CheckoutUrl::generate($merchant_id, $account, $amount, $params);
        return $this->render('index', compact('checkout_url'));
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

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $model = User::find()->all();
        return $this->render('about', ['model' => $model]);
    }

    public function actionLogin()
    {
        return $this->render('login');
    }
}
