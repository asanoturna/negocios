<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use app\modules\client\models\Category;

?>

<div class="dailyproductivity-search">

    <?php $form = ActiveForm::begin([
        'action' => ['simulator'],
        'method' => 'get',
    ]); ?>
       
    <?= $form->field($model, 'account')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->orderBy("name ASC")->all(), 'id', 'name'),['prompt'=>'--'])  ?> 

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quota')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-sm-11">
            <?= Html::submitButton('<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Processar', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>