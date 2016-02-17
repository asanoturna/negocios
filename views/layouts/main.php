<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
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
    <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl;?>/favicon.ico">
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> ' . Yii::$app->params['appname'],
        'brandUrl' => Yii::$app->homeUrl,
        'innerContainerOptions' => ['class'=>'container-fluid'],
        'options' => [
            'class' => 'navbar-inverse navbar-static-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => [
            ['label' => '<span class="glyphicon glyphicon-home" aria-hidden="true"></span> Início', 'url' => ['/site/index']],
            Yii::$app->user->isGuest ?
                ['label' => '<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Entrar', 'url' => ['/user/login']] :
                ['label' => '<img src="images/users/'.Yii::$app->user->identity->profile->avatar.'" class="profile-image img-avatar" > '. Yii::$app->user->displayName,
                'items' => 
                    [
                        ['label' => '<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Alterar Senha', 'url' => ['/user/account']],
                        ['label' => '<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Perfil', 'url' => ['/user/profile']],
                        '<li class="divider"></li>',
                        ['label' => '<span class="glyphicon glyphicon-off" aria-hidden="true"></span> Sair',
                            'url' => ['/user/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                    ],
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container-fluid">
        <?= $content ?>
    </div>
</div>

<div style="background-image: url('images/footer.jpg'); height: 29px;"></div>
<footer class="footer">
    <div class="container-fluid">
        <p class="pull-center">&copy; 
        <?= Yii::$app->params['company'] ?> 
        <?= date('Y') ?> - 
        <?= Yii::$app->params['appname']?> - 
        Administração do sistema 
        <?= Html::mailto('<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Dúvidas e Sugestões', Yii::$app->params['supportEmail'], [
            'class' => 'pull-right',
            'title' => 'Envie Dúvidas e Sugestões ',
            'style' => 'color: #97afb3;',
            ]) ?></p>

    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
