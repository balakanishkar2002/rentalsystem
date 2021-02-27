<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php
NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar navbar-expand-lg navbar-light bg-light',
    ],
]);
$menuItems = [
    ['label' => 'Home', 'url' => ['/site/index']],
    ['label' => 'Country list', 'url' => ['/country/index']],
    ['label' => 'Property Details', 'url' => ['/property-details/index']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
} else {
    $menuItems[] = ['label' =>  'Logout (' . Yii::$app->user->identity->username . ')', 'url' => ['/site/logout'],
        'linkOptions' => [
            'data-method' => 'post'
        ] ,
     'options' => [
        'class' => 'btn btn-outline-success',
    ]
    ];
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav ml-auto'],
    'items' => $menuItems,
]);
NavBar::end();
?>