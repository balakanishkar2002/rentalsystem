<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HouseDetails */

$this->title = 'Create House Details';
$this->params['breadcrumbs'][] = ['label' => 'House Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="house-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
