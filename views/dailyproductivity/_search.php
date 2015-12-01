<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DailyproductivitySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dailyproductivity-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'modality_id') ?>

    <?= $form->field($model, 'manager') ?>

    <?= $form->field($model, 'valor') ?>

    <?php // echo $form->field($model, 'commission_percent') ?>

    <?php // echo $form->field($model, 'companys_revenue') ?>

    <?php // echo $form->field($model, 'daily_productivity_status_id') ?>

    <?php // echo $form->field($model, 'buyer_document') ?>

    <?php // echo $form->field($model, 'buyer_name') ?>

    <?php // echo $form->field($model, 'seller_id') ?>

    <?php // echo $form->field($model, 'operator_id') ?>

    <?php // echo $form->field($model, 'date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
