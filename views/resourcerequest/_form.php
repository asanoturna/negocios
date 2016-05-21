<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Resourcerequest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resourcerequest-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'client_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'client_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'value_request')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'expiration_register')->textInput() ?>

    <?= $form->field($model, 'lastupdate_register')->textInput() ?>

    <?= $form->field($model, 'value_capital')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'observation')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'has_transfer')->textInput() ?>

    <?= $form->field($model, 'receive_credit')->textInput() ?>

    <?= $form->field($model, 'add_insurance')->textInput() ?>

    <?= $form->field($model, 'requested _month')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'requested _year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'resource_type_id')->textInput() ?>

    <?= $form->field($model, 'resource_purpose_id')->textInput() ?>

    <?= $form->field($model, 'resource_status_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
