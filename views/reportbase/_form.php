<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="reportbase-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Gravar' : 'Alterar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
