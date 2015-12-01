<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Modality */

$this->title = 'Create Modality';
$this->params['breadcrumbs'][] = ['label' => 'Modalities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modality-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
