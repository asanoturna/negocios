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

    <?= $form->field($model, 'status')->dropDownList(Sicoobcard::$Static_status,['prompt'=>'--']) ?>


      </div>
    </div>    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Gravar' : 'Gravar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>