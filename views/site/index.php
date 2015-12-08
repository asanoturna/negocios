<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\models\Product;
use app\models\Modality;
use app\models\User;
use yii\data\SqlDataProvider;

$this->title = Yii::$app->params['appname'];
?>
<div class="site-index">

    <div class="row">
    
    <div class="col-sm-3">
    <div class="panel panel-default">
	  <div class="panel-heading"><b>Módulos</b></div>
	  <div class="panel-body">
	    <?php  echo $this->render('_menu'); ?>
	  </div>
	</div>
    </div>
    <div class="col-sm-9">
      <div class="panel panel-default">
      <div class="panel-heading"><b>Top 5 Produtividade Diária</b></div>
      <div class="panel-body">
        <?php
        $dataProvider = new SqlDataProvider([
            'sql' => "SELECT avatar, full_name as seller, sum(companys_revenue) as total
                    FROM daily_productivity
                    INNER JOIN `profile` ON daily_productivity.seller_id = `profile`.user_id
                    GROUP BY seller_id
                    ORDER BY sum(companys_revenue) DESC",
            'totalCount' => 5,
            'sort' =>false,
            'key'  => 'seller',
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        ?>
        <?= GridView::widget([
          'dataProvider' => $dataProvider,
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
                    'attribute' => 'avatar',
                    'format' => 'html',
                    'value' => function ($data) {
                        return Html::img(Yii::$app->request->BaseUrl.'/images/users/'.$data["avatar"],
                            ['width' => '50px', 'class' => 'img-rounded img-responsive']);
                    },
                    'contentOptions'=>['style'=>'width: 10%;text-align:center'],                    
                ],                                 
                [
                    'attribute' => 'seller',
                    'format' => 'raw',
                    'value' => function ($data) {                      
                        return $data["seller"];
                    },
                    'contentOptions'=>['style'=>'width: 60%;text-align:left;vertical-align: middle;'],
                ],  
                [
                    'attribute' => 'total',
                    'format' => 'raw',
                    'value' => function ($data) {                      
                        return "<b>R$ ".$data["total"]."</b>";
                    },
                    'contentOptions'=>['style'=>'width: 20%;text-align:left;vertical-align: middle;font-size: 16px'],
                ],                        

            ],
        ]); ?>
      </div>
    </div>
    </div>

    </div>
</div>
