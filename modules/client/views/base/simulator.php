<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\client\models\Base;

$this->title = 'Cálculo de  Empréstimo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

  <div class="panel panel-default">
  <div class="panel-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        //'filterModel' => $searchModel,
        'summary'=> '',
        'columns' => [
            'account',
            'name',
            'doc',
            [
                'attribute' => 'category_id',
                'format' => 'raw',
                'value' => function ($data) {                      
                        return $data->getCategory();
                },
                'filter' => Base::$Static_category,
                'contentOptions'=>['style'=>'width: 25%;text-align:left'],
            ],
        ],
    ]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        //'filterModel' => $searchModel,
        'summary'=> '',
        'columns' => [
            'account',
            'name',
            'doc',
            'category_id',
        ],
    ]); ?>
  </div>
  </div>
</div>
