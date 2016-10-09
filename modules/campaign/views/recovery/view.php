<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Campanha Recupere e Ganhe - #' . $model->id;
?>
<div class="recovery-view">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Re-Calcular', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?php
        // Html::a('Excluir', ['delete', 'id' => $model->id], [
        //     'class' => 'btn btn-danger',
        //     'data' => [
        //         'confirm' => 'Confirma exclusão?',
        //         'method' => 'post',
        //     ],
        // ]) 
        ?>
    </p>

    <div class="row">
      <div class="col-md-5">

    <div class="panel panel-default">
    <div class="panel-heading"><b>Informações</b></div>
    <div class="panel-body">    

    <?= DetailView::widget([
        'model' => $model,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '<span class="not-set"><em>não informado</em></span>'],
        'attributes' => [
            'id',
            [ 
                'attribute' => 'typeofdebt',  
                'format' => 'raw',
                'value' => $model->Typeofdebt,
            ],  
            'location.fullname',  
            'clientname',
            'clientdoc',
            'contracts',
            'referencevalue',
            'value_input',
            'value_traded',
            [ 
                'attribute' => 'typeproposed',  
                'format' => 'raw',
                'value' => $model->typeproposed ? '<span class="label label-default">'.$model->Typeproposed.'</span>' : null,
            ],              
            'commission',  
            [ 
                'attribute' => 'negotiator_id',
                'format' => 'raw',
                'value' => $model->user ? $model->user->username : null,
            ],
            [ 
                'attribute' => 'date',
                'format' => 'raw',
                'value' => $model->date == NULL ? null : date("d/m/Y",  strtotime($model->date)),
            ],            
        ],
    ]) ?>
        <?= DetailView::widget([
        'model' => $model,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '<span class="not-set"><em>não informado</em></span>'],
        'attributes' => [
            [ 
                'attribute' => 'status',  
                'format' => 'raw',
                'value' => $model->status == 1 ? '<span class="label label-success">APROVADO</span>' : '<span class="label label-warning">PENDENTE</span>',
            ],
            'approvedby',
            [ 
                'attribute' => 'approvedin',
                'format' => 'raw',
                'value' => $model->approvedin == NULL ? null : date("d/m/Y",  strtotime($model->approvedin)),
            ],             
        ],
    ]) ?>

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
        $proposal_C = ($model->referencevalue*(pow((1+0.014),($days/30))));
        $proposal_C = "R$ " . round(($proposal_C+($proposal_C*$factor)), 2);
        // PROPOSTA D
        $proposal_D = ($model->referencevalue*(pow((1+0.007),($days/30))));
        $proposal_D = "R$ " . round(($proposal_D+($proposal_D*$factor)), 2);
        // PROPOSTA E
        $proposal_E = ($model->referencevalue*1.66675);
        $proposal_E = "R$ " . round(($proposal_E+($proposal_E*$factor)), 2);
        // PROPOSTA F
        $proposal_F = ($model->referencevalue);
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
                <td>A - Valor do débito corrigido a Juros Contratuais</td>
                <td>Agência</td>
                <td><?=$proposal_A;?></td>
                <td><span class="label label-primary">5%</span></td>
            </tr>
            <tr>
                <td>B - Valor do débito corrigido a Juros Contratuais Sem Multa e Mora.</td>
                <td>Agência</td>
                <td><?=$proposal_B;?></td>
                <td><span class="label label-primary">3%</span></td>
            </tr>
            <tr>
                <td>C - Valor do débito corrigido a Juros Judiciais</td>
                <td>Agência</td>
                <td><?=$proposal_C;?></td>
                <td><span class="label label-primary">2%</span></td>
            </tr>   
            <tr>
                <td>D - Valor do débito corrigido a Juros de Poupança</td>
                <td>Supervisor</td>
                <td><?=$proposal_D;?></td>
                <td><span class="label label-success">1%</span></td>
            </tr>
            <tr>
                <td>E - Correção por índice judicial</td>
                <td>Diretor</td>
                <td><?=$proposal_E;?></td>
                <td><span class="label label-success">0,50%</span></td>
            </tr>
            <tr>
                <td>F - Valor do débito sem correção</td>
                <td>Diretor</td>
                <td><?=$proposal_F;?></td>
                <td><span class="label label-success">0,30%</span></td>
            </tr>                                     
        </table>
        </div></div>

    <div class="panel panel-default">
    <div class="panel-heading"><strong>Distribuição da Comissão</strong></div>
    <div class="panel-body">
    <p class="text-warning"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Se o valor da entrada for inferior a 10% do valor negociado, a comissão é zerada!</p>
        <table class="table">
            <tr>
                <td>FUNCIONÁRIOS</td>
                <td><?=$comission_f;?></td>
            </tr>
            <tr>
                <td>EQUIPE</td>
                <td><?=$comission_e;?></td>
            </tr>                                    
          </table>
        </div>
    </div>

      </div>
    </div>



</div>