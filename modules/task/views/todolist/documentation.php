<?php
use yii\helpers\Html;

$this->title = "Documentação do Módulo Calendário de Atividades";
?>
<div class="site-error">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

    <div class="panel panel-default">
    <div class="panel-body">

    <div class="media">
      <div class="media-left media-middle">
        <a href="#">
          <img src="<?php echo Yii::$app->request->baseUrl;?>/images/icon-calendar.png" class="media-object">
        </a>
      </div>
      <div class="media-body">
      <h3>O que é</h3> 
      O Calendário de Atividades é um módulo da Intranet Crediriodoce que tem como objetivo registrar, acompanhar e gerenciar as atividades importantes da cooperativa. Para cada atividade registrada é designado um ou mais responsáveis, que deverão atuar nas ações descritas no registro de atividade.
      </div>
    </div>

    <h3>Como Funciona?</h3>
    <p>Gestores da ferramenta irão inserir as atividades no sistema, definindo os responsáveis e o prazo limite para realização.</p>
    <p>Os responsáveis deverão realizar a atividade descrita e atualizar o campo "Situação" para Concluído.</p>
    
    <h3>Notificações</h3>

    <p>Será enviada uma mensagem automática de notificação de nova atividade, para os destinatários: <code>Responsável e Co-responsável</code>.</p>

    <p>Será enviada uma mensagem automática de lembrete no dia definido no campo "Lembrete", para os destinatários: <code>Responsável, Co-responsável e o Departamento</code>.</p>

    <p>Será enviada uma mensagem automática de lembrete final no dia definido no campo "Prazo para atividade", para os destinatários: <code>Responsável, Co-responsável e o Departamento</code>.</p>
    														
    <div class="alert alert-warning" role="alert"><i class="fa fa-info-circle" aria-hidden="true"></i> Os responsáveis devem ficar atentos aos prazos, pois caso haja indisponibilidade de internet, as notificações por e-mail não poderão ser enviadas.</div>

    O usuário responsável ainda pode clicar no botão "Baixar arquivo de Integração" para baixar um arquivo <code>atividade.ics</code> e abrí-lo no seu programa de e-mail ou programa de calendário preferido para lembra-lo da atividade.

    </div>
    </div>

</div>
