<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\data\SqlDataProvider;


class SiteController extends Controller
{
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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCoop()
    {
        return $this->render('coop');
    }    

    public function actionAdmin()
    {
        return $this->render('admin');
    }

    public function actionMap()
    {
        return $this->render('map');
    }

    public function actionUsers()
    {
        $dataProviderUsers = new SqlDataProvider([
            'sql' => "SELECT
                u.id, 
                p.avatar as avatar,
                u.username, 
                u.email,
                p.full_name,
                u.status,
                r.name
                FROM user u
                Inner JOIN profile p
                ON u.id = p.user_id
                INNER JOIN role r
                ON u.role_id = r.id
                ORDER BY u.username",
            'totalCount' => 100,
            //'sort' =>true,
            'key'  => 'u.id',
            'pagination' => [
                'pageSize' => 100,
            ],
        ]);
        return $this->render('users', [
            'model' => $model,
            'dataProviderUsers' => $dataProviderUsers,       
        ]);        
    }      

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}
