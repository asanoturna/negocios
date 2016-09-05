<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\campaign\models\Sipag;

?>

<div class="capitalaction-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'establishmenttype')->dropDownList(Sipag::$Static_establishmenttype,['prompt'=>'TODOS']) ?>

    <div class="form-group">
        <?= Html::submitButton('Filtrar', ['class' => 'btn btn-success']) ?>
        <?= Html::resetButton('Limpar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
