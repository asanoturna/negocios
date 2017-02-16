<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\client\models\Base;
use app\modules\client\models\Category;

$this->title = 'Base de Clientes';
?>
<div class="category-index">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="panel panel-default">
    <div class="panel-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
              //'id',
              'account',
              'name',
              'doc',
            [
            'attribute' => 'category_id',
            'format' => 'raw',
            'enableSorting' => true,
            'value' => function($data) {
                  return $data->getCategory();
                },
                'filter' => Base::$Static_category,
            'contentOptions'=>['style'=>'width: 10%;text-align:center'],
            'headerOptions' => ['class' => 'text-center'],
            ],
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
    </div>
</div>
