<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Resourcerequest */

$this->title = 'Create Resourcerequest';
$this->params['breadcrumbs'][] = ['label' => 'Resourcerequests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resourcerequest-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
