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
    $dataProvider = new SqlDataProvider([
        'sql' => "SELECT seller_id as Vendedor, SUM(companys_revenue) as total
                FROM daily_productivity
                LEFT JOIN profile
                ON daily_productivity.id = profile.user_id
                GROUP BY seller_id
                ORDER BY total desc",
        'totalCount' => 200,
        'sort' =>false,
        'key'  => 'Vendedor',
        'pagination' => [
            'pageSize' => 200,
        ],
    ]);
    ?>
    <?= GridView::widget([
	    'dataProvider' => $dataProvider,
	    'emptyText'    => '</br><p class="text-danger">Nenhuma informação encontrada</p>',
	    'summary'      =>  '',
	    'showHeader'   => false,        
        'columns' => [           
            [
                'attribute' => 'Vendedor',
                'format' => 'raw',
                'value' => function ($data) {                      
                    return $data["Vendedor"];
                },
                'contentOptions'=>['style'=>'width: 8%;text-align:left'],
            ],  
            [
                'attribute' => 'total',
                'format' => 'raw',
                'value' => function ($data) {                      
                    return $data["total"];
                },
                'contentOptions'=>['style'=>'width: 8%;text-align:left'],
            ],                        

        ],
    ]); ?>
    
</div>
