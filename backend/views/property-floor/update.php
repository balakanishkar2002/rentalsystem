<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\propertyfloor */

$this->title = 'Update Propertyfloor: ' . $model->floor_id;
$this->params['breadcrumbs'][] = ['label' => 'Propertyfloors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->floor_id, 'url' => ['view', 'id' => $model->floor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="propertyfloor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
