<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Modality */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Modalities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modality-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->1], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->1], [
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
            '1',
            'name',
            'desc',
            'is_active',
        ],
    ]) ?>

</div>
