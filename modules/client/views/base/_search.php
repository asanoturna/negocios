<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use app\modules\client\models\Category;
use kartik\touchspin\TouchSpin;

?>

<div class="dailyproductivity-search">

    <?php $form = ActiveForm::begin([
        'action' => ['simulator'],
        'method' => 'get',
    ]); ?>

<div class="row">
  <div class="col-md-6"><?= $form->field($model, 'account')->textInput(['maxlength' => 6]) ?></div>
  <div class="col-md-6"><?= $form->field($model, 'date')->widget('trntv\yii\datetime\DateTimeWidget',
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
    ) ?></div>
</div>

<div class="row">
  <div class="col-md-12"><?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->orderBy("name ASC")->all(), 'id', 'name'))  ?></div>
</div>

<div class="row">
  <div class="col-md-6"><?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?></div>
  <div class="col-md-6">
    <?= $form->field($model, 'quota')->widget(TouchSpin::classname(), [
        //'options'=>['placeholder'=>'Enter rating 1 to 5...'],
        'pluginOptions' => [
            'verticalbuttons' => true,
            'min' => 1,
            'max' => 60,]
    ]);?>
    </div>
</div>
    
     

    

    

    

    <div class="row">
        <div class="col-sm-11">
            <?= Html::submitButton('<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Processar', ['class' => 'btn btn-success']) ?>
            <?= Html::a('<span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir', '#', ['onclick'=>"myFunction()",'class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>