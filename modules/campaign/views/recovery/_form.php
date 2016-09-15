<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Location;
use kartik\money\MaskMoney;
use app\modules\campaign\models\Recovery;

?>

<div class="recovery-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
      <div class="col-md-6">

    <?= $form->field($model, 'location_id')->dropDownList(ArrayHelper::map(Location::find()->where(['is_active' => 1])->orderBy("shortname ASC")->all(), 'id', 'fullname'),['prompt'=>'--'])  ?>      
          
    <?= $form->field($model, 'clientname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clientdoc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contracts')->textInput(['maxlength' => true]) ?>

    <?php 
    echo $form->field($model, 'value_traded')->widget(MaskMoney::classname(), [
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

    <?php 
    echo $form->field($model, 'value_input')->widget(MaskMoney::classname(), [
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

    <?= $form->field($model, 'date')->widget('trntv\yii\datetime\DateTimeWidget',
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

      </div>
      <div class="col-md-6">

<?php $valueinput = Html::getInputId($model, 'value_input'); ?>


    <div class="row">
    <div class="col-md-6"><?= $form->field($model, 'typeproposed')->dropDownList(Recovery::$Static_typeproposed,['prompt'=>'--',
        'onchange' => 'if($(this).val() == 0) {
        $("#'.Html::getInputId($model, 'commission').'").val($("#'.Html::getInputId($model, 'value_input').'").val()*0.03);
    }else if($(this).val() == 1) {
        $("#'.Html::getInputId($model, 'commission').'").val($("#'.Html::getInputId($model, 'value_input').'").val()*0.02);
    }else if($(this).val() == 2){
        $("#'.Html::getInputId($model, 'commission').'").val($("#'.Html::getInputId($model, 'value_input').'").val()*0.01);
    }else if($(this).val() == 3) {
        $("#'.Html::getInputId($model, 'commission').'").val($("#'.Html::getInputId($model, 'value_input').'").val()*0.005);
    }else if($(this).val() == 4){
        $("#'.Html::getInputId($model, 'commission').'").val($("#'.Html::getInputId($model, 'value_input').'").val()*0.003);
    }else if($(this).val() == 5){
        $("#'.Html::getInputId($model, 'commission').'").val($("#'.Html::getInputId($model, 'value_input').'").val()*0.002);
    }']) 
   ?>
   </div>
      <div class="col-md-6"><?= $form->field($model, 'commission')->textInput(['maxlength' => true,'readonly' => true]) ?></div>
    </div>

    <div class="panel panel-default">
    <div class="panel-heading"><strong>Legenda da Proposta</strong></div>
    <div class="panel-body">
    <table class="table">
            <tr class="active">
                <td>PROPOSTA</td>
                <td>LEGENDA</td>
                <td>COMISSÃO</td>
            </tr>
            <tr>
                <td>A</td>
                <td>Valor do débito corrigido a Juros Contratuais.</td>
                <td><span class="label label-primary">3%</span></td>
            </tr>
            <tr>
                <td>B</td>
                <td>Valor do débito corrigido a Juros Contratuais Sem Multa e Mora.</td>
                <td><span class="label label-primary">2%</span></td>
            </tr>
            <tr>
                <td>C</td>
                <td>Valor do débito corrigido a Juros Judiciais.</td>
                <td><span class="label label-primary">1%</span></td>
            </tr>   
            <tr>
                <td>D</td>
                <td>Valor do débito corrigido a Juros de Poupança.</td>
                <td><span class="label label-success">0,50%</span></td>
            </tr>
            <tr>
                <td>E</td>
                <td>Correção por índice judicial.</td>
                <td><span class="label label-success">0,30%</span></td>
            </tr>
            <tr>
                <td>F</td>
                <td>Valor do débito sem correção.</td>
                <td><span class="label label-success">0,20%</span></td>
            </tr>                                     
          </table>
        </div></div>

    <?php //$form->field($model, 'commission')->textInput() ?>

    <?php //$form->field($model, 'negotiator_id')->textInput() ?>    

    <?php // $form->field($model, 'status')->textInput() ?>

    <?php // $form->field($model, 'approvedby')->textInput() ?>

    <?php // $form->field($model, 'approvedin')->textInput() ?>

      </div>
    </div>

    <hr/>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Gravar' : 'Gravar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
