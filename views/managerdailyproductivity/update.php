<?php

use yii\helpers\Html;


$this->title = 'Gestão Produtividade Diária';
?>
<div class="managerdailyproductivity-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('//dailyproductivity/_menu'); ?>
    <hr/>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
