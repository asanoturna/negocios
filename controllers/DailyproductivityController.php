<?php

namespace app\controllers;

use Yii;
use app\models\Dailyproductivity;
use app\models\DailyproductivitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\base\Security;


class DailyproductivityController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::classname(),
                'only'  => ['index','create','view','performance'],
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

    public function actionIndex()
    {
        $searchModel = new DailyproductivitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionListm($id)
    {
        $rows = \app\models\Modality::find()->where(['product_id' => $id])->all();
        echo "<option>--</option>";
        if(count($rows)>0){
            foreach($rows as $row){
                echo "<option value='$row->id'>$row->name</option>";
            }
        }
        else {
            echo "<option>Nenhum modalidade </option>";
        }
    }    

    public function actionPercent($id)
    {
        echo 2;
    } 

    public function actionPerformance_user()
    {
        $searchModel = new DailyproductivitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('performance_user', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }   

    public function actionPerformance_location()
    {
        $searchModel = new DailyproductivitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('performance_location', [
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

    public function actionCreate()
    {
        $model = new Dailyproductivity();

        $model->daily_productivity_status_id = 1;
        $model->user_id = Yii::$app->user->id;
        $model->created = date('Y-m-d');
        $model->updated = date('Y-m-d');

        // $value = (float)Yii::$app->request->post('value');
        // $commission_percent = Yii::$app->request->post('commission_percent');
        // $companys_revenue = $value*2;
        // $model->companys_revenue = abs($companys_revenue);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model->updated = date('Y-m-d');

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
        if (($model = Dailyproductivity::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
