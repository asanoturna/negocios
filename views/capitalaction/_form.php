<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="capitalaction-form">

    <?php $form = ActiveForm::begin([
            'id' => 'capitalactionform',
            'options' => [
                'class' => 'form-horizontal',
                ],
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-sm-5\">{input}</div>\n<div class=\"col-sm-3\">{error}</div>",
                'labelOptions' => ['class' => 'col-sm-4 control-label'],
            ],
            ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proposed')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accomplished')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date1')->textInput() ?>

    <?= $form->field($model, 'date2')->textInput() ?>

    <?= $form->field($model, 'progress')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'updated')->textInput() ?>

    <?= $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
        <?= Html::submitButton($model->isNewRecord ? 'Gravar' : 'Gravar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
