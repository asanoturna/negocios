<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\models\Resourcerequest;

$this->title = 'Recursos Solicitados';
?>
<div class="resourcerequest-index">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped table-hover'],
        'columns' => [
            [
              'attribute' => 'id',
              'enableSorting' => true,
              'contentOptions'=>['style'=>'width: 3%;text-align:center'],
              'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ], 
            [
              'attribute' => 'created',
              'enableSorting' => true,
              'contentOptions'=>['style'=>'width: 4%;text-align:center'],
              'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
              'format' => ['date', 'php:d/m/Y'],
            ],              
            [
            'attribute' => 'client_name',
            'contentOptions'=>['style'=>'width: 18%;text-align:left;text-transform: uppercase'],
            'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],            
            [
              'attribute' => 'location_id',
              'enableSorting' => true,
              'value' => function ($model) {                      
                      return $model->location->shortname;
                      },
              'filter' => ArrayHelper::map(Location::find()->orderBy('shortname')->asArray()->all(), 'id', 'shortname'),
              'contentOptions'=>['style'=>'width: 5%;text-align:center'],
              'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],   
            [
                'attribute' => 'value_request',
                'format' => 'raw',
                'enableSorting' => true,
                'contentOptions'=>['style'=>'width: 5%;text-align:center'],
                'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],     
            [
                'attribute' => 'requested_month',
                'enableSorting' => true,
                'filter' => Resourcerequest::$Static_requested_month,
                'contentOptions'=>['style'=>'width: 18%;text-align:left'],
                'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],     
            [
                'attribute' => 'requested_year',
                'enableSorting' => true,

                'filter' => Resourcerequest::$Static_requested_year,
                'contentOptions'=>['style'=>'width: 18%;text-align:left'],
                'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],                           
            // 'expiration_register',
            // 'lastupdate_register',
            // 'value_capital',
            // 'observation:ntext',
            // 'has_transfer',
            // 'receive_credit',
            // 'add_insurance',
            // 'requested_month',
            // 'requested_year',
            // 'location_id',
            // 'user_id',
            // 'resource_type_id',
            // 'resource_purpose_id',
            // 'resource_status_id',

            [
            'class' => 'yii\grid\ActionColumn',
            'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],
        ],
    ]); ?>

</div>
