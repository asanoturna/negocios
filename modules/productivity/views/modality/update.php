<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Modality */

$this->title = 'Update Modality: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Modalities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->1]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="modality-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
