<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\models\Product;
use app\models\Modality;
use app\models\User;
use app\models\Dailyproductivitystatus;


$this->title = 'Produtividade Diária';

?>
<div class="dailyproductivity-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_menu'); ?>
    <hr/>
    <div class="panel panel-default">
    <div class="panel-heading"><b>Pesquisar</b></div>
      <div class="panel-body">
        <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
      </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped table-bordered'],
        'emptyText'    => '</br><p class="text-info">Nenhum registro encontrado!</p>',   
        'summary' => "<p class=\"text-info pull-right\"><h5>Registros: {totalCount} </h5></p>",         
        'columns' => [
            // [
            //  'attribute' => 'id',
            //  'enableSorting' => true,
            //  'contentOptions'=>['style'=>'width: 5%;text-align:left'],
            // ],
            [
             'attribute' => 'date',
             'enableSorting' => true,
             'contentOptions'=>['style'=>'width: 4%;text-align:center'],
             'format' => ['date', 'php:d/m/Y'],
            ],            
            [
             'attribute' => 'location_id',
             'enableSorting' => true,
             'value' => function ($model) {                      
                    return $model->location->shortname;
                    },
             'filter' => ArrayHelper::map(Location::find()->orderBy('shortname')->asArray()->all(), 'id', 'shortname'),
             'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            ],            
            [
             'attribute' => 'product_id',
             'enableSorting' => true,
             'value' => function ($model) {                      
                    return $model->product->name;
                    },
             'filter' => Product::getHierarchy(),
             'contentOptions'=>['style'=>'width: 20%;text-align:left'],
            ],
            [
             'attribute' => 'value',
             'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            ],
            [
             'attribute' => 'quantity',
             'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            ],
            // 'commission_percent',
            // 'companys_revenue',
            // 'daily_productivity_status_id',
            // 'buyer_document',
            // 'buyer_name',
            [
                'attribute' => 'seller_id',
                'format' => 'raw',
                'enableSorting' => true,
                'value' => function ($model) {                      
                    return $model->seller ? $model->seller->username : '<span class="text-danger"><em>Nenhum</em></span>';
                },
                'filter' => ArrayHelper::map(User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
                'contentOptions'=>['style'=>'width: 8%;text-align:left'],
            ],             
            [
                'attribute' => 'operator_id',
                'format' => 'raw',
                'enableSorting' => true,
                'value' => function ($model) {                      
                    return $model->operator ? $model->operator->username : '<span class="text-danger"><em>Nenhum</em></span>';
                },
                'filter' => ArrayHelper::map(User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
                'contentOptions'=>['style'=>'width: 8%;text-align:left'],
            ],  
            [
                'attribute' => 'daily_productivity_status_id',
                'format' => 'raw',
                'enableSorting' => true,
                'value' => function ($model) {                      
                        return $model->daily_productivity_status_id === 1 ? "<span class=\"label label-warning\">".$model->dailyProductivityStatus->name."</span>" : "<span class=\"label label-success\">".$model->dailyProductivityStatus->name."</span>";
                        },
                'filter' => ArrayHelper::map(Dailyproductivitystatus::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
                'contentOptions'=>['style'=>'width: 10%;text-align:center'],
            ],                         
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
