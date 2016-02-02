<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="visits-form">

    <?php $form = ActiveForm::begin([
        'id' => 'visitsform',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-4\">{input}</div>\n<div class=\"col-lg-4\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-4 control-label'],
        ],
    ]); ?>

    <div class="row">
        <div class="col-md-6">
        <!-- LEFT SIDE -->
        <?= $form->field($model, 'date')->widget('trntv\yii\datetime\DateTimeWidget',
            [
                'phpDatetimeFormat' => 'yyyy-MM-dd',
                'clientOptions' => [
                    'minDate' => new \yii\web\JsExpression('new Date("2015-01-01")'),
                    'allowInputToggle' => true,
                    'widgetPositioning' => [
                       'horizontal' => 'auto',
                       'vertical' => 'auto'
                    ]
                ]
            ]
        ) ?>

        <?= $form->field($model, 'location_id')->textInput() ?>

        <?= $form->field($model, 'visits_finality_id')->textInput() ?>

        <?= $form->field($model, 'company_person')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'person_id')->textInput() ?>

        <?= $form->field($model, 'responsible')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'contact')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'num_proposal')->textInput() ?>        

        </div>
        <div class="col-md-6">
        <!-- RIGHT SITE -->
        <?= $form->field($model, 'observation')->textarea(['rows' => 8]) ?>        

        <?= $form->field($model, 'attachment')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'localization_map')->textInput(['maxlength' => true]) ?>

        </div>
    </div>    

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
        <?= Html::submitButton($model->isNewRecord ? 'Gravar' : 'Gravar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
