<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\propertyfloor */

$this->title = 'Create Propertyfloor';
$this->params['breadcrumbs'][] = ['label' => 'Propertyfloors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="propertyfloor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
