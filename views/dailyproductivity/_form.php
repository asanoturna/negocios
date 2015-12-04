<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\models\Product;
use app\models\Modality;
use app\models\Person;
use app\models\User;
use yii\widgets\MaskedInput;
use yii\helpers\Url;

?>

<div class="dailyproductivity-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
      <div class="col-md-6"><!-- LEFT -->

        <div class="row"><div class="col-sm-4">
        <?php echo $form->field($model, 'date')->widget('trntv\yii\datetime\DateTimeWidget',
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
        ); ?>
        </div><div class="col-sm-2">
        <?= $form->field($model, 'location_id')->dropDownList(ArrayHelper::map(Location::find()->where(['is_active' => 1])->orderBy("shortname ASC")->all(), 'id', 'shortname'),['prompt'=>'--'])  ?>    
        </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
            <?php //echo $form->field($model, 'valor')->textInput(['maxlength' => true]) 
            use kartik\money\MaskMoney;
            echo $form->field($model, 'value')->widget(MaskMoney::classname(), [
                'pluginOptions' => [
                    //'prefix' => 'R$ ',
                    //'suffix' => ' c',
                    'affixesStay' => true,
                    'thousands' => '.',
                    'decimal' => ',',
                    'precision' => 2, 
                    'allowZero' => false,
                    'allowNegative' => false,
                ],
            ]); 
            ?>
            </div>
            <div class="col-sm-3">
            <?php //echo $form->field($model, 'commission_percent')->textInput(['maxlength' => true])
            //http://demos.krajee.com/slider
            use kartik\slider\Slider;
            echo $form->field($model, 'commission_percent')->widget(Slider::classname(), [
            'name'=>'commission_percent',
            'value'=>7,
            'sliderColor'=>Slider::TYPE_GREY,
            'handleColor'=>Slider::TYPE_SUCCESS,
            'pluginOptions'=>[
                'handle'=>'triangle',
                'tooltip'=>'always'
            ]
        ]);
            ?>
            </div>
        </div>

        <div class="row"><div class="col-sm-6">
        <?php //echo $form->field($model, 'companys_revenue', ['inputOptions' => ['value' => 5, 'class' => 'form-control']])->textInput(['readonly' => true]) ?>
        </div></div>

        <div class="row">
        <div class="col-sm-2">
        <?= $form->field($model, 'person_id')->dropDownList(ArrayHelper::map(Person::find()->orderBy("name ASC")->all(), 'id', 'name'),['prompt'=>''])  ?>    
        </div>
        <div class="col-sm-4">
        <?= $form->field($model, 'buyer_document')->widget(\yii\widgets\MaskedInput::classname(), [
            'mask' => ['999.999.999-99', '99.999.999/9999-99'],
        ]) ?>
        </div>
        </div>

        <div class="row"><div class="col-sm-6">
        <?= $form->field($model, 'buyer_name')->textInput(['maxlength' => true]) ?>
        </div></div>

      </div>
      <div class="col-md-6"><!-- RIGHT -->

        <div class="row"><div class="col-sm-6">
        <?= $form->field($model, 'product_id')->dropDownList(ArrayHelper::map(Product::find()->where(['is_active' => 1])->orderBy("name ASC")->all(), 'id', 'name'),
            [
            'prompt' => '-- Selecione --',
            'onchange'=>'
                $.get( "'.Url::toRoute('/dailyproductivity/listm').'", { id: $(this).val() } )
                    .done(function( data ) {
                        $( "#'.Html::getInputId($model, 'modality_id').'" ).html( data );
                    }
                );
            '
            ])  ?>
        </div></div>

        <div class="row"><div class="col-sm-6">
        <?php // $form->field($model, 'modality_id')->dropDownList(ArrayHelper::map(Modality::find()->where(['is_active' => 1])->orderBy("name ASC")->all(), 'id', 'name'),['prompt'=>'-- Selecione --'])  ?>    
        <?= $form->field($model, 'modality_id')->dropDownList(
            [
            'prompt'=>'Selecione um produto',
            ]) ;?>
        </div></div>

        <div class="row"><div class="col-sm-6">
        <?= $form->field($model, 'seller_id')->dropDownList(ArrayHelper::map(User::find()->where(['role_id' => 2])->orderBy("username ASC")->all(), 'id', 'username'),['prompt'=>'-- Selecione --'])  ?>
        </div></div>

        <div class="row"><div class="col-sm-6">
        <?= $form->field($model, 'operator_id')->dropDownList(ArrayHelper::map(User::find()->where(['role_id' => 2])->orderBy("username ASC")->all(), 'id', 'username'),['prompt'=>'-- Selecione --'])  ?>
        </div></div>

      </div>
    </div>

    <?= Html::activeHiddenInput($model, 'daily_productivity_status_id', ['value' => 1]) ?>
    <?= Html::activeHiddenInput($model, 'user_id', ['value' => Yii::$app->user->id]) ?>
    <?= Html::activeHiddenInput($model, 'created', ['value' => date('2015-11-23')]) ?>
    <?= Html::activeHiddenInput($model, 'updated', ['value' => date('2015-11-23')]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Gravar' : '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Gravar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
