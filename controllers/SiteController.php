<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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

    public function actionAdministration()
    {
        return $this->render('administration');
    }

    public function actionLocations()
    {       
        // if (Yii::$app->user->identity->can_admin == 1) {
        //     return $this->render('locations');
        // } else {
        //     throw new NotFoundHttpException('Não possui permissão');
        // }   
        return $this->render('locations');     
    }

    public function actionMap()
    {
        return $this->render('map');
    }    

    public function actionUsers()
    {
        $searchModel = new \app\models\UseradminSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('users', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);         
        //return $this->render('users');        
    }    

    public function actionBirthdate()
    {
        // $searchModel = new \app\models\UseradminSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // return $this->render('users', [
        //     'searchModel' => $searchModel,
        //     'dataProvider' => $dataProvider,
        // ]);         
        return $this->render('birthdate');        
    }               
}