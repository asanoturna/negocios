<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Archives';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="archive-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Archive', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'archivecategory_id',
            'name',
            'attachment',
            'description',
            // 'downloads',
            // 'filesize',
            // 'created',
            // 'updated',
            // 'status',
            // 'user_id',
            // 'filetype',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>