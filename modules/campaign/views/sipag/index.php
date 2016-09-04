<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\models\User;

$this->title = 'Multirão';
?>
<div class="opcredit-index">

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
        'tableOptions' => ['class'=>'table table-striped table-hover'],
        'emptyText'    => '</br><p class="text-info">Nenhum registro encontrado!</p>',        
        'columns' => [
            [
            'attribute' => 'id',
            'contentOptions'=>['style'=>'width: 4%;text-align:center'],
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
            ],
            [
            'attribute' => 'establishmentname',
            'contentOptions'=>['style'=>'width: 30%;text-align:left'],
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