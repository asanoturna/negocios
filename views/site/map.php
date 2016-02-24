<?php
use yii\helpers\Html;

$this->title = 'Mapa Interativo';

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr/>


<?php
if(preg_match('/(?i)msie [5-8]/',$_SERVER['HTTP_USER_AGENT']))
{
    // if IE<=8
    // include ( TEMPLATEPATH . '/noie.php' );
    // exit;
    echo "<div class=\"alert alert-danger\" role=\"alert\"><span class=\"glyphicon glyphicon-exclamation-sign\" aria-hidden="true"></span> Você está usando o navegador Internet Explorer 8 (ou inferior) ! </br>Para melhor visualização e funcionamento do sistema, utilize o navegador Mozilla Firefox ou Google Chrome</div>";
}else{
    // if IE>8
}
?>

</div>
