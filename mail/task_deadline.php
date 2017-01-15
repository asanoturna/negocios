<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <h3>Calendário de Atividades - Lembrete</h3> 
    <br/>
    Essa mensagem é um lembrete de atividade registrada no sistema destinada a você. 
    <p>Clique no link abaixo para acessar o registro da atividade e após concluída altere a situação para o tipo correspondente.
    </p>
    
    <br/>
    <p>
    Mensagem enviada automaticamente por <?= Yii::$app->name ?>
    </p>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
