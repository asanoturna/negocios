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
use yii\web\UploadedFile;

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

        $thisyear  = date('Y');
        $thismonth = date('m');       

        $url = Yii::$app->getRequest()->getQueryParam('user_id');
        $user_id = isset($url) ? $url : Yii::$app->user->identity->id;

        $commandstats = Yii::$app->db->createCommand(
            "SELECT COUNT(v.id) as total_s, s.`name` as stats, s.hexcolor as color
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
        $color = array();
 
        for ($i = 0; $i < sizeof($report_stats); $i++) {
           $stats[] = $report_stats[$i]["stats"];
           $color[] = $report_stats[$i]["color"];
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

        $commandTotal = Yii::$app->db->createCommand("SELECT COUNT(v.id) as fulltotal
                    FROM business_visits v WHERE v.user_id LIKE $user_id"
                    );
        $fulltotal = $commandTotal->queryScalar();   

        $commandEffect = Yii::$app->db->createCommand("SELECT COUNT(v.id) as totaleffect
                    FROM business_visits v WHERE v.user_id LIKE $user_id AND v.visits_status_id =3"
                    );
        $totaleffect = $commandEffect->queryScalar();  

        $commandImages = Yii::$app->db->createCommand("SELECT COUNT(i.id) as total_images
                    FROM visits_images i
                    INNER JOIN business_visits b
                    ON i.business_visits_id = b.id
                    WHERE b.user_id = $user_id "
            );
        $total_images = $commandImages->queryScalar();             

        return $this->render('report_user', [
            'model' => $model,  
            'total_s' => $total_s,
            'stats' => $stats,
            'color' => $color,
            'total_f' => $total_f,
            'finality' => $finality, 
            'fulltotal' => $fulltotal,
            'totaleffect'   => $totaleffect,
            'total_images' => $total_images
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
               
        if ($model->load(Yii::$app->request->post())) {
            // process uploaded image file instance
            $file = $model->uploadImage();
 
            if ($model->save()) {
                // upload only if valid uploaded file instance found
                if ($file !== false) {
                    // Create the ID folder 
                    $idfolder = 'teste';
                    //$idfolder = str_pad($idfolder, 6, "0", STR_PAD_LEFT); // add 0000+ID
                    if(!is_dir(Yii::$app->params['uploadUrl'] . $idfolder)){
                    mkdir(Yii::$app->params['uploadUrl'] . $idfolder, 0777, true);
                    }
                    $path = $model->getImageFile();
                    $file->saveAs($path);
                }
                //Yii::$app->session->setFlash("Entry-success", Yii::t("app", "Entry successfully included"));
                return $this->redirect(['index']);
            } else {
                // error in saving model
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
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
