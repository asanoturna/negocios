<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\models\Product;
use app\models\Modality;
use app\models\User;
use yii\data\SqlDataProvider;

$this->title = 'Produtividade Diária';

?>
<div class="dailyproductivity-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_menu'); ?>
    <hr/>
    <?php
    $dataProviderValor = new SqlDataProvider([
        'sql' => "SELECT shortname as sigla, fullname as local, sum(companys_revenue) as total
                FROM daily_productivity
                INNER JOIN location ON daily_productivity.location_id = location.id
                GROUP BY location_id
                ORDER BY sum(companys_revenue) DESC",
        'totalCount' => 30,
        'sort' =>false,
        'key'  => 'local',
        'pagination' => [
            'pageSize' => 30,
        ],
    ]);
    $dataProviderQtde = new SqlDataProvider([
        'sql' => "SELECT shortname as sigla, fullname as local, sum(quantity) as total
                FROM daily_productivity
                INNER JOIN location ON daily_productivity.location_id = location.id
                GROUP BY location_id
                ORDER BY sum(quantity) DESC",
        'totalCount' => 30,
        'sort' =>false,
        'key'  => 'local',
        'pagination' => [
            'pageSize' => 30,
        ],
    ]);
    ?>
    <div class="row">
        <div class="col-md-6">
        <h3>Ranking de Vendas <small>Por Valor</small></h3>
        <?= GridView::widget([
          'dataProvider' => $dataProviderValor,
          'emptyText'    => '</br><p class="text-danger">Nenhuma informação encontrada</p>',
          'summary'      =>  '',
          'showHeader'   => false,        
          'tableOptions' => ['class'=>'table table-striped table-hover '],
          'columns' => [   
                // [
                //     'attribute' => 'avatar',
                //     'format' => 'image',
                //     'value' => function ($data) {                      
                //         return Yii::$app->request->BaseUrl.'/images/users/'.$data["avatar"];
                //     },
                //     'contentOptions'=>['style'=>'width: 20%;text-align:center'],
                // ],   
                [
                    'attribute' => 'sigla',
                    'format' => 'html',
                    'value' => function ($data) {                      
                        return $data["sigla"];
                    },
                    'contentOptions'=>['style'=>'width: 10%;text-align:center'],                    
                ],                                 
                [
                    'attribute' => 'local',
                    'format' => 'raw',
                    'value' => function ($data) {                      
                        return $data["local"];
                    },
                    'contentOptions'=>['style'=>'width: 60%;text-align:left;vertical-align: middle;'],
                ],  
                [
                    'attribute' => 'total',
                    'format' => 'raw',
                    'value' => function ($data) {                      
                        return "<b>R$ ".$data["total"]."</b>";
                    },
                    'contentOptions'=>['style'=>'width: 20%;text-align:right;vertical-align: middle;font-size: 16px'],
                ],                        

            ],
        ]); ?>
        </div>
        <div class="col-md-6">
        <h3>Ranking de Vendas <small>Por Quantidade</small></h3>
        <?= GridView::widget([
          'dataProvider' => $dataProviderQtde,
          'emptyText'    => '</br><p class="text-danger">Nenhuma informação encontrada</p>',
          'summary'      =>  '',
          'showHeader'   => false,        
          'tableOptions' => ['class'=>'table table-striped table-hover '],
          'columns' => [   
                // [
                //     'attribute' => 'avatar',
                //     'format' => 'image',
                //     'value' => function ($data) {                      
                //         return Yii::$app->request->BaseUrl.'/images/users/'.$data["avatar"];
                //     },
                //     'contentOptions'=>['style'=>'width: 20%;text-align:center'],
                // ],   
                [
                    'attribute' => 'sigla',
                    'format' => 'html',
                    'value' => function ($data) {                      
                        return $data["sigla"];
                    },
                    'contentOptions'=>['style'=>'width: 10%;text-align:center'],                    
                ],                                 
                [
                    'attribute' => 'local',
                    'format' => 'raw',
                    'value' => function ($data) {                      
                        return $data["local"];
                    },
                    'contentOptions'=>['style'=>'width: 60%;text-align:left;vertical-align: middle;'],
                ],  
                [
                    'attribute' => 'total',
                    'format' => 'raw',
                    'value' => function ($data) {                      
                        return "<b>".$data["total"]."</b>";
                    },
                    'contentOptions'=>['style'=>'width: 20%;text-align:right;vertical-align: middle;font-size: 16px'],
                ],                        

            ],
        ]); ?>
        </div>
    </div>
</div>