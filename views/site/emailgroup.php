<?php
use yii\helpers\Html;
use kartik\sidenav\SideNav;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Tabs;
use yii\data\ArrayDataProvider;

$this->title = 'Lista de E-emails';
?>
<div class="site-about">

    <div class="row">
    <div class="col-sm-2">
    <?php  echo $this->render('_menu'); ?>
    </div>

    <div class="col-sm-10">
    <h1><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <?= Html::encode($this->title) ?></h1>
    <hr/>

    <div class="panel panel-default">
    <div class="panel-body">

    <?php
    echo Tabs::widget([
        'items' => [
            [
                'label' => 'Por Colaborador',
                'url' => ['/site/emailuser'],
            ],
            [
                'label' => 'Por Grupo',
                'url' => ['/site/emailgroup'],
                'active' => true
            ],
        ],
    ]);
    ?>
    <br/>
    <?php
    $dataProvideremail = new ArrayDataProvider([
        'allModels' => [
            ['name' => 'CAD - Centro Administrativo', 'email' => 'cad@sicoobcrediriodoce.com.br'], 
            ['name' => 'Agência Sede',    'email' =>'agenciasede@sicoobcrediriodoce.com.br'],
            ['name' => 'Agência 3027_02', 'email' =>'saofelix@sicoobcrediriodoce.com.br'],
            ['name' => 'Agência 3027_03', 'email' =>'freiinocencio@sicoobcrediriodoce.com.br'],
            ['name' => 'Agência 3027_04', 'email' =>'itabirinha@sicoobcrediriodoce.com.br'],
            ['name' => 'Agência 3027_05', 'email' =>'jampruca@sicoobcrediriodoce.com.br'],
            ['name' => 'Agência 3027_06', 'email' =>'pescador@sicoobcrediriodoce.com.br'],
            ['name' => 'Agência 3027_07', 'email' =>'marilac@sicoobcrediriodoce.com.br'],
            ['name' => 'Agência 3027_09', 'email' =>'mantena@sicoobcrediriodoce.com.br'],
            ['name' => 'Agência 3027_10', 'email' =>'fernandestourinho@sicoobcrediriodoce.com.br'],
            ['name' => 'Agência 3027_11', 'email' =>'santaefigenia@sicoobcrediriodoce.com.br'],
            ['name' => 'Agência 3027_13', 'email' =>'divinolandia@sicoobcrediriodoce.com.br'],
            ['name' => 'Agência 3027_14', 'email' =>'sardoa@sicoobcrediriodoce.com.br'],
            ['name' => 'Agência 3027_15', 'email' =>'divinodaslaranjeiras@sicoobcrediriodoce.com.br'],
            ['name' => 'Agência 3027_16', 'email' =>'capitaoandrade@sicoobcrediriodoce.com.br'],
            ['name' => 'Agência 3027_17', 'email' =>'virginopolis@sicoobcrediriodoce.com.br'],
            ['name' => 'Agência 3027_18', 'email' =>'vargemgrande@sicoobcrediriodoce.com.br'],
            ['name' => 'Agência 3027_19', 'email' =>'jardimperola@sicoobcrediriodoce.com.br'],
            ['name' => 'Agência 3027_20', 'email' =>'jk@sicoobcrediriodoce.com.br'],
            ['name' => 'Todos PAs',       'email' =>'pac@sicoobcrediriodoce.com.br'],
            ['name' => 'Todas as Agências', 'email' =>'agencias@sicoobcrediriodoce.com.br'],
            ['name' => 'Gerentes (PA, Relacionamento, PF e PJ)', 'email' =>'gerentes@sicoobcrediriodoce.com.br'],
            ['name' => 'Atendimento Agência Sede', 'email' =>'atendimento@sicoobcrediriodoce.com.br'],
            ['name' => 'Setor de Cadastro', 'email' =>'cadastro@sicoobcrediriodoce.com.br'],
            ['name' => 'Setor de Caixa (Agência Gov Valadares)', 'email' =>'caixas@sicoobcrediriodoce.com.br'],
            ['name' => 'Setor de Cobrança e Recebimento', 'email' =>'recebimento@sicoobcrediriodoce.com.br'],
            ['name' => 'Setor Controles Internos', 'email' =>'controlesinternos@sicoobcrediriodoce.com.br'],
            ['name' => 'Agentes de Negócios', 'email' =>'agentesdenegocios@sicoobcrediriodoce.com.br'],
            ['name' => 'Crédito', 'email' =>'credito@sicoobcrediriodoce.com.br'],
            ['name' => 'Departamento Pessoal', 'email' =>'dp@sicoobcrediriodoce.com.br'],
            ['name' => 'Diretoria', 'email' =>'diretoria@sicoobcrediriodoce.com.br'],
            ['name' => 'Gerencia Pessoa Física', 'email' =>'gerenciapf@sicoobcrediriodoce.com.br'],
            ['name' => 'Gerencia Pessoa Jurídica', 'email' =>'gerenciapj@sicoobcrediriodoce.com.br'],
            ['name' => 'Tecnologia da Informação', 'email' =>'ti@sicoobcrediriodoce.com.br'],
            ['name' => 'Unidade Administrativa', 'email' =>'unidadeadministrativa@sicoobcrediriodoce.com.br'],
            ['name' => 'Unidade de Produtos', 'email' =>'unidadedeprodutos@sicoobcrediriodoce.com.br'],
            ['name' => 'Unidade Organizacional', 'email' =>'unidadeorganizacional@sicoobcrediriodoce.com.br'],
            ['name' => 'Todos os colaboradores', 'email' =>'geral@sicoobcrediriodoce.com.br'],
            ],
        'pagination' => [
            'pageSize' => 100,
        ],            
        ]);     
    ?>

    <?= GridView::widget([
      'dataProvider' => $dataProvideremail,
      'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '<span class="not-set">(não informado)</span>'],
      'emptyText'    => '</br><p class="text-danger">Nenhuma informação encontrada</p>',
      'summary'      =>  '',
      'showHeader'   => false,        
      'tableOptions' => ['class'=>'table table-hover'],
      'columns' => [                                    
        'name',
        'email:email',
        ],
    ]); ?>     

    </div>
    </div>

    </div>
    </div>
</div>