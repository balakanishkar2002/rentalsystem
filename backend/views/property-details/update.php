<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\propertydetails */

$this->title = 'Update Propertydetails: ' . $model->property_id;
$this->params['breadcrumbs'][] = ['label' => 'Propertydetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->property_id, 'url' => ['view', 'id' => $model->property_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="propertydetails-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
