<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Propertydetails */

$this->title = 'Create Propertydetails';
$this->params['breadcrumbs'][] = ['label' => 'Propertydetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="propertydetails-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
