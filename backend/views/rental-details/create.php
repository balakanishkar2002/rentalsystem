<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RentalDetails */

$this->title = 'Create Rental Details';
$this->params['breadcrumbs'][] = ['label' => 'Rental Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rental-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
