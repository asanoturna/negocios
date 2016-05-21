<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Resourcerequest */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Resourcerequests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resourcerequest-view">

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
            'created',
            'client_name',
            'client_phone',
            'value_request',
            'expiration_register',
            'lastupdate_register',
            'value_capital',
            'observation:ntext',
            'has_transfer',
            'receive_credit',
            'add_insurance',
            'requested _month',
            'requested _year',
            'location_id',
            'user_id',
            'resource_type_id',
            'resource_purpose_id',
            'resource_status_id',
        ],
    ]) ?>

</div>
