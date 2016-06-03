<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\models\Product;
use app\models\Modality;
use app\models\User;
use yii\data\SqlDataProvider;

$thisyear  = date('Y');
$thismonth = date('m');   

$this->title = Yii::$app->params['appname'];
?>
<div class="site-index">

    <div class="row">
    
    <div class="col-sm-2">

    <?php  echo $this->render('_menu'); ?>

    </div>
    <div class="col-sm-10">
      <div class="panel panel-default">
      <div class="panel-heading"><b>Top 3 Produtividade do Mês</b></div>
      <div class="panel-body">
        <?php
        $dataProviderValor = new SqlDataProvider([
            'sql' => "SELECT user.id, avatar, username as seller, sum(companys_revenue) as total
                    FROM daily_productivity
                    INNER JOIN `user` ON daily_productivity.seller_id = `user`.id
                    WHERE daily_productivity_status_id = 2 AND MONTH(date) = $thismonth AND YEAR(date) = $thisyear
                    GROUP BY seller_id
                    ORDER BY sum(companys_revenue) DESC",
            'totalCount' => 3,
            'sort' =>false,
            'key'  => 'seller',
            'pagination' => [
                'pageSize' => 3,
            ],
        ]);
        $dataProviderQtde = new SqlDataProvider([
            'sql' => "SELECT user.id, avatar, username as seller, sum(quantity) as total
                    FROM daily_productivity
                    INNER JOIN `user` ON daily_productivity.seller_id = `user`.id
                    WHERE daily_productivity_status_id = 2 AND MONTH(date) = $thismonth AND YEAR(date) = $thisyear
                    GROUP BY seller_id
                    ORDER BY sum(quantity) DESC",
            'totalCount' => 3,
            'sort' =>false,
            'key'  => 'seller',
            'pagination' => [
                'pageSize' => 3,
            ],
        ]);        
        ?>
        <div class="col-md-6">
        <!-- ranking por valor -->
        <h4>Ranking de Vendas por Receita</h4>
        <?= GridView::widget([
          'dataProvider' => $dataProviderValor,
          'emptyText'    => '</br><p class="text-danger">Nenhuma informação encontrada</p>',
          'summary'      =>  '',
          'showHeader'   => false,        
          'tableOptions' => ['class'=>'table table-striped table-hover '],
          'columns' => [   
                [
                'format' => 'raw',
                'header' => 'Rank',
                'value' => function($model, $key, $index, $column) {
                    if ($index == 0) {
                       return Html::img(Yii::$app->request->BaseUrl.'/images/medal-gold-icon.png');
                    }elseif ($index == 1) {
                       return Html::img(Yii::$app->request->BaseUrl.'/images/medal-silver-icon.png'); 
                    }elseif ($index == 2) {
                       return Html::img(Yii::$app->request->BaseUrl.'/images/medal-bronze-icon.png'); 
                    }else {
                       return Html::img(Yii::$app->request->BaseUrl.'/images/no-medal-icon.png'); 
                    }
                }],                  
                [
                    'attribute' => 'avatar',
                    'format' => 'html',
                    'value' => function ($data) {
                        return Html::img(Yii::$app->params['usersAvatars'].$data["avatar"],
                            ['width' => '50px', 'class' => 'img-rounded img-responsive']);
                    },
                    'contentOptions'=>['style'=>'width: 20%;text-align:center;'],                    
                ],                                 
                [
                    'attribute' => 'seller',
                    'format' => 'raw',
                    'value' => function ($data) { 
                        return Html::a( $data["seller"], ['dailyproductivity/performance_user', 'seller_id' => $data["id"]], ['title' => 'Clique para ver o desempenho']);
                    },
                    'contentOptions'=>['style'=>'width: 50%;text-align:left;vertical-align: middle;text-transform: uppercase'],
                ],  
                [
                    'attribute' => 'total',
                    'format' => 'raw',
                    'value' => function ($data) {                      
                        return "<b>R$ ".$data["total"]."</b>";
                    },
                    'contentOptions'=>['style'=>'width: 30%;text-align:right;vertical-align: middle;font-size: 15px'],
                ],                        

            ],
        ]); ?>
        </div>
        <div class="col-md-6">
        <!-- ranking por quantidade -->
        <h4>Ranking de Vendas por Quantidade</h4>
        <?= GridView::widget([
          'dataProvider' => $dataProviderQtde,
          'emptyText'    => '</br><p class="text-danger">Nenhuma informação encontrada</p>',
          'summary'      =>  '',
          'showHeader'   => false,        
          'tableOptions' => ['class'=>'table table-striped table-hover '],
          'columns' => [   
                [
                'format' => 'raw',
                'header' => 'Rank',
                'value' => function($model, $key, $index, $column) {
                    if ($index == 0) {
                       return Html::img(Yii::$app->request->BaseUrl.'/images/medal-gold-icon.png');
                    }elseif ($index == 1) {
                       return Html::img(Yii::$app->request->BaseUrl.'/images/medal-silver-icon.png'); 
                    }elseif ($index == 2) {
                       return Html::img(Yii::$app->request->BaseUrl.'/images/medal-bronze-icon.png'); 
                    }else {
                       return Html::img(Yii::$app->request->BaseUrl.'/images/no-medal-icon.png'); 
                    }
                }],                 
                [
                    'attribute' => 'avatar',
                    'format' => 'html',
                    'value' => function ($data) {
                        return Html::img(Yii::$app->params['usersAvatars'].$data["avatar"],
                            ['width' => '50px', 'class' => 'img-rounded img-responsive']);
                    },
                    'contentOptions'=>['style'=>'width: 20%;text-align:center'],                    
                ],                                 
                [
                    'attribute' => 'seller',
                    'format' => 'raw',
                    'value' => function ($data) { 
                        return Html::a( $data["seller"], ['dailyproductivity/performance_user', 'seller_id' => $data["id"]], ['title' => 'Clique para ver o desempenho']);
                    },
                    'contentOptions'=>['style'=>'width: 50%;text-align:left;vertical-align: middle;text-transform: uppercase'],
                ],   
                [
                    'attribute' => 'total',
                    'format' => 'raw',
                    'value' => function ($data) {                      
                        return "<b>".$data["total"]."</b>";
                    },
                    'contentOptions'=>['style'=>'width: 20%;text-align:right;vertical-align: middle;font-size: 15px'],
                ],                        

            ],
        ]); ?>
        </div>
      </div>
    </div>
    <div class="panel panel-primary">
          <div class="panel-heading"><b>Top 10 Maiores Visitantes do mês</b></div>
          <div class="panel-body">
          <?php 

            $commandtop10 = Yii::$app->db->createCommand(
            "SELECT u.username as username, COUNT(b.id) as total
                FROM business_visits b
                INNER JOIN `user` u
                ON b.user_id = u.id
                WHERE b.visits_status_id = 3 AND MONTH(date) = $thismonth AND YEAR(date) = $thisyear
                GROUP BY username
                ORDER BY total DESC
                LIMIT 10"
                );
            $report_top10 = $commandtop10->queryAll();

            $total = array();
            $username = array();

            for ($i = 0; $i < sizeof($report_top10); $i++) {
               $username[] = $report_top10[$i]["username"];
               $total[] = (int) $report_top10[$i]["total"];
            }            
           
            use yii\web\JsExpression;
            use miloschuman\highcharts\Highcharts;
            echo Highcharts::widget([
                'options' => [
                    'credits' => ['enabled' => false],
                    'title' => [
                        'text' => '',
                    ],
                    'colors'=> ['#00A295','#27cdd9'],
                    'xAxis' => [
                        'categories' => $username,
                    ],
                    'yAxis' => [
                        'min' => 0,
                        'title' => '',
                    ],                        
                    'series' => [
                        [
                            'type' => 'column',
                            //'colorByPoint'=> true,
                            'name' => 'Visitas Efetivadas',
                            'data' => $total,
                            //'colors' => $color,
                        ],                         
                    ],
                ]
            ]);            
            ?>
          </div>
    </div>
    </div>

    </div>
</div>
