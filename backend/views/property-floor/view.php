<?php

use backend\models\HouseDetails;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\propertyfloor */

$this->title = $model->floor_id;
$this->params['breadcrumbs'][] = ['label' => 'Propertyfloors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="propertyfloor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->floor_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->floor_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'floor_id',
            'floor_name',
            //'property_id',
            'property.property_name',
            'floor.floor_name',
            'floor_details:html',
            'created_date',
            'updated_date',
        ],
    ]) ?>

</div>
