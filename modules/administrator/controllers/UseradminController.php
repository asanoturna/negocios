<?php

namespace app\modules\administrator\controllers;

use Yii;
use app\modules\administrator\models\Useradmin;
use app\modules\administrator\models\UseradminSearch;
use app\modules\administrator\models\SignupForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\base\Security;
use yii\web\UploadedFile;

class UseradminController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::classname(),
                'only'  => ['index','create','view','update','signup','avatar'],
                'rules' => [
                    [
                        'actions' => ['index','create','view','update','signup','avatar'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function(){
                            return (Yii::$app->user->identity->role_id == 99);
                        },
                        'denyCallback' => function(){
                            return Yii::$app->response->redirect(['site/login']);
                        }
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
        $searchModel = new UseradminSearch();
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

    public function actionCreate()
    {
        $model = new Useradmin();
        $model->auth_key = Yii::$app->security->generateRandomString();
        //$model->password_hash = Yii::$app->security->generatePasswordHash($model->password);

        $model->created_at = date('Y-m-d');
        $model->updated_at = date('Y-m-d');
        //$model->status = 1;

        if ($model->load(Yii::$app->request->post())) {

            $file = $model->uploadImage();
 
            if ($model->save()) {

                if ($file !== false) {

                    if(!is_dir(Yii::$app->params['usersAvatars'])){
                    mkdir(Yii::$app->params['usersAvatars'], 0777, true);
                    }
                    $path = $model->getImageFile();
                    $file->saveAs($path);
                }
                Yii::$app->session->setFlash('useradmin-success', 'Inclusão realizada com sucesso!');
                return $this->redirect(['index']);
            } else {
                // error in saving model
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionSignup()
    {
        $model = new SignupForm();

        $model->status = 1;

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                Yii::$app->session->setFlash('useradmin-success', 'Inclusão realizada com sucesso!');
                return $this->redirect(['index']);
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }     

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $oldFile = $model->getImageFile();
        $oldattachment = $model->avatar;
        $oldFileName = $model->filename;

        if ($model->load(Yii::$app->request->post())) {

            $file = $model->uploadImage();
 
            if ($file === false) {
                $model->avatar = $oldattachment;
                $model->filename = $oldFileName;
            }
 
            if ($model->save()) {

                if ($file !== false && unlink($oldFile)) {
                    $path = $model->getImageFile();
                    $file->saveAs($path);
                }
                Yii::$app->session->setFlash("useradmin-success", "Alteração realizada com sucesso!");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('error', 'Erro ao gravar');
            }
        }
        return $this->render('update', [
            'model'=>$model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Useradmin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Página não encontrada!');
        }
    }   
}