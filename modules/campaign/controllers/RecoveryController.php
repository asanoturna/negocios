<?php

namespace app\modules\campaign\controllers;

use Yii;
use app\modules\campaign\models\Recovery;
use app\modules\campaign\models\RecoverySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\SqlDataProvider;

class RecoveryController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::classname(),
                'only'  => ['index','create','view','update','regulation','ranking'],
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
        // http://blog.neattutorials.com/examples/pjax/web/site/form-submission
        $model = $this->findModel($id);

        $model->updated = date('Y-m-d');
        //$model->status = 0;
        $model->negotiator_id = Yii::$app->user->id;    

        $randomString = Yii::$app->request->post('referencevalue');     

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'randomString' => $randomString,
            ]);
        }
    }

    public function actionManager($id)
    {
        $model = $this->findModel($id);

        $model->approvedby = Yii::$app->user->id;
        $model->approvedin = date('Y-m-d');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('campaign-success', 'Registro alterado com sucesso!');
            return $this->redirect(['index']);
        } else {
            return $this->render('manager', [
                'model' => $model,
            ]);
        }
    }    

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionRanking()
    {
        $model = new Recovery();

        $dataRankingUser = new SqlDataProvider([
            'sql' => "SELECT user.id, avatar, fullname, 
                COUNT(if(campaign_recovery.status = 0, campaign_recovery.id, NULL)) as  pendente,
                COUNT(if(campaign_recovery.status = 1, campaign_recovery.id, NULL)) as  aprovado
                FROM campaign_recovery
                INNER JOIN `user` 
                ON campaign_recovery.negotiator_id = `user`.id
                GROUP BY `user`.id
                ORDER BY aprovado DESC",
            'totalCount' => 100,
            'sort' =>false,
            'key'  => 'fullname',
            'pagination' => [
                'pageSize' => 100,
            ],
        ]);      

        $dataRankingLocation = new SqlDataProvider([
            'sql' => "SELECT location.id, shortname, fullname, 
                COUNT(if(campaign_recovery.status = 0, campaign_recovery.id, NULL)) as  pendente,
                COUNT(if(campaign_recovery.status = 1, campaign_recovery.id, NULL)) as  aprovado
                FROM campaign_recovery
                INNER JOIN `location` 
                ON campaign_recovery.location_id = location.id
                GROUP BY `location`.id
                ORDER BY aprovado DESC",
            'totalCount' => 100,
            'sort' =>false,
            'key'  => 'fullname',
            'pagination' => [
                'pageSize' => 100,
            ],
        ]); 

        return $this->render('ranking', [
            'model' => $model,
            'dataRankingUser' => $dataRankingUser,
            'dataRankingLocation' => $dataRankingLocation,           
        ]);
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