<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\campaign\models\Sicoobcard;
use kartik\money\MaskMoney;

?>

<div class="campaign-sicoobcard-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
      <div class="col-md-6">

    <?= $form->field($model, 'product_type')->dropDownList(Sicoobcard::$Static_product_type,['prompt'=>'--']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'card')->textInput(['maxlength' => true]) ?>

      </div>
      <div class="col-md-6">

    <?= $form->field($model, 'purchasedate')->widget('trntv\yii\datetime\DateTimeWidget',
        [
            'phpDatetimeFormat' => 'yyyy-MM-dd',
            'clientOptions' => [
                'minDate' => new \yii\web\JsExpression('new Date("2016-01-01")'),
                'allowInputToggle' => true,
                'widgetPositioning' => [
                   'horizontal' => 'auto',
                   'vertical' => 'auto'
                ]
            ]
        ]
    ) ?>  

    <?php 
    echo $form->field($model, 'purchasevalue')->widget(MaskMoney::classname(), [
        'pluginOptions' => [
            //'prefix' => 'R$ ',
            //'suffix' => ' c',
            'affixesStay' => true,
            'thousands' => '.',
            'decimal' => ',',
            'precision' => 2, 
            'allowZero' => true,
            'allowNegative' => false,
            'value' => 0.01
        ],
    ]); 
    ?>

    <?= $form->field($model, 'purchaselocal')->textInput() ?>

    <p class="text-warning">Estes dados podem ser extraídos tanto de um comprovante de venda que o associado trouxer, quanto do SIPAGNET, na opção "Transações na Função Crédito".</p>

      </div>
    </div>    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Gravar' : 'Gravar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>