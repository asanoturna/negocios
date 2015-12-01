<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Managerdailyproductivity */

$this->title = 'Create Managerdailyproductivity';
$this->params['breadcrumbs'][] = ['label' => 'Managerdailyproductivities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="managerdailyproductivity-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
