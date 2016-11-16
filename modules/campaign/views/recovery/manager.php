<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Location;
use kartik\money\MaskMoney;
use app\modules\campaign\models\Recovery;

$this->title = 'Gerenciar registro: #'  . $model->id;
?>
<div class="resourcerequest-manager">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

  <?php $form = ActiveForm::begin(); ?>

  <div class="panel panel-default">
    <div class="panel-heading">Situação</div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-3">

          <?= $form->field($model, 'status')->textInput() ?>

          </div>
        </div>
      </div>
    </div>   

  <div class="panel panel-default">
    <div class="panel-heading">Corrigir Informações</div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-3">

          <?= $form->field($model, 'clientname')->textInput(['maxlength' => true,'readonly' => true, 'disabled' => true]) ?>

          <?= $form->field($model, 'clientdoc')->textInput(['maxlength' => true,'readonly' => true, 'disabled' => true]) ?>

          <?= $form->field($model, 'location_id')->dropDownList(ArrayHelper::map(Location::find()->where(['is_active' => 1])->orderBy("shortname ASC")->all(), 'id', 'fullname'),['readonly' => true, 'disabled' => true])  ?>

          <?= $form->field($model, 'typeofdebt')->dropDownList(Recovery::$Static_typeofdebt,['readonly' => true, 'disabled' => true]) ?>

          <?php 
          echo $form->field($model, 'referencevalue')->widget(MaskMoney::classname(), [
              'pluginOptions' => [
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
    echo $form->field($model, 'value_traded')->widget(MaskMoney::classname(), [
        'pluginOptions' => [
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

    <?= $form->field($model, 'contracts')->textInput(['maxlength' => true]) ?>

          </div>
        </div>
      </div>
    </div>  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Gravar' : 'Gravar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?> 

</div>
