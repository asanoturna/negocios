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

<div class="row">
  <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
  <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
</div>

<hr/>
    <div class="panel panel-primary">
    <div class="panel-heading"><b>Pesquisar</b></div>
      <div class="panel-body">
        <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
      </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped table-bordered table-hover'],
        'emptyText'    => '</br><p class="text-info">Nenhum registro encontrado!</p>',   
        'summary' => "<p class=\"text-info pull-right\"><h5>Registros: {totalCount} </h5></p>",  
        'rowOptions'   => function ($model, $index, $widget, $grid) {
            return [
                'id' => $model['id'], 
                'onclick' => 'location.href="'
                    . Yii::$app->urlManager->createUrl('dailyproductivity/view') 
                    . '&id="+(this.id);',
                'style' => "cursor: pointer",
            ];
        },       
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
            'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
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
            'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],            
            [
             'attribute' => 'product_id',
             'enableSorting' => true,
             'value' => function ($model) {                      
                    return $model->product->name;
                    },
             'filter' => Product::getHierarchy(),
             'contentOptions'=>['style'=>'width: 20%;text-align:left'],
             'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],
            [
             'attribute' => 'value',
             'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],
            [
             'attribute' => 'quantity',
             'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
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
                'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
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
                'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],  
            [
                'attribute' => 'daily_productivity_status_id',
                'format' => 'raw',
                'enableSorting' => true,
                'value' => function ($model) {                      
                        return $model->daily_productivity_status_id === 0 ? "<span class=\"label label-warning\">".$model->dailyProductivityStatus->name."</span>" : "<span class=\"label label-success\">".$model->dailyProductivityStatus->name."</span>";
                        },
                'filter' => ArrayHelper::map(Dailyproductivitystatus::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
                'contentOptions'=>['style'=>'width: 10%;text-align:center'],
                'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],                         
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
