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
  <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?= Html::a('Novo Produto', ['create'], ['class' => 'btn btn-success']) ?></span></div>
</div>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'parent_id',
            'name',
            'min_value',
            'max_value',
            'is_active',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    </div>
    </div>

</div>
