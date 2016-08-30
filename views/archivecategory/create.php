<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Archivecategory */

$this->title = 'Create Archivecategory';
$this->params['breadcrumbs'][] = ['label' => 'Archivecategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="archivecategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
