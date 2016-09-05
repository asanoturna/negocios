<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\money\MaskMoney;
use app\modules\campaign\models\Sipag;

?>
<div class="capitalaction-form">

    <div class="panel panel-default">
    <div class="panel-body">  

    <?php $form = ActiveForm::begin(); ?>

<div class="row">
  <div class="col-md-4">

    <?= $form->field($model, 'establishmenttype')->dropDownList(Sipag::$Static_establishmenttype,['prompt'=>'--']) ?> 

    <?= $form->field($model, 'establishmentname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'expedient')->textInput(['maxlength' => true]) ?>

  </div>
  <div class="col-md-4">

    <?= $form->field($model, 'visited')->dropDownList(Sipag::$Static_visited,['prompt'=>'--']) ?>     

    <?= $form->field($model, 'accredited')->dropDownList(Sipag::$Static_accredited,['prompt'=>'--']) ?>     

    <?= $form->field($model, 'locked')->dropDownList(Sipag::$Static_locked,['prompt'=>'--']) ?>     

    <?= $form->field($model, 'anticipation')->dropDownList(Sipag::$Static_anticipation,['prompt'=>'--']) ?>     

    <?= $form->field($model, 'status')->dropDownList(Sipag::$Static_status,['prompt'=>'--']) ?>    

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

  <div class="col-md-4"></div>
</div>            

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
        <?= Html::submitButton($model->isNewRecord ? 'Gravar' : 'Gravar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

    </div></div>

</div>