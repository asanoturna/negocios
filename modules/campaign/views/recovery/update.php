<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Location;
use kartik\money\MaskMoney;
use app\modules\campaign\models\Recovery;
use yii\widgets\Pjax;

$this->title = 'Campanha Recupere e Ganhe - #' . $model->id;
?>
<div class="recovery-form">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

<div class="panel panel-default">
  <div class="panel-body">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
      <div class="col-md-5">

    <div class="row">
      <div class="col-md-6">
        <?= $form->field($model, 'clientname')->textInput(['maxlength' => true,'readonly' => true, 'disabled' => true]) ?>
      </div>
      <div class="col-md-6">
        <?= $form->field($model, 'clientdoc')->textInput(['maxlength' => true,'readonly' => true, 'disabled' => true]) ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
      <?= $form->field($model, 'location_id')->dropDownList(ArrayHelper::map(Location::find()->where(['is_active' => 1])->orderBy("shortname ASC")->all(), 'id', 'fullname'),['readonly' => true, 'disabled' => true])  ?></div>
      <div class="col-md-4">
      <?= $form->field($model, 'typeofdebt')->dropDownList(Recovery::$Static_typeofdebt,['readonly' => true, 'disabled' => true]) ?>
      </div>
      <div class="col-md-4">
        <?php 
        echo $form->field($model, 'referencevalue')->widget(MaskMoney::classname(), ['readonly' => true, 'disabled' => true,
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
        </div>
    </div>

    <hr/>

    <div class="row">
      <div class="col-md-6">

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

      </div>
      <div class="col-md-6">

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
    <div class="col-md-7">

    <div class="panel panel-default">
    <div class="panel-heading"><strong>Legenda</strong></div>
    <div class="panel-body">
<?php
        //CALCULO DAS PROPOSTAS
        $diff = strtotime(date('Y-m-d')) - strtotime($model->expirationdate);
        $days = intval($diff / 60 / 60 / 24);

        // FATOR DE MULTIPLICAÇÃO BASEADO NO TIPO DE DEBITO
        if ($model->typeofdebt == 0) {
            $factor = 1;
        } elseif ($model->typeofdebt == 1) {
            $factor = 0.2;
        } elseif ($model->typeofdebt == 2) {
            $factor = 0.1;
        } elseif ($model->typeofdebt == 3) {
            $factor = 0.1;
        }

        // FORMULAS
        $formula1 = $model->referencevalue*(pow((1+0.018),($days/30)));
        $formula2 = $model->referencevalue*(pow((1+0.01),($days/30)));
        $formula3 = ($formula1 + $formula2) * 0.02;
        $proposal = $formula1+$formula2+$formula3;
        
        // PROPOSTA A
        $proposal_A = $proposal;
        $proposal_A = "R$ " . round(($proposal_A+($proposal_A*$factor)), 2);
        // PROPOSTA B
        $proposal_B = $formula1;
        $proposal_B = "R$ " . round(($proposal_B+($proposal_B*$factor)), 2);
        // PROPOSTA C
        $proposal_C = ($model->referencevalue*(pow((1+0.015),($days/30))));
        $proposal_C = "R$ " . round(($proposal_C+($proposal_C*$factor)), 2);
        // PROPOSTA D
        $proposal_D = ($model->referencevalue*(pow((1+0.013),($days/30))));
        $proposal_D = "R$ " . round(($proposal_D+($proposal_D*$factor)), 2);
        // PROPOSTA E
        $proposal_E = ($model->referencevalue*(pow((1+0.011),($days/30))));
        $proposal_E = "R$ " . round(($proposal_E+($proposal_E*$factor)), 2);
        // PROPOSTA F
        $proposal_F = ($model->referencevalue*(pow((1+0.0067),($days/30))));
        $proposal_F = "R$ " . round(($proposal_F+($proposal_F*$factor)), 2);

        // DISTRIBUIÇÃO COMISSÃO
        $comission_f = "R$ " . round(($model->commission*0.60), 2);
        $comission_e = "R$ " . round(($model->commission*0.40), 2);
    ?>
        <table class="table">
            <tr class="active">
                <td>PROPOSTA</td>
                <td>ALÇADA</td>
                <td>PISO NEGOCIAL</td>
                <td>COMISSÃO</td>
            </tr>
            <tr>
                <td><span class="label label-default">A</span> <small>Valor do débito corrigido a Juros Contratuais</small></td>
                <td>Agência</td>
                <td><?=$proposal_A;?></td>
                <td><span class="label label-primary">5%</span></td>
            </tr>
            <tr>
                <td><span class="label label-default">B</span> <small>Valor do débito corrigido a Juros Contratuais Sem Multa e Mora</small></td>
                <td>Agência</td>
                <td><?=$proposal_B;?></td>
                <td><span class="label label-primary">3%</span></td>
            </tr>
            <tr>
                <td><span class="label label-default">C</span> <small>Valor do débito corrigido a Juros Judiciais</small></td>
                <td>Agência</td>
                <td><?=$proposal_C;?></td>
                <td><span class="label label-primary">2%</span></td>
            </tr>   
            <tr>
                <td><span class="label label-default">D</span> <small>Valor do débito corrigido a Juros de Poupança</small></td>
                <td>Supervisor</td>
                <td><?=$proposal_D;?></td>
                <td><span class="label label-success">1%</span></td>
            </tr>
            <tr>
                <td><span class="label label-default">E</span> <small>Correção por índice judicial</small></td>
                <td>Diretor</td>
                <td><?=$proposal_E;?></td>
                <td><span class="label label-success">0,50%</span></td>
            </tr>
            <tr>
                <td><span class="label label-default">F</span> <small>Valor do débito sem correção</small></td>
                <td>Diretor</td>
                <td><?=$proposal_F;?></td>
                <td><span class="label label-success">0,30%</span></td>
            </tr>                                     
        </table>
        <p class="text-warning"><i class="fa fa-info-circle" aria-hidden="true"></i> Propostas A, B e C são aprovadas automaticamente!</p> 
        </div></div>

      </div>
    </div>

    <hr/>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Gravar' : '<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Calcular e Gravar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div></div>
</div>