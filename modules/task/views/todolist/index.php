<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\task\models\Category;
use app\modules\task\models\Status;
use app\models\Department;

$this->title = 'Atividades';
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
            'contentOptions'=>['style'=>'width: 10%;text-align:left'],
            'headerOptions' => ['class' => 'text-center'],
            ],

            [
            'attribute' => 'department_id',
            'format' => 'raw',
            'enableSorting' => true,
            'value' => function ($model) {                      
                    return $model->department->name;
                    },
            'filter' => ArrayHelper::map(Department::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
            'contentOptions'=>['style'=>'width: 15%;text-align:center'],
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
            'contentOptions'=>['style'=>'width: 15%;text-align:center'],
            'headerOptions' => ['class' => 'text-center'],
            ],

            [
            'attribute' => 'status_id',
            'format' => 'raw',
            'enableSorting' => true,
            'value' => function ($model) {                      
                    return $model->status->name;
                    },
            'filter' => ArrayHelper::map(Status::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
            'contentOptions'=>['style'=>'width: 15%;text-align:center'],
            'headerOptions' => ['class' => 'text-center'],
            ],

            'deadline',
            'priority',
            // 'owner_id',
            'responsible_id',
            // 'is_done',
            // 'created',
            // 'updated',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
    </div>
</div>
