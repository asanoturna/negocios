<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Useradmin */

$this->title = 'Create Useradmin';
$this->params['breadcrumbs'][] = ['label' => 'Useradmins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="useradmin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
