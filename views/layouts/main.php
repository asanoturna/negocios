<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> ' . Yii::$app->params['appname'],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => [
            //['label' => 'Inserir', 'url' => ['/dailyproductivity/create']],
            //['label' => 'Listar', 'url' => ['/dailyproductivity']],
            ['label' => '<span class="glyphicon glyphicon-home" aria-hidden="true"></span> Início', 'url' => ['/site/index']],
            Yii::$app->user->isGuest ?
                ['label' => '<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Entrar', 'url' => ['/user/login']] :
                ['label' => '<span class="glyphicon glyphicon-user" aria-hidden="true"></span> '. Yii::$app->user->displayName,
                'items' => 
                    [
                        ['label' => '<i class="fa fa-briefcase"></i> Alterar Senha', 'url' => ['/user/account']],
                        ['label' => '<i class="fa fa-briefcase"></i> Perfil', 'url' => ['/user/profile']],
                        '<li class="divider"></li>',
                        ['label' => '<i class="fa fa-unlock"></i> Sair',
                            'url' => ['/user/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                    ],
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= $content ?>
    </div>
</div>

<div style="background-image: url('images/footer.jpg'); height: 29px;"></div>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Yii::$app->params['company'] ?> <?= date('Y') ?> - <?= Yii::$app->params['appname']?></p>
        <p class="pull-right"><?php echo Html::a('Administração do sistema', ['/admin/administration']);?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
