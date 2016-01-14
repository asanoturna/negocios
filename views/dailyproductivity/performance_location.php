<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\models\Product;
use app\models\Modality;
use app\models\User;
use yii\data\SqlDataProvider;
use yii\helpers\Url;
use yii\web\View;

$this->title = 'Produtividade Diária';

?>
<div class="dailyproductivity-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_menu'); ?>
    <hr/>
    <div class="row">
        <div class="col-md-3 pull-right">
                    <?php 
                    $this->registerJs('var submit = function (val){if (val > 0) {
                        window.location.href = "' . Url::to(['/dailyproductivity/performance_location']) . '&product_id=" + val;
                    }
                    }', View::POS_HEAD);

                    echo Html::activeDropDownList($model, 'product_id', ArrayHelper::map(Product::find()->where(['parent_id' => 9])
                                ->orderBy("name ASC")
                                ->all(), 'id', 'name'), ['onchange'=>'submit(this.value);','prompt'=>'Todos os produtos','class'=>'form-control']);
                    ?>
        </div>
    </div>  
    <p>   
    <div class="row">
        <div class="col-md-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><b>Ranking de Vendas Por Valor</b></div>
          <div class="panel-body">
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
            </div>
        </div>
        <div class="col-md-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><b>Ranking de Vendas Por Quantidade</b></div>
          <div class="panel-body">
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
    </div>
</div>