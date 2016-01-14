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
use yii\data\SqlDataProvider;


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
        $model = new Dailyproductivity();

        $url = Yii::$app->getRequest()->getQueryParam('product_id');
        $product = isset($url) ? $url : '"%"';

        $dataProviderValor = new SqlDataProvider([
            'sql' => "SELECT avatar, full_name as seller, sum(companys_revenue) as total
                    FROM daily_productivity
                    INNER JOIN `profile` ON daily_productivity.seller_id = `profile`.user_id
                    WHERE daily_productivity_status_id = 99 AND product_id LIKE $product
                    GROUP BY seller_id
                    ORDER BY sum(companys_revenue) DESC",
            'totalCount' => 300,
            'sort' =>false,
            'key'  => 'seller',
            'pagination' => [
                'pageSize' => 300,
            ],
        ]);

        $dataProviderQtde = new SqlDataProvider([
            'sql' => "SELECT avatar, full_name as seller, sum(quantity) as total
                    FROM daily_productivity
                    INNER JOIN `profile` ON daily_productivity.seller_id = `profile`.user_id
                    WHERE daily_productivity_status_id = 99 AND product_id LIKE $product
                    GROUP BY seller_id
                    ORDER BY sum(quantity) DESC",
            'totalCount' => 300,
            'sort' =>false,
            'key'  => 'seller',
            'pagination' => [
                'pageSize' => 300,
            ],
        ]);

        return $this->render('performance_user', [
            'model' => $model,
            'dataProviderValor' => $dataProviderValor,
            'dataProviderQtde' => $dataProviderQtde,        
        ]);
    }   

    public function actionPerformance_location()
    {
        $model = new Dailyproductivity();

        $url = Yii::$app->getRequest()->getQueryParam('product_id');
        $product = isset($url) ? $url : '"%"';

        $dataProviderValor = new SqlDataProvider([
            'sql' => "SELECT shortname as sigla, fullname as local, sum(companys_revenue) as total
                    FROM daily_productivity
                    INNER JOIN location ON daily_productivity.location_id = location.id
                    WHERE daily_productivity_status_id = 99 AND product_id LIKE $product
                    GROUP BY location_id
                    ORDER BY sum(companys_revenue) DESC",
            'totalCount' => 50,
            'sort' =>false,
            'key'  => 'local',
            'pagination' => [
                'pageSize' => 50,
            ],
        ]);

        $dataProviderQtde = new SqlDataProvider([
            'sql' => "SELECT shortname as sigla, fullname as local, sum(quantity) as total
                    FROM daily_productivity
                    INNER JOIN location ON daily_productivity.location_id = location.id
                    WHERE daily_productivity_status_id = 99 AND product_id LIKE $product
                    GROUP BY location_id
                    ORDER BY sum(quantity) DESC",
            'totalCount' => 30,
            'sort' =>false,
            'key'  => 'local',
            'pagination' => [
                'pageSize' => 30,
            ],
        ]);

        return $this->render('performance_location', [
            'model' => $model,
            'dataProviderValor' => $dataProviderValor,
            'dataProviderQtde' => $dataProviderQtde,        
        ]);
    }   

    public function actionPerformance_overview()
    {
        $model = new Dailyproductivity();

        $thisyear  = date('Y');
        $thismonth = date('m');
        $lastmonth = date('m', strtotime('-1 months', strtotime(date('Y-m-d'))));    
        $url = Yii::$app->getRequest()->getQueryParam('mounth');
        $mounth = isset($url) ? $url : $thismonth;
        $model->mounth = $mounth;
        
        $command = Yii::$app->db->createCommand(
        "SELECT
            t2. NAME AS p,
            SUM(t1. VALUE) AS t,
            SUM(t1.quantity) AS q
        FROM
            daily_productivity AS t1
        LEFT JOIN product AS t2 ON t1.product_id = t2.id
        WHERE MONTH(date) = $mounth AND daily_productivity_status_id = 99
        GROUP BY
            p");
        $overview = $command->queryAll();

        $p = array();
        $t = array();
        $q = array();
 
        for ($i = 0; $i < sizeof($overview); $i++) {
           $p[] = $overview[$i]["p"];
           $t[] = (int) $overview[$i]["t"];
           $q[] = (int) $overview[$i]["q"];
        }

        return $this->render('performance_overview', [
            'model' => $model,
            'p' => $p,
            't' => $t,
            'q' => $q,
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

        $model->daily_productivity_status_id = 0;
        $model->user_id = Yii::$app->user->id;
        $model->created = date('Y-m-d');
        $model->updated = date('Y-m-d');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash("dailyproductivity-success", "Registro gravado com sucesso. Aguarde o Gestor de Produtos efetiva-lo!");
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
