<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\client\models\Base;

$this->title = 'Cálculo de  Empréstimo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

<div class="row">
    <div class="col-xs-6 col-md-4">
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-8">
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
</div>

</div>
