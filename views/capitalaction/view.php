<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Capitalaction */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Capitalactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capitalaction-view">

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
            'name',
            'proposed',
            'accomplished',
            'date1',
            'date2',
            'progress:ntext',
            'created',
            'updated',
            'ip',
            'location_id',
            'user_id',
        ],
    ]) ?>

</div>
