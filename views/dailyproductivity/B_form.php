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

    <?php $form = ActiveForm::begin([
        'id' => 'dailyproductivity-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); ?>

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

        <?= $form->field($model, 'location_id')->dropDownList(ArrayHelper::map(Location::find()->where(['is_active' => 1])->orderBy("shortname ASC")->all(), 'id', 'shortname'),['prompt'=>'--'])  ?>    

        <?=
        $form->field($model, 'product_id', [
            'inputOptions' => [
                'class' => 'selectpicker '
            ]
        ]
        )->dropDownList(app\models\Product::getHierarchy(), ['prompt' => 'Selecione', 'class'=>'form-control required']);
        ?>

        <?php echo $form->field($model, 'value')->textInput(['maxlength' => true]) 
        // use kartik\money\MaskMoney;
        // echo $form->field($model, 'value')->widget(MaskMoney::classname(), [
        //     'id' => 'vvv',
        //     'pluginOptions' => [
        //         //'prefix' => 'R$ ',
        //         //'suffix' => ' c',
        //         'affixesStay' => true,
        //         'thousands' => '.',
        //         'decimal' => ',',
        //         'precision' => 2, 
        //         'allowZero' => false,
        //         'allowNegative' => false,
        //     ],
        // ]); 
        ?>

        <?php //echo $form->field($model, 'commission_percent')->textInput(['maxlength' => true])
        //http://demos.krajee.com/slider
            use kartik\slider\Slider;
            echo $form->field($model, 'commission_percent')->widget(Slider::classname(), [
            'name'=>'commission_percent',
            'value'=>7,
            'sliderColor'=>Slider::TYPE_GREY,
            'handleColor'=>Slider::TYPE_SUCCESS,
            'pluginOptions'=>[
                'handle'=>'round',
                'tooltip'=>'always',
                'min'=>15,
                'max'=>49,
                'step'=>1,
            ]
        ]);
        ?>

        <?php // echo $form->field($model, 'companys_revenue', ['inputOptions' => ['value' => 5, 'class' => 'form-control']])->textInput(['readonly' => true]) ?>
        <?php echo $form->field($model, 'companys_revenue', ['inputOptions' => ['class' => 'form-control']])->textInput(['readonly' => true]) ?>

<?php
//$personaId = Html::getInputId($model, 'NUM_PERSONAS');
$value = Html::getInputId($model, 'value');
$companys_revenue = Html::getInputId($model, 'companys_revenue');
?>
<?php
$js = <<<JS
$("#dailyproductivity-form #{$value}").on("keyup", function (e) {
    var value = $(this).val();
    $("#dailyproductivity-form #{$companys_revenue}").val(value*2)
});
$("#dailyproductivity-form #{$companys_revenue}").on("keyup", function (e) {
    var companys_revenue = $(this).val()%2 == 0 ? $(this).val() : $(this).val() - 1;
    $("#dailyproductivity-form #{$value}").val(companys_revenue/2)
});
JS;
$this->registerJs($js);
?>
        <hr/>

        <?= $form->field($model, 'person_id')->dropDownList(ArrayHelper::map(Person::find()->orderBy("name ASC")->all(), 'id', 'name'),['prompt'=>''])  ?>    

        <?= $form->field($model, 'buyer_document')->widget(\yii\widgets\MaskedInput::classname(), [
            'mask' => ['999.999.999-99', '99.999.999/9999-99'],
        ]) ?>

        <?= $form->field($model, 'buyer_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'seller_id')->dropDownList(ArrayHelper::map(User::find()->where(['role_id' => 2])->orderBy("username ASC")->all(), 'id', 'username'),['prompt'=>'-- Selecione --'])  ?>

        <?= $form->field($model, 'operator_id')->dropDownList(ArrayHelper::map(User::find()->where(['role_id' => 2])->orderBy("username ASC")->all(), 'id', 'username'),['prompt'=>'-- Selecione --'])  ?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
        <?= Html::submitButton($model->isNewRecord ? '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Gravar' : '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Gravar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
