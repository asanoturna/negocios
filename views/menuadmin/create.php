<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Menuadmin */

$this->title = 'Create Menuadmin';
$this->params['breadcrumbs'][] = ['label' => 'Menuadmins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menuadmin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
