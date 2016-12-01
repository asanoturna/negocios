<?php

namespace app\modules\task\controllers;

use Yii;
use app\modules\task\models\Todolist;
use app\modules\task\models\TodolistSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class TodolistController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionPerformance()
    {
        return $this->render('performance');
    }

    public function actionIndex()
    {
        $searchModel = new TodolistSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCalendar()
    {

    $events = Todolist::find()->all();

    $tasks = [];
    foreach ($events as $todolist)
    {
    $event = new \yii2fullcalendar\models\Event();
    $event->id = $todolist->id;
    //$event->className = 'btn';
    //$event->backgroundColor = '#0d4549';
    //$event->borderColor = '#0d4549';
    $event->backgroundColor = $todolist->priority->hexcolor;
    $event->borderColor = $todolist->priority->hexcolor;
    $event->title = $todolist->name;
    $event->start = $todolist->deadline;
    $tasks[] =  $event;
    }
    return $this->render('calendar',[
        'events' => $tasks,
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
        $model = new Todolist();

        $model->owner_id = Yii::$app->user->id;
        $model->status_id = 1;
        $model->created = date('Y-m-d');
        $model->updated = date('Y-m-d'); 

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
        if (($model = Todolist::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
