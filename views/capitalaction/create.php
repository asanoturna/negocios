<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Capitalaction */

$this->title = 'Create Capitalaction';
$this->params['breadcrumbs'][] = ['label' => 'Capitalactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="capitalaction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
