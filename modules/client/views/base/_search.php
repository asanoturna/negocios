<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

?>

<div class="dailyproductivity-search">

    <?php $form = ActiveForm::begin([
        'options' => [
                    'class' => 'form-inline',
                    ],
        'action' => ['simulator'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-3">
        
        <?= $form->field($model, 'account')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="form-group">
            <?= Html::submitButton('<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Pesquisar', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>