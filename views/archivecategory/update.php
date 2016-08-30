<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Archivecategory */

$this->title = 'Update Archivecategory: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Archivecategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="archivecategory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
