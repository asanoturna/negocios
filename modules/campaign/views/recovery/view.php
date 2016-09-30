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
        <?= Html::a('Alterar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
      <div class="col-md-6">

    <div class="panel panel-default">
    <div class="panel-heading"><b>Informações</b></div>
    <div class="panel-body">    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'negotiator_id',
            'location_id',
            'clientname',
            'clientdoc',
            'contracts',
            'value_traded',
            'value_input',
            [ 
                'attribute' => 'typeproposed',  
                'format' => 'raw',
                'value' => $model->Typeproposed,
            ],              
            'commission',           
            [ 
                'attribute' => 'date',
                'format' => 'raw',
                'value' => date("d/m/Y",  strtotime($model->date))
            ],            
        ],
    ]) ?>
        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [ 
                'attribute' => 'status',  
                'format' => 'raw',
                'value' => $model->Status,
            ],              
            [ 
                'attribute' => 'date',
                'format' => 'raw',
                'value' => date("d/m/Y",  strtotime($model->date))
            ], 
            'approvedby',
            [ 
                'attribute' => 'approvedin',
                'format' => 'raw',
                'value' => date("d/m/Y",  strtotime($model->approvedin))
            ],             
        ],
    ]) ?>

    </div>
    </div>  

      </div>
      <div class="col-md-6">

    <div class="panel panel-default">
    <div class="panel-heading"><strong>Legenda</strong></div>
    <div class="panel-body">
    <?php
        //CALCULO DAS PROPOSTAS
        $diff = strtotime(date('Y-m-d')) - strtotime($model->expirationdate);
        $days = intval($diff / 60 / 60 / 24);

        $formula1 = $model->referencevalue*(pow((1+0.018),($days/30)));
        $formula2 = $model->referencevalue*(pow((1+0.01),($days/30)));
        $formula3 = ($formula1 + $formula2) * 0.02;
        $proposal = $formula1+$formula2+$formula3;
        // PROPOSTA A
        $proposal_A = "R$ " . round($proposal, 2);
        // PROPOSTA B
        $proposal_B = "R$ " . round($formula1, 2);
        // PROPOSTA C
        $proposal_C = "R$ " . round(($model->referencevalue*(pow((1+0.014),($days/30)))), 2);

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
                <td>???</td>
                <td><span class="label label-success">1%</span></td>
            </tr>
            <tr>
                <td>E - Correção por índice judicial</td>
                <td>Diretor</td>
                <td>???</td>
                <td><span class="label label-success">0,50%</span></td>
            </tr>
            <tr>
                <td>F - Valor do débito sem correção</td>
                <td>Diretor</td>
                <td>???</td>
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
                <td><code><?=$comission_f;?></code></td>
            </tr>
            <tr>
                <td>EQUIPE</td>
                <td><code><?=$comission_e;?></code></td>
            </tr>                                    
          </table>
        </div>
    </div>

      </div>
    </div>



</div>