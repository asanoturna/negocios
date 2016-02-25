<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Gestão Produtividade Diária';
?>
<div class="managerdailyproductivity-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('//dailyproductivity/_menu'); ?>
    <hr/>

    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Confirmar exclusão?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

<?= DetailView::widget([
        'model' => $model,
        'attributes' => [ 
            'companys_revenue',
            [ 
                'label' => 'Situação',
                'format' => 'raw',
                'value' => $model->dailyProductivityStatus->name,
            ],                  
            [ 
                'label' => 'Data',
                'format' => 'raw',
                'value' => date("d/m/Y",  strtotime($model->date))
            ],           
            'location.fullname',  
            'product.name',                          
            'value',
            'commission_percent',
            'person.name', 
            'buyer_document',             
            'buyer_name',                     
            [ 
                'label' => 'Indicador',
                'format' => 'raw',
                'value' => $model->seller->username,
            ],             
            [ 
                'label' => 'Angariador',
                'format' => 'raw',
                'value' => $model->operator->username,
            ],     
            [ 
                'label' => 'Usuário',
                'format' => 'raw',
                'value' => $model->user->username,
            ],    
                              
        ],
    ]) ?>

</div>
