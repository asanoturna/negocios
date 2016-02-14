<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\models\Person;
use app\models\Visitsfinality;
use app\models\Visitsstatus;
use app\models\Visitsimages;
use app\models\User;

$this->title = 'Visitas dos Gerentes';
?>
<div class="visits-index">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped table-hover'],
        'emptyText'    => '</br><p class="text-info">Nenhum registro encontrado!</p>',          
        'columns' => [
            [
            'attribute' => 'id',
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],
            [
            'attribute' => 'user_id',
            'format' => 'raw',
            'enableSorting' => true,
            'value' => function ($model) {                      
                return $model->user ? $model->user->username : '<span class="text-danger"><em>Nenhum</em></span>';
            },
            'filter' => ArrayHelper::map(User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
            'contentOptions'=>['style'=>'width: 10%;text-align:left'],
            'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],
            [
            'attribute' => 'location_id',
            'format' => 'raw',
            'enableSorting' => true,
            'value' => function ($model) {                      
                    return $model->location->shortname;
                    },  
            'filter' => ArrayHelper::map(Location::find()->orderBy('shortname')->asArray()->all(), 'id', 'shortname'),
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],             
            [
            'attribute' => 'date',
            'enableSorting' => true,
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            'format' => ['date', 'php:d/m/Y'],
            ], 
            [
            'attribute' => 'company_person',
            'contentOptions'=>['style'=>'width: 15%;text-align:center'],
            'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ], 
            [
            'attribute' => 'person_id',
            'format' => 'raw',
            'enableSorting' => true,
            'value' => function ($model) {                      
                    return $model->person->name;
                    },  
            'filter' => ArrayHelper::map(Person::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
            'contentOptions'=>['style'=>'width: 3%;text-align:center'],
            'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],            
            [
            'attribute' => 'visits_finality_id',
            'format' => 'raw',
            'enableSorting' => true,
            'value' => function ($model) {                      
                    return $model->visitsFinality->name;
                    },                
            'filter' => ArrayHelper::map(VisitsFinality::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
            'contentOptions'=>['style'=>'width: 15%;text-align:center'],
            'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],             
            [
            'attribute' => 'visits_status_id',
            'format' => 'raw',
            'enableSorting' => true,
            
            'value' => function ($model) {                      
                  return '<span style="color:'.$model->visitsStatus->hexcolor.'">'.$model->visitsStatus->name.'</span>';
                  },                                      
            'filter' => ArrayHelper::map(VisitsStatus::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
            'contentOptions'=>['style'=>'width: 10%;text-align:center'],
            'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],             
            [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Ações',
            'contentOptions'=>['style'=>'width: 10%;text-align:right'],
            'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            'template' => '{has_map} {has_attach} {has_img} {view} {update} {delete}',
                'buttons' => [
                    'has_attach' => function ($url, $model) {
                        return $model->localization_map <> '' ? Html::a('<span class="glyphicon glyphicon-map-marker" ></span>', $url, [
                                    'title' => 'Possui Mapa',
                        ]): Html::a('<span class="glyphicon glyphicon-ban-circle" ></span>', "#", [
                                    'title' => 'Alteração não permitida!',
                        ]);
                    },                  
                    'has_map' => function ($url, $model) {
                        return $model->localization_map <> '' ? Html::a('<span class="glyphicon glyphicon-map-marker" ></span>', $url, [
                                    'title' => 'Possui Mapa',
                        ]): Html::a('<span class="glyphicon glyphicon-ban-circle" ></span>', "#", [
                                    'title' => 'Alteração não permitida!',
                        ]);
                    },
                    'has_img' => function ($url, $model) {
                        return $model->localization_map <> '' ? Html::a('<span class="glyphicon glyphicon-map-marker" ></span>', $url, [
                                    'title' => 'Possui Mapa',
                        ]): Html::a('<span class="glyphicon glyphicon-ban-circle" ></span>', "#", [
                                    'title' => 'Alteração não permitida!',
                        ]);
                    },                                   
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open" ></span>', $url, [
                                    'title' => 'Visualizar',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return $model->user_id <> 98 ? Html::a('<span class="glyphicon glyphicon-pencil" ></span>', $url, [
                                    'title' => 'Alterar',
                        ]): Html::a('<span class="glyphicon glyphicon-ban-circle" ></span>', "#", [
                                    'title' => 'Alteração não permitida!',
                        ]);
                    },
                    // 'delete' => function ($url, $model) {
                    //         return $model->user_id <> 98 ?  Html::a('<span class="glyphicon glyphicon-upload" ></span>', $url, [
                    //                     'title' => 'Anexar Arquivo',
                    //                     //'class'=>'btn btn-primary btn-xs',                                
                    //     ]) : '';
                    // },
                ],

            ],            
        ],
    ]); ?>

</div>
