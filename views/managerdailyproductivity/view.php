<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Managerdailyproductivity */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Managerdailyproductivities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="managerdailyproductivity-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'product_id',
            'modality_id',
            'location_id',
            'person_id',
            'manager',
            'valor',
            'commission_percent',
            'companys_revenue',
            'daily_productivity_status_id',
            'buyer_document',
            'buyer_name',
            'seller_id',
            'operator_id',
            'date',
            'created',
            'updated',
        ],
    ]) ?>

</div>
