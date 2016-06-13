<?php
use yii\helpers\Html;
use kartik\sidenav\SideNav;

$this->title = 'Mapa';

?>
<div class="site-about">

    <div class="row">
    <div class="col-sm-2">
    <?php
    echo \cyneek\yii2\menu\Menu::widget([
        //'heading' => 'Options',
        'options' => [
            'type' => SideNav::TYPE_DEFAULT,
            'heading' => false,
            'encodeLabels' => true,
            ],
        //'class'=>'head-style',
        ]);
    ?>
    </div>

    <div class="col-sm-10">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr/>

    <?php echo Html::img('@web/images/map1.png', ['alt'=>'Mapa', 'class'=>'img-responsive img-rounded']) ?>

    </div>
    </div>

</div>