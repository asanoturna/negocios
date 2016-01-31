<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\models\Product;
use app\models\Modality;
use app\models\User;
use app\models\Dailyproductivitystatus;

$this->title = 'Gestão Produtividade Diária';
?>
<div class="managerdailyproductivity-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('//dailyproductivity/_menu'); ?>
    <hr/>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped table-hover'],  
        'columns' => [
            [
                'attribute' => 'date',
                'enableSorting' => true,
                'contentOptions'=>['style'=>'width: 4%;text-align:center'],
                'format' => ['date', 'php:d/m/Y'],
            ],           
            [
                'attribute' => 'user_id',
                'format' => 'raw',
                'enableSorting' => true,
                'value' => function ($model) {                      
                    return $model->user ? $model->user->username : '<span class="text-danger"><em>Nenhum</em></span>';
                },
                'filter' => ArrayHelper::map(User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
                'contentOptions'=>['style'=>'width: 7%;text-align:left'],
            ],              
            // [
            //  'attribute' => 'location_id',
            //  'enableSorting' => true,
            //  'value' => function ($model) {                      
            //         return $model->location->shortname;
            //         },
            //  'filter' => ArrayHelper::map(Location::find()->orderBy('shortname')->asArray()->all(), 'id', 'shortname'),
            //  'contentOptions'=>['style'=>'width: 7%;text-align:center'],
            // ],            
            [
                'attribute' => 'product_id',
                'enableSorting' => true,
                'value' => function ($model) {                      
                       return $model->product->name;
                       },
                'filter' => ArrayHelper::map(Product::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
                'contentOptions'=>['style'=>'width: 25%;text-align:left'],
            ],              
            [
                'attribute' => 'value',
                'format' => 'raw',
                'enableSorting' => true,
                'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            ],
            [
                'attribute' => 'commission_percent',
                'format' => 'raw',
                'enableSorting' => true,
                'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            ],            
            [
                'label' => 'Receita',
                'attribute' => 'companys_revenue',
                'format' => 'raw',
                'enableSorting' => true,
                'contentOptions'=>['style'=>'width: 5%;text-align:center'],
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
                'contentOptions'=>['style'=>'width: 7%;text-align:left'],
            ],             
            [
                'attribute' => 'operator_id',
                'format' => 'raw',
                'enableSorting' => true,
                'value' => function ($model) {                      
                    return $model->operator ? $model->operator->username : '<span class="text-danger"><em>Nenhum</em></span>';
                },
                'filter' => ArrayHelper::map(User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
                'contentOptions'=>['style'=>'width: 7%;text-align:left'],
            ],            
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'contentOptions'=>['style'=>'width: 8%;text-align:right'],
            ],
        ],
    ]); ?>

</div>
