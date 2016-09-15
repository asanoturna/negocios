<?php

namespace app\modules\campaign\controllers;

use Yii;
use app\modules\campaign\models\Recovery;
use app\modules\campaign\models\RecoverySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class RecoveryController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::classname(),
                'only'  => ['index','create','view','update','regulation'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionRegulation()
    {
        return $this->render('regulation');
    }  

    public function actionIndex()
    {
        $searchModel = new RecoverySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    // public function actionCreate()
    // {
    //     $model = new Recovery();

    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     } else {
    //         return $this->render('create', [
    //             'model' => $model,
    //         ]);
    //     }
    // }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->updated = date('Y-m-d');
        $model->negotiator_id = Yii::$app->user->id;          

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Recovery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}