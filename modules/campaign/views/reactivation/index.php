<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\models\User;

$this->title = 'Reativação de Associados';
?>
<div class="capitalaction-index">

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
            'contentOptions'=>['style'=>'width: 4%;text-align:center'],
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
            ],
            [
            'attribute' => 'client_name',
            'contentOptions'=>['style'=>'width: 30%;text-align:center'],
            ],             
            [
            'attribute' => 'client_risk',
            'contentOptions'=>['style'=>'width: 10%;text-align:center'],
            ],   
            [
            'attribute' => 'client_doc',
            'contentOptions'=>['style'=>'width: 10%;text-align:center'],
            ],
            [
            'attribute' => 'client_last_renovated_register',
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            ],  
            [
            'attribute' => 'client_income',
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            ],  
            [
            'class' => 'yii\grid\ActionColumn',
            'contentOptions'=>['style'=>'width: 10%;text-align:center'],
            ],
        ],
    ]); ?>

</div>