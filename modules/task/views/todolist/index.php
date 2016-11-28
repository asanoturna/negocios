<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\task\models\TodolistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Todolists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todolist-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Todolist', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description:ntext',
            'department_id',
            'category_id',
            // 'status_id',
            // 'deadline',
            // 'priority',
            // 'owner_id',
            // 'responsible_id',
            // 'is_done',
            // 'created',
            // 'updated',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
