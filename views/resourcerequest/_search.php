<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResourcerequestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resourcerequest-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'created') ?>

    <?= $form->field($model, 'client_name') ?>

    <?= $form->field($model, 'client_phone') ?>

    <?= $form->field($model, 'value_request') ?>

    <?php // echo $form->field($model, 'expiration_register') ?>

    <?php // echo $form->field($model, 'lastupdate_register') ?>

    <?php // echo $form->field($model, 'value_capital') ?>

    <?php // echo $form->field($model, 'observation') ?>

    <?php // echo $form->field($model, 'has_transfer') ?>

    <?php // echo $form->field($model, 'receive_credit') ?>

    <?php // echo $form->field($model, 'add_insurance') ?>

    <?php // echo $form->field($model, 'requested _month') ?>

    <?php // echo $form->field($model, 'requested _year') ?>

    <?php // echo $form->field($model, 'location_id') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'resource_type_id') ?>

    <?php // echo $form->field($model, 'resource_purpose_id') ?>

    <?php // echo $form->field($model, 'resource_status_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
