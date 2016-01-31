<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CapitalactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Capitalactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capitalaction-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Capitalaction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'proposed',
            'accomplished',
            'date1',
            // 'date2',
            // 'progress:ntext',
            // 'created',
            // 'updated',
            // 'ip',
            // 'location_id',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
