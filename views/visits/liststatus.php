<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\VisitsstatusSearch;

$dataProvider = new ActiveDataProvider([
    'query' => VisitsstatusSearch::find(),
    'pagination' => [
        'pageSize' => 20,
    ],
]);
?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'summary' => '',
    'tableOptions' => ['class'=>'table table-striped'],
    'columns' => [
        'name',
        'hexcolor',
        'about',
    ],
]); ?>
