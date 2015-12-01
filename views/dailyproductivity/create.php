<?php

use yii\helpers\Html;

$this->title = 'Produtividade Diária';
?>
<div class="dailyproductivity-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_menu'); ?>
    <hr/>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
