<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\archive\models\Category;

?>

<div class="file-search">

    <?php $form = ActiveForm::begin([
        'options' => [
                    'class' => 'form-inline',
                    ],
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-3">

    <?= $form->field($model, 'archive_category_id')->dropDownList(ArrayHelper::map(Category::find()->where(['is_active' => 1])->orderBy("name ASC")->all(), 'id', 'name'),['prompt'=>'--'])  ?>

        </div>
        <div class="col-md-4">

    <?= $form->field($model, 'name') ?>

        </div>

    <div class="form-group">
        <?= Html::submitButton('Pesquisar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>

</div>
