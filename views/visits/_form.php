<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\models\Person;
use app\models\Visitsfinality;
use app\models\Visitsstatus;
use app\models\User;
use yii\widgets\MaskedInput;

?>

<div class="visits-form">

    <?php $form = ActiveForm::begin([
        'id' => 'visitsform',
        'options' => [
            'enctype'=>'multipart/form-data',
            'class' => 'form-horizontal',
            ],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-sm-5\">{input}</div>\n<div class=\"col-sm-3\">{error}</div>",
            'labelOptions' => ['class' => 'col-sm-4 control-label'],
        ],
    ]); ?>

    <div class="row">
        <div class="col-md-5">
        <!-- LEFT SIDE -->
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

        <?= $form->field($model, 'location_id')->dropDownList(ArrayHelper::map(Location::find()->where(['is_active' => 1])->orderBy("shortname ASC")->all(), 'id', 'shortname'),['prompt'=>'--'])  ?>    

        <?= $form->field($model, 'visits_finality_id')->dropDownList(ArrayHelper::map(Visitsfinality::find()->orderBy("name ASC")->all(), 'id', 'name'),['prompt'=>'--'])  ?>    

        <?= $form->field($model, 'company_person')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'person_id')->radioList(
        (ArrayHelper::map(Person::find()->orderBy("name ASC")->all(), 'id', 'name'))
            , ['itemOptions' => ['class' =>'radio-inline','labelOptions'=>array('style'=>'padding:4px;')]])->label('Pessoa');
        ?>

        <?= $form->field($model, 'responsible')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'contact')->textInput(['maxlength' => 50,'style'=>'width:100px']) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => 100,'style'=>'width:100px']) ?>

        <?= $form->field($model, 'phone')->textInput(['maxlength' => 15,'style'=>'width:100px']) ?>

        </div>

        <div class="col-md-7">
        <!-- RIGHT SITE -->

        <?= $form->field($model, 'observation')->widget(\yii\redactor\widgets\Redactor::className(), [
        'clientOptions' => [
            'minHeight' => 150,
            'lang' => 'pt_br',
            'buttons'=> ['bold', 'italic', 'deleted','unorderedlist', 'orderedlist', 'link', 'alignment'],
        ]
    ])?>  

        <?= $form->field($model, 'value')->textInput(['maxlength' => true,'style'=>'width:80px']) ?>

        <?= $form->field($model, 'num_proposal')->textInput(['maxlength' => true,'style'=>'width:80px']) ?>             

        <?= $form->field($model, 'file')->fileInput() ?>

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
