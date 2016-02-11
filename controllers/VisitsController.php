<?php

namespace app\controllers;

use Yii;
use app\models\Visits;
use app\models\VisitsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Security;
use yii\data\SqlDataProvider;

class VisitsController extends Controller
{
    public function behaviors()
    {
        return [
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
        $searchModel = new VisitsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionReport_general()
    {
        $model = new Visits();

        return $this->render('report_general', [
            'model' => $model,    
        ]);
    }

    public function actionReport_user()
    {
        $model = new Visits();

        $url = Yii::$app->getRequest()->getQueryParam('user_id');
        $user_id = isset($url) ? $url : '"%"';

        $commandstats = Yii::$app->db->createCommand(
            "SELECT COUNT(v.id) as total_s, s.`name` as stats
            FROM business_visits v
            INNER JOIN visits_status s
            ON v.visits_status_id = s.id
            WHERE v.user_id LIKE $user_id
            GROUP BY stats
            ORDER BY total_s DESC"
                );
        $report_stats = $commandstats->queryAll();

        $total_s = array();
        $stats = array();
 
        for ($i = 0; $i < sizeof($report_stats); $i++) {
           $stats[] = $report_stats[$i]["stats"];
           $total_s[] = (int) $report_stats[$i]["total_s"];
        }

        $commandfinality = Yii::$app->db->createCommand(
            "SELECT COUNT(v.id) as total_f, f.`name` as finality
            FROM business_visits v
            INNER JOIN visits_finality f
            ON v.visits_finality_id = f.id
            WHERE v.user_id LIKE $user_id
            GROUP BY finality
            ORDER BY total_f DESC"
                );
        $report_finality = $commandfinality->queryAll();      

        $total_f = array();
        $finality = array();
 
        for ($i = 0; $i < sizeof($report_finality); $i++) {
           $finality[] = $report_finality[$i]["finality"];
           $total_f[] = (int) $report_finality[$i]["total_f"];
        }        

        return $this->render('report_user', [
            'model' => $model,  
            'total_s' => $total_s,
            'stats' => $stats,
            'total_f' => $total_f,
            'finality' => $finality,            
        ]);        
    }

    public function actionReport_location()
    {
        $model = new Visits();

        return $this->render('report_location', [
            'model' => $model,    
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
        $model = new Visits();

        $model->visits_status_id = 1;
        $model->user_id = Yii::$app->user->id;
        $model->ip = '127.0.0.1';
        $model->created = date('Y-m-d');
               
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
        
        $model->ip = '127.0.0.1';
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
        if (($model = Visits::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
