<?php
use yii\helpers\Html;
use yii\bootstrap\Tabs;

$this->title = 'Cooperativa';

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr/>

<?php
echo Tabs::widget([
    'items' => [
        [
            'label' => 'Colaboradores',
            'content' => 'Anim pariatur cliche...',
            'active' => true
        ],
        [
            'label' => 'Departamentos',
            'content' => 'Anim pariatur cliche...',
            //'headerOptions' => [...],
            'options' => ['id' => 'myveryownID'],
        ],
        [
            'label' => 'Agências',
            'url' => 'http://www.example.com',
        ],
        // [
        //     'label' => 'Dropdown',
        //     'items' => [
        //          [
        //              'label' => 'DropdownA',
        //              'content' => 'DropdownA, Anim pariatur cliche...',
        //          ],
        //          [
        //              'label' => 'DropdownB',
        //              'content' => 'DropdownB, Anim pariatur cliche...',
        //          ],
        //     ],
        // ],
    ],
]);
?>

</div>
