<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\task\models\Category;
use app\modules\task\models\Status;
use app\modules\task\models\Priority;
use app\models\Department;
use app\models\User;

$this->title = 'Painel de Atividades';
?>
<div class="todolist-index">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

    <div class="panel panel-default">
    <div class="panel-body"> 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
            'attribute' => 'id',
            'contentOptions'=>['style'=>'width: 4%;text-align:center'],
            'headerOptions' => ['class' => 'text-center'],
            ],
            [
            'attribute' => 'name',
            'contentOptions'=>['style'=>'width: 15%;text-align:left'],
            'headerOptions' => ['class' => 'text-center'],
            ],

            [
            'attribute' => 'department_id',
            'format' => 'raw',
            'enableSorting' => true,
            'value' => function ($model) {                      
                    return "<i class=\"fa fa-tag\" aria-hidden=\"true\" style=\"color:".$model->department->hexcolor."\"></i> " . $model->department->name;
                    },
            'filter' => ArrayHelper::map(Department::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
            'contentOptions'=>['style'=>'width: 10%;text-align:center'],
            'headerOptions' => ['class' => 'text-center'],
            ],
            [
            'attribute' => 'category_id',
            'format' => 'raw',
            'enableSorting' => true,
            'value' => function ($model) {                      
                    return $model->category->name;
                    },
            'filter' => ArrayHelper::map(Category::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
            'contentOptions'=>['style'=>'width: 10%;text-align:center'],
            'headerOptions' => ['class' => 'text-center'],
            ],
            // [
            // 'attribute' => 'priority_id',
            // 'format' => 'raw',
            // 'enableSorting' => true,
            // 'value' => function ($model) {                      
            //         return "<i class=\"fa fa-flag\" aria-hidden=\"true\" style=\"color:".$model->priority->hexcolor."\"></i> " . $model->priority->name;
            //         },
            // 'filter' => ArrayHelper::map(Priority::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
            // 'contentOptions'=>['style'=>'width: 10%;text-align:center'],
            // 'headerOptions' => ['class' => 'text-center'],
            // ],
            [
            'attribute' => 'deadline',
            'enableSorting' => true,
            'format' => ['date', 'php:d/m/Y'],
            'value' => function ($model) {                      
                    return $model->deadline;
                    },
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            'headerOptions' => ['class' => 'text-center'],
            ],
            [
            'attribute' => 'status_id',
            'format' => 'raw',
            'enableSorting' => true,
            'value' => function ($model) {                      
                    return "<span class=\"label label-default\">".$model->status->name."</span>";
                    },
            'filter' => ArrayHelper::map(Status::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
            'contentOptions'=>['style'=>'width: 10%;text-align:center'],
            'headerOptions' => ['class' => 'text-center'],
            ],
            [
            'attribute' => 'responsible_id',
            'format' => 'raw',
            'enableSorting' => true,
            'value' => function ($model) {
                         return $model->responsible->username;
                     },            
            'filter' => ArrayHelper::map(User::find()->where(['status' => 1])->orderBy('username')->asArray()->all(), 'id', 'username'),
            'filterInputOptions' => ['class' => 'form-control', 'style'=>'text-transform: lowercase'],
            'contentOptions'=>['style'=>'width: 10%;text-align:left;text-transform: lowercase'],
            'headerOptions' => ['class' => 'text-center'],
            ],
            [
            'class' => 'yii\grid\ActionColumn',
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            ],
        ],
    ]); ?>
    </div>
    </div>
</div>
