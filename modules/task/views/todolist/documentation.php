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
    <h3>Sobre</h3> 
    O Calendário de Atividades é um módulo da Intranet Crediriodoce que tem como objetivo registrar e gerenciar as atividades da cooperativa, enviando notificações para os responsáveis.
      </div>
    </div>

    <h3>Como Funciona?</h3>
    <p>?????????????????????????????????</p>
    <p>?????????????????????????????????</p>
    <p>?????????????????????????????????</p>

    <h3>Notificação por E-mail</h3>	

    <p>Será enviada uma mensagem automática de notificação de nova atividade, para os destinatários: Responsável, Co-responsável e o Departamento.</p>

    <p>Será enviada uma mensagem automática de lembrete no dia definido no campo "Prazo para atividade", para os destinatários: Responsável, Co-responsável e o Departamento.</p>
    														
    <p class="text-muted">Os responsáveis devem ficar atentos aos prazos, pois caso haja indisponibilidade de internet, as notificações por e-mail não poderão ser enviadas.</p>

    </div>
    </div>

</div>
