<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\HouseDetails */

$this->title = 'Update House Details: ' . $model->house_id;
$this->params['breadcrumbs'][] = ['label' => 'House Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->house_id, 'url' => ['view', 'id' => $model->house_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="house-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
