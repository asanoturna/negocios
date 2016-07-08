<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="location-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'shortname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_active')->radioList([
        '1' => 'Sim', 
        '0' => 'Não',
        ], ['itemOptions' => ['labelOptions'=>array('style'=>'padding:5px;')]]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Gravar' : 'Gravar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
