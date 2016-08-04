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

    <div class="row"><!-- LINE 1 -->
      <div class="col-md-8">

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

      </div>
      <div class="col-md-4">

        <div class="panel panel-default">
          <div class="panel-heading"><b>Aniversariantes da Semana</b></div>
          <div class="panel-body" style="max-height: 10;overflow-y: scroll;">

        <?php
        $dataProviderBirthdate = new SqlDataProvider([
            'sql' => "SELECT 
                    avatar, user.fullname as fullname, day(birthdate) as dia,
                    day(birthdate) as dia
                    FROM `user`
                    WHERE WEEKOFYEAR( CONCAT( YEAR(NOW()),'-',MONTH(birthdate),'-',DAY(birthdate) ) ) = WEEKOFYEAR( NOW() )
                    ORDER BY day(birthdate)",
            'totalCount' => 300,
            'key'  => 'fullname',
            'pagination' => [
                'pageSize' => 300,
            ],
        ]);
        ?> 
        <?= GridView::widget([
                  'dataProvider' => $dataProviderBirthdate,
                  'emptyText'    => '</br><p class="text-danger">Nenhum aniversariante esta semana!</p>',
                  'summary'      =>  '',
                  'showHeader'   => true,        
                  'tableOptions' => ['class'=>'table'],
                  'columns' => [     
                        [
                            'attribute' => 'avatar',
                            'label' => false,
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::img(Yii::$app->params['usersAvatars'].$data["avatar"],
                                    ['width' => '40px', 'class' => 'img-rounded img-thumbnail img-responsive']);
                            },
                            'contentOptions'=>['style'=>'width: 10%;text-align:middle'],                    
                        ],                                 
                        [
                            'attribute' => 'fullname',
                            'format' => 'raw',
                            'header' => 'Colaborador',
                            'value' => function ($data) {                      
                                return "<h5>".$data["fullname"]."</h5><p>"."<em class=\"text-muted\">".$data["localization"]."</em>";
                            },
                            'contentOptions'=>['style'=>'width: 60%;text-align:left;vertical-align: middle;text-transform: uppercase'],
                        ],
                        [
                            'attribute' => 'dia',
                            'format' => 'raw',
                            'header' => 'Dia',
                            'value' => function ($data) {                      
                                return $data["dia"] <> date('d') ? "<h5>".$data["dia"]."</h5>" : "<h5 class=\"label label-default\">Hoje</h5>";
                            },
                            'headerOptions' => ['class' => 'text-center', 'style' => 'text-align:center;vertical-align: middle;'],
                            'contentOptions'=>['style'=>'width: 30%;text-align:center;vertical-align: middle;'],
                        ],                                                                             
                    ],
                ]); ?>        

          </div>
        </div>

      </div>
    </div>

    <div class="row"><!-- LINE 2 -->
      <div class="col-md-8">

    <div class="panel panel-default">
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
      <div class="col-md-4">

        <div class="panel panel-default">
          <div class="panel-heading"><b>Destaques</b></div>
          <div class="panel-body">

<p><a target="_blank" href="http://172.19.37.4/intranet/index.php/arquivos-a-manuais/doc/421/raw"><img alt="btn pagi" src="http://172.19.37.4/intranet/images/icones/btn_pagi.png" height="37" width="177" /></a>
</p>

<p><a target="_blank" href="http://172.19.37.4/intranet/index.php/arquivos-a-manuais/category/69/2015-07-31-17-44-50"><img alt="btn projetos" src="http://172.19.37.4/intranet/images/icones/btn_projetos.png" height="37" width="177" /></a>
</p>

<p><a target="_blank" href="http://172.19.37.4/intranet/index.php/arquivos-a-manuais/category/68/caderno-de-indicadores"><img alt="btn caderno indicadores" src="http://172.19.37.4/intranet/images/icones/btn_caderno_indicadores.png" height="37" width="177" /></a>
</p>

<p><a target="_blank" href="http://172.19.37.4/intranet/index.php/arquivos-a-manuais/category/67/sig"><img alt="btn sig explicado" src="http://172.19.37.4/intranet/images/icones/btn_sig_explicado.png" height="37" width="177" /></a>
</p>

<p><a href="http://172.19.37.4/intranet/index.php/arquivos-a-manuais/category/62/2014-07-14-21-07-06"><img alt="btn gestao desempenho" src="http://172.19.37.4/intranet/images/icones/btn_gestao_desempenho.png" height="37" width="177" /></a>
</p>

<p><a href="http://172.19.37.4/intranet/index.php/arquivos-a-manuais/doc/255/raw"><img alt="btn planilha cobranca" src="http://172.19.37.4/intranet/images/icones/btn_planilha_cobranca.png" height="37" width="177" /></a>
</p>

<p><a target="_blank" href="http://172.19.37.4/talentos"><img alt="btn indique talento" src="http://172.19.37.4/intranet/images/icones/btn_indique_talento.png" height="37" width="177" /></a>
</p>         

          </div>
        </div>

      </div>
    </div>    

    </div>

    </div>
</div>
