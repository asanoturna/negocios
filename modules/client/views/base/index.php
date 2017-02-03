<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
              'id',
              'account',
              'name',
              'doc',
              'category_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
