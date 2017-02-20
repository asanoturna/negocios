<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\modules\productivity\models\Product;
use app\models\Modality;
use app\models\User;
use app\modules\productivity\models\Dailyproductivitystatus;
use yii\bootstrap\Tabs;

$this->title = 'Gestão dos Produtos';

?>
<div class="product-index">

<div class="row">
  <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
  <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('/dailyproductivity/_menu'); ?></span></div>
</div>

<hr/>

<div class="panel panel-default">
    <div class="panel-body">
    <?php
    echo Tabs::widget([
        'items' => [
            [
                'label' => 'Produtividade',
                'url' => ['managerdailyproductivity/index'],
            ],
            [
                'label' => 'Categorias',
                'url' => ['product/index'],
                'active' => true
            ],
            [
                'label' => 'Metas',
                'url' => '#',
                'headerOptions' => ['class' => 'disabled'],
            ],
        ],
    ]);
    ?>


<div class="row">
  <div class="col-md-6"><h1></div>
  <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo Produto', ['create'], ['class' => 'btn btn-success']) ?></span></div>
</div>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
            'attribute' => 'parent_id',
            'header' => '',
            'format' => 'raw',
            'enableSorting' => true,
            'value' => function ($model) {                      
                return $model->parent ? $model->parent->name." <span class=\"glyphicon glyphicon-triangle-right\" aria-hidden=\"true\"></span> ".$model->name : "<span class=\"text-danger\"><em>".$model->name."</em></span>";
            },
            //'contentOptions'=>['style'=>'width: 75%;text-align:left'],
            ], 
            //'name',
            'min_value',
            'max_value',
            [ 
                'attribute' => 'is_active',
                'format' => 'raw',
                'value' => function ($model) {                      
                        return $model->is_active == 1 ? '<b style="color:green">Sim</b>' : '<b style="color:gray">Não</b>';
                        },
                'filter'=>[0=>'Não', 1=>'Sim'],
                'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            ],    
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-list-alt" ></span>', $url, [
                                    'title' => 'Detalhes',
                                    'class' => 'btn btn-default btn-xs',
                        ]);
                    },                
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil" ></span>', $url, [
                                    'title' => 'Alterar',
                                    'class' => 'btn btn-default btn-xs',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash" ></span>', $url, [
                                    'title' => 'Excluir',
                                    'class' => 'btn btn-default btn-xs',
                                    'data-confirm' => 'Tem certeza que deseja excluir?',
                                    'data-method' => 'post',
                                    'data-pjax' => '0',
                        ]);
                    },                
                ],
                'contentOptions'=>['style'=>'width: 10%;text-align:right'],
            ],
        ],
    ]); ?>

    </div>
    </div>

</div>
