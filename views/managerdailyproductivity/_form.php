<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Managerdailyproductivity */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="managerdailyproductivity-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <?= $form->field($model, 'modality_id')->textInput() ?>

    <?= $form->field($model, 'location_id')->textInput() ?>

    <?= $form->field($model, 'person_id')->textInput() ?>

    <?= $form->field($model, 'manager')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'commission_percent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'companys_revenue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'daily_productivity_status_id')->textInput() ?>

    <?= $form->field($model, 'buyer_document')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'buyer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seller_id')->textInput() ?>

    <?= $form->field($model, 'operator_id')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'updated')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
